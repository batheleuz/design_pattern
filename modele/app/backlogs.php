<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 16/06/2017
 * Time: 18:22
 */

function updatedLast (){
    $res = Database::getDb()->rqt("SELECT DISTINCT id_fichier FROM drgt_encours ");
    $id_last_fic = $res[0]['id_fichier'];
    $res = Database::getDb()->all( "fichier" , "id" , $id_last_fic );
    return $res[0]['date_ajout'] ;
}

if ($_GET['controller'] == "ajax.php") {

    extract($_POST);

    if($action == "backlogNumbers"){
        
        $calculator = new BacklogCalculator( $direction , $nbre , updatedLast() );
        echo json_encode(array(
            "nbre" => $calculator->getCount() ,
            "backlog" => "Backlog ".$calculator->nbre." J",
            "dir" => $calculator->dir,
            "moy" => $calculator->getMoy() . " jours "
        )) ;
    }


    else if($action == "getBacklogCases"){

        $calculator = new BacklogCalculator( $direction , $nbre , updatedLast() );
        echo json_encode(
            $calculator->getBacklogs()
        ) ;
    }

}else{
     $menu_bg = "w3-deep-orange";
     $date_ajout_fr = preg_replace("#^([0-9]{4})-([0-9]{2})-([0-9]{2})$#" , "$3/$2/$1" , updatedLast() );
    include PATH . '/vue/app/backlogs.php';

}