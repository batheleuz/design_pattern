<?php

/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 17/06/2017
 * Time: 15:29
 */
class BacklogCalculator{

    public $dir ;
    public $nbre ;
    public $date;
    public $groupe_interventation;

    public function __construct(  $dir , $nbre , $date = null , $groupe_interventation ){

        $this->dir = $dir ;
        $this->nbre = $nbre ;
        $this->date  = (is_null($date)) ?  date("Y-m-d") : $date ;
        $this->groupe_interventation = $groupe_interventation ;

    }

    public function getCount (){

        $rqt = "SELECT COUNT(*) as n FROM drgt_encours WHERE ";
        $rqt = $this->byDirection($rqt);
        $rqt = $this->byGI($rqt);

        $result = Database::getDb()->rqt($rqt);
        //echo $rqt;
        return $result[0]['n'];
    }

    public function getMoy(){
        $col = ($this->dir  == "dint") ?  "date_ori" : "date_sig";

        $rqt = " SELECT AVG(DATEDIFF('{$this->date}', $col)) as moyAge from drgt_encours WHERE ";
        $rqt = $this->byDirection($rqt);
        $rqt = $this->byGI($rqt);
        $result = Database::getDb()->rqt($rqt);

        return round($result[0]['moyAge'] , 2 );
    }

    public function getBacklogs(){

        $col = ($this->dir  == "dint") ?  "date_ori" : "date_sig";

        $rqt = " SELECT  * , DATEDIFF('{$this->date}', $col ) as age from drgt_encours WHERE ";
        $rqt = $this->byDirection($rqt);
        $rqt = $this->byGI($rqt);
        // echo $rqt ;
        return Database::getDb()->rqt($rqt);

    }

    protected function byDirection ($rqt ){

        if ($this->dir == "dint")
            $rqt .= "DATEDIFF('{$this->date}', date_ori) > {$this->nbre}" ;
        else if ($this->dir == "dsc")
            $rqt .= "date_ori ='0000-00-00' AND DATEDIFF('{$this->date}', date_sig) > {$this->nbre}";
        else
            $rqt .= "DATEDIFF('{$this->date}', date_sig) > {$this->nbre}" ;

        return $rqt;
    }

    protected function byGI ($rqt){

        if( $this->groupe_interventation != 0 ){

            $rqt .=  " AND (";
            $res = Database::getDb()->rqt("SELECT id_uis FROM groupe_intervention WHERE id='{$this->groupe_interventation}'");
            $id_uis = $res[0]['id_uis'];
            $id_uis_tab = explode(";" , $id_uis );
            foreach ($id_uis_tab as  $ui ){
                $res = Database::getDb()->all("ui" , "id" , $ui );
                $rqt .= " ui = '{$res[0]['nom']}' OR";
            }

            return substr( $rqt , 0 , -2 ) . ")";
        }
        else
            return $rqt;
    }

}