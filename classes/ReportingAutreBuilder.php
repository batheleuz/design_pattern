<?php

/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 14/03/2017
 * Time: 11:18
 */
class ReportingAutreBuilder extends ReportingGlobalBuilder
{

    private $column;

    private $color = array('w3-light-grey', 'w3-white');

    public function __construct($name = null, $direction = null, $column, $column_kpi = null, $dates = null, $par = null, $_GLOBALS = null)
    {

        parent::__construct($name, $direction, null, $column_kpi, $dates, $par, $_GLOBALS);
        
        if ($column != null)
            $this->column = $column;
        else{
            $this->enteteTab();
            print " <div class='w3-container w3-padding-jumbo w3-white w3-text-red'> Veillez choisir des colonnes  </div> " ;
            exit();
        }
    }

    public function designTab(){

        $this->enteteTab();

        print "<div class='w3-responsive'><table class='w3-table-all' id='tabl' border >";

        $this->thead();

        $datas = $this->collector();

        $ind = 1;
        foreach ($this->date_column() as $day) {
            $color = $this->color[$ind];

            for ($i = 0; $i < count($datas); $i++) {

                $arr = explode(";", $datas[$i]);

                print "<tr class=' $color w3-hover-gray'>";
                print "<th>" . $this->formate_fr($day['column']) . "</th>";

                foreach ($arr as $col)
                    print "<td> $col </td>";

                foreach ($this->column_kpi as $kpi) {
                    $ndr = $this->compute($day['rel'], $kpi['type_drgt'], $arr, $kpi['delai_time'], $kpi['delai'] ,substr($kpi['abreviation'], null , 2 ) );
                    $total = $this->compute($day['rel'], $kpi['type_drgt'], $arr , null, null, substr($kpi['abreviation'], null , 2 ));
                    $result = floatval(round(100 * ($ndr / $total), 2));
                    $result = (is_nan($result)) ? 0 : $result;
                    echo "<td > $result </td>";
                }
                print "</tr>";
            }
            $ind = ($ind+1) % 2 ;
        }
        print "</table></div>";

        $tab = ob_get_clean();

        $tmp_file = fopen("datas/services/" . $this->_GLOBALS['service']['nom'] . "/" . "tmp_file.json", "w");
        fwrite($tmp_file, json_encode($this->toArray(), JSON_PRETTY_PRINT));

        return $tab;
    }

    protected function thead()
    {

        ob_start();
        print "<thead>";
        print "<th>Date</th>";

        foreach ($this->column as $key => $val)
            print "<th>" . $key . "</th>";

        foreach ($this->column_kpi as $kpi)
            print "<th>" . $kpi['abreviation'] . "</th>";
        print "</thead>";

        $thead = ob_end_flush();

        return $thead;
    }

    private function collector()
    {

        $arr1 = explode(",", array_values($this->column)[0]);
        $arr2 = explode(",", array_values($this->column)[1]);
        $arr3 = explode(",", array_values($this->column)[2]);

        if (count($this->column) == 1)

            return $this->produitCartesien($arr1);

        else if (count($this->column) == 2)

            return ($this->produitCartesien($arr1, $arr2));


        else if (count($this->column) == 3)

            return ($this->produitCartesien($arr1, $arr2, $arr3));

    }

    private function produitCartesien(...$args){

        $result = array();
        if (count($args) == 1) {
            for ($i = 0; $i < count($args[0]); $i++)
                $result [] = $args[0][$i];
        } else if (count($args) == 2) {
            for ($i = 0; $i < count($args[0]); $i++) {
                for ($j = 0; $j < count($args[1]); $j++)
                    $result [] = $args[0][$i] . ";" . $args[1][$j];
            }
        } else if (count($args) == 3) {
            for ($i = 0; $i < count($args[0]); $i++) {
                for ($j = 0; $j < count($args[1]); $j++) {
                    for ($k = 0; $k < count($args[2]); $k++)
                        $result [] = $args[0][$i] . ";" . $args[1][$j] . ";" . $args[2][$k];
                }
            }
        }
        return $result;
    }

    protected function compute($date_releve, $produit, $columns = null, $tmpInd = null, $valueTmpInd = null ,  $typeKPI ){
        if ( $typeKPI === "Ba")
            return $this->backlog($date_releve, $produit, $columns, $tmpInd, $valueTmpInd );
        else if ( $typeKPI === "VR")
            return $this->ndr($date_releve, $produit, $columns, $tmpInd, $valueTmpInd );
    }

    protected function ndr($date_releve, $produit, $columns = null, $tmpInd = null, $valueTmpInd = null){

        $rqt = $this->ndrByTime($this->par, $date_releve, date("Y"));
        $rqt .= "AND " . $this->ndrByProd($produit) . " ";

        if ($columns != null)
            $rqt .= $this->ndrByColumn($columns) . " ";

        if ($tmpInd != null && $valueTmpInd != null)
            $rqt .= "AND " . $this->ndrByDir($tmpInd, $valueTmpInd);

        //echo $rqt."<br>" ;

        $n = Database::getDb()->rqt($rqt);
        return $n[0]['n'];
    }

    protected function backlog($date_releve, $produit, $columns = null, $tmpInd = null, $valueTmpInd = null){

        if($tmpInd !=  null && $valueTmpInd != null ){
            $rqt = $this->ndrByTime($this->par, $date_releve, date("Y"));
            $rqt .= "AND ". $this->backlogByDir($tmpInd, $valueTmpInd);
            $rqt .= "AND ". $this->ndrByProd($produit) . " ";
        }else{
            $rqt = $this->ndrByTime($this->par, $date_releve, date("Y"));
            $rqt .= "AND ". $this->ndrByProd($produit) . " ";
        }
        if ($columns != null)
            $rqt .= $this->ndrByColumn($columns) . " ";

        $result = Database::getDb()->rqt($rqt);
        $nombre =  $result[0]['n'];

        return $nombre;

    }

    private function ndrByColumn($columns){
        $rqt = "";
        for ($i = 0; $i < count($this->column); $i++) {
            $key = array_keys($this->column)[$i];
            $rqt .= "AND $key = '" . $columns[$i] . "' ";
        }
        return $rqt;
    }

    protected function toArray(){

        return array(
            "name" => $this->name,
            "direction" => $this->direction,
            "column" => $this->column,
            "column_kpi" => $this->column_kpi,
            "dates" => $this->dates,
            "par" => $this->par,
        );
    }

    public function serialize(){

        return serialize($this->toArray());
    }

}