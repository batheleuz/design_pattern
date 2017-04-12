<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 12/04/2017
 * Time: 14:53
 */
if( $_GET['controller'] == "ajax.php"){
    extract($_POST);

     if($action ==  "addService"){
         $nom = strtoupper($nom);
         $direction = strtoupper($direction);

         $ser = Database::getDb()->rqt("SELECT * FROM service WHERE nom = '".$nom."'");

         if (!empty($ser))
             echo "Le service {$ser[0]['nom']} existe déjà : direction => {$ser[0]['direction']}";
         else {
             if ( mkdir( PATH."/datas/services/".$nom , 0777, true ) ) {
                 ReportingCRUD::createFile($nom);
                 echo $id_ser = Database::getDb()->add("service", array("nom" => $nom, "direction" => $direction));
             }else{
                echo "Impossible de créer le dossier ".PATH."/datas/services/".$nom;
             }
         }
     }
}
if( $_GET['controller'] == "admin.php" ){

    $menu = array (
        "services/liste" => "Liste des services",
        "services/nouveau" =>"Nouveau service"
    );

    $services = "w3-theme-l5";

    if( isset( $_GET['param1']) ){

        include 'vue/admin/'.$_GET['param1']."-service.php";

    }else{
        header("Location:".URL."admin/services/liste");
    }

}