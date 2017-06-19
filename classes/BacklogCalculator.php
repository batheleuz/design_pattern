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

    public function __construct(  $dir , $nbre , $date = null ){

        $this->dir = $dir ;
        $this->nbre = $nbre ;
        $this->date  = (is_null($date)) ?  date("Y-m-d") : $date ;
    }

    public function getCount (){

        $rqt = "SELECT COUNT(*) as n FROM drgt_encours WHERE ";
        $rqt = $this->byDirection($rqt);
        $result = Database::getDb()->rqt($rqt);
        //echo $rqt;
        return $result[0]['n'];
    }
    public function getMoy(){
        $col = ($this->dir  == "dint") ?  "date_ori" : "date_sig";

        $rqt = " SELECT AVG(DATEDIFF('{$this->date}', $col)) as moyAge from drgt_encours WHERE ";
        $rqt = $this->byDirection($rqt);
        $result = Database::getDb()->rqt($rqt);

        return round($result[0]['moyAge'] , 2 );
    }

    public function getBacklogs(){

        $col = ($this->dir  == "dint") ?  "date_ori" : "date_sig";

        $rqt=" SELECT  * , DATEDIFF('{$this->date}', $col ) as age from drgt_encours WHERE ";
        $rqt = $this->byDirection($rqt);

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

}