<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 06/02/2017
 * Time: 11:11
 */


function all($table, $where = null){

    $rqt = "SELECT * FROM $table";

    if ($where != null) 
        $rqt .= " WHERE $where ";

    return Database::getDb()->rqt($rqt);
}

function count_code($colone){

    $n = Database::getDb()->rqt("select count(*) as n from code where colonne ='$colone'");
    return $n[0]['n'];

}

/* ======================================================

  ==================================================== */

if ($_GET['page'] == "config.php" and isset ($_GET['param1'])) {

    include 'vue/ajax/' . $_GET['param1'] . '.php';

} else if ($_GET['controller'] == "ajax.php") {

    extract($_POST);
    if ($action == "add_kpi") {

        if ($delai_time == "J") $delai_time = "DAY";
        if ($delai_time == "H") $delai_time = "HOUR";

        $kpi = all("kpi", "abreviation='" . trim($abreviation) . "' AND id_service='{$_SESSION['service']['id']}' ");

        if (!empty($kpi)):

            echo 0;

        else:

            $id_ind = Database::getDb()->add("pourcentage", array('delai' => $delai, 'type_drgt' => trim(strtolower($type_drgt)), 'delai_time' => $delai_time));

            if ($id_ind > 0) {
                EventEmitter::getInstance()->on("notifyToService");

                echo $id = Database::getDb()->add("kpi", array('abreviation' => $abreviation,
                        'type_kpi' => 'pourcentage',
                        'id_indicateur' => $id_ind,
                        'id_service' => $_SESSION['service']['id'])
                );

                EventEmitter::getInstance()->emit(
                    "notifyToService", $_SESSION['service']['id'], "Nouveau KPI",
                    "Le KPI <span class='w3-text-teal'><b>$abreviation</b></span> vient d'être créé", URL . "app/reporting/nouveau/global",
                    "plus-square");
            }
        endif;

    } else if ($action == "add_gi") {

        $gi = all("nom ='$nom_gi'AND categorie ='$categorie' AND id_service='{$_SESSION['service']['id']}' ");

        if (!empty($gi)):
            echo 0;
        else:
            EventEmitter::getInstance()->on("notifyToService");

            echo $id_gi = Database::getDb()->add("groupe_intervention",
                array("nom" => strtoupper($nom_gi), "categorie" => $categorie, "id_service" => $_SESSION['service']['id']));

            EventEmitter::getInstance()->emit(
                "notifyToService", $_SESSION['service']['id'], "Nouveau GI",
                "Le groupe d'intervention <span class='w3-text-teal'><b>" . strtoupper($nom_gi) . "</b></span> vient d'être créé", URL . "app/reporting/nouveau/global",
                "plus-square");
        endif;

    }else if ($action == "suppr_gi"){
        
        if( Database::getDb()->modif("groupe_intervention" , "deleted" , 1 , "id" , $id_gi ) ){
            $_SESSION['groupe_intervention'] = all("groupe_intervention" , "deleted=0  AND ( is_modifiable=0 OR id_service={$_SESSION['service']['id']} ) ");
            echo 1;
        }
        else echo 0 ;

    }else if ($action == "add_ui") {

        $ui = all( "ui" , "nom='$nom_ui' ");
        if (!empty($ui)):
            echo 0;

        else:
            echo $id_ui = Database::getDb()->add("ui", array('nom' => strtoupper($nom_ui), 'id_groupe' => implode(';', $groupes)) );

        endif;

    } else if ($action == "update_ui") {

        if (Database::getDb()->modif("groupe_intervention", "id_uis", implode(';', $liste_ui), "id", $id_gi)) echo 1;
        else echo 0;

    } else if ($action == "suppr_kpi") {

        $kpi = all("kpi", "id = '$id' AND id_service ='{$_SESSION['service']['id']}' ");

        if (Database::getDb()->suppr($kpi[0]['type_kpi'], "id", $kpi[0]['id']) == true) {

            Database::getDb()->suppr("kpi", "id", $id);
            echo $kpi[0]['abreviation'];
        }

    } else if ($action == "get_file_code") {

        foreach (all("code", "colonne ='$colonne' ") as $code)
            $codes[] = array('signification' => utf8_encode($code['signification']), 'code' => $code['code']);

        echo json_encode($codes);

    } else if ($action == "list_table") {

        echo json_encode(all($table));

    } else if ($action == "getGIList") {

        echo json_encode( all(
            "groupe_intervention" ,
            "deleted=0  AND ( is_modifiable=0 OR id_service={$_SESSION['service']['id']} ) "
            )
        );

    } else if ($action == "getKpiList") {

        $_SESSION['kpi'] = all("kpi", " id_service='{$_SESSION['service']['id']}' ");
        echo json_encode($_SESSION['kpi']);

    } else if ($action == "list_files") {

        foreach (all("colonnes", "codification = 1 ") as $file) {
            $file_list[] = array('col' => $file['col_label'], 'nbre' => count_code($file['col_label']));
        }
        echo json_encode($file_list);
    }
    
} else if ($_GET['controller'] == "app.php") {

    $menu_n = $menu_l  = null;
    $menu_conf = "w3-text-blue";

    if ($_SESSION['service']['id_admin'] == $_SESSION['user']['id'] || $_SESSION['user']['privileges'] == 3)
        include PATH."/vue/app/configuration.php";

    else
        print "<div class='w3-panel w3-pale-red w3-leftbar w3-sand w3-xxlarge w3-serif '>
                <p><i class='fa fa-warning'></i>
                <i>Vous ne disposer pas de privilèges pour entrer dans cette partie.</i></p>
               </div>";

}
