<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 09/02/2017
 *
 */

if ($_GET['controller'] == "ajax.php") {

    extract($_POST);
    $_GLOBALS['service'] = $_SESSION['service'];
    $_SESSION['vr'] = Database::getDb()->all("formVrByDir");
    $_GLOBALS['ui'] = Database::getDb()->all("ui");
    $_GLOBALS['groupe_intervention'] = Database::getDb()->rqt("SELECT * FROM groupe_intervention WHERE deleted=0  AND (is_modifiable = 0 or id_service = '{$_GLOBALS['service']['id']}') ");
    $_GLOBALS['kpi'] = Database::getDb()->all("kpi", "id_service", $_GLOBALS['service']['id']);

    if ($action == "getDistincts") {

        $start = preg_replace("#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#", "$3-$1-$2", $date_debut);
        $end = preg_replace("#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#", "$3-$1-$2", $date_fin);
        $values = Database::getDb()->rqt("SELECT DISTINCT $colonne  as val FROM  drgt_releves where date_rel  BETWEEN '$start' AND '$end' ");
        print json_encode($values);

    } else if ($action == "enrgLastReporting") {

        $monfichier = "datas/services/" . $_SESSION['service']['nom'] . "/tmp_file.json";
        $last_reporting = file_get_contents($monfichier);
        $lr = json_decode($last_reporting, TRUE);
        fclose($monfichier);

        if (trim($classe) == "ReportingGlobalBuilder")
            $rep = new ReportingGlobalBuilder($lr['name'], $lr['direction'], $lr['groupe_intervention'], $lr['column_kpi'], $lr['dates'], $lr['par'], $_GLOBALS);
        else if (trim($classe) == "ReportingAutreBuilder")
            $rep = new ReportingAutreBuilder($lr['name'], $lr['direction'], $lr['column'], $lr['column_kpi'], $lr['dates'], $lr['par'], $_GLOBALS);

        if (ReportingCRUD::isExistant($_SESSION['service']['nom'], $lr['name'], $lr['par']) == TRUE) echo -1;

        else {
            if (ReportingCRUD::append($_SESSION['service']['nom'], $lr['name'], $lr['par'], $_SESSION['user']['login'], trim($classe), $rep->serialize(), Date('Y-m-d h:i:s')) > 0){
                echo 1;
                EventEmitter::getInstance()->on("notifyToService");
                EventEmitter::getInstance()->emit(
                    "notifyToService", $_SESSION['service']['id'], "Nouveau Projet",
                    "{$_SESSION['user']['login']} a enregistré un nouveau projet : {$lr['name']} ", URL."app/reporting/liste/fichier", "folder-o");
            }
            else echo 0;
        }

    } else if ($action == "supprReporting") {

        if (ReportingCRUD::remove($_SESSION['service']['nom'], $id) > 0)
            echo 1;
        else echo 0;

    } else if ($action == "openReporting") {
        
        $data = ReportingCRUD::getReportingById($_SESSION['service']['nom'], $id);
        $data['contenue'] = unserialize($data['contenue']);
        print json_encode($data);

    } else if ($action == "getAvailableReportings") {

        $today = new DateTime(Date("Y-m-d"));
        $start = new DateTime($dateD);
        $end = new DateTime($dateF);

        $diff = $start->diff($end, true);
        $interval = $today->diff($end, true);

        $pas = $diff->days + 1;

        $nb = round($interval->days / $pas);

        $dates[] = array('start' => $start->format("d/m/Y"), 'end' => $end->format("d/m/Y"));

        if ($pas >= 28 && $pas <= 31 ) {
            for ($i = 0; $i < $nb; $i++)
                $dates[] = array('start' => $start->modify(" next month ")->format("d/m/Y"),
                    'end' => $end->modify('last day of next month')->format("d/m/Y"));
        } else {
            for ($i = 0; $i < $nb; $i++)
                $dates[] = array('start' => $start->modify(" +$pas days ")->format("d/m/Y"),
                    'end' => $end->modify(" +$pas days ")->format("d/m/Y"));
        }
        echo json_encode(array_reverse($dates));
    }

} else {
    require_once 'reporting_functions.php';
    $menu_n = null;
    $menu_lf = null;
    $menu_ld = null;
    $menu_conf = null;

    if (isset($_GET['param3']) && isset($_GET['param2']) && isset($_GET['param1'])) {

        $menu_ld = "w3-deep-orange";
        include 'modele/calcule.php';

    } else if (isset($_GET['param2']) && isset($_GET['param1'])) {

        if ($_GET['param1'] == "liste" && $_GET['param2'] == "fichier") {

            $menu_lf = "w3-deep-orange";
            $reports = Database::getDb()->rqt("SELECT * FROM fichier");

            include PATH.'/vue/app/reportingFiles.php';

        } else if ($_GET['param1'] == "nouveau" && $_GET['param2'] == "global") {

            $menu_ng = "w3-deep-orange";
            $pageTitle = "Nouveau Reporting global";
            include PATH.'/vue/app/newReporting.php';

        } else if ($_GET['param1'] == "nouveau" && $_GET['param2'] == "autre") {

            $menu_na = "w3-deep-orange";
            $pageTitle = "Autre type de reporting";
            include PATH.'/vue/app/newReporting.php';

        }
        else if ($_GET['param1'] == "nouveau" && $_GET['param2'] == "tc") {

            $menu_tc = "w3-deep-orange";
            $pageTitle = "Reporting Temps de Cycle ";
            include PATH.'/vue/app/newReporting.php';

        }

    } else if (isset($_GET['param1'])) {

        if ($_GET['param1'] == "nouveau") {

            $menu_ng = "w3-deep-orange";
            $pageTitle = "Nouveau Reporting";
            include PATH.'/vue/app/newReporting.php';

        } else if ($_GET['param1'] == "upload") {

            $menu_up = "w3-deep-orange";
            include PATH.'/vue/app/uploadForm.php';

        }

    }

}