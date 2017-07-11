<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 24/04/2017
 * Time: 14:53
 */

function getNotifications( $idService , $idUser ) {

    $rqt = "SELECT * FROM  notification WHERE id_service='$idService' AND for_user='$idUser'";
    
    return Database::getDb()->rqt( $rqt." ORDER BY id DESC LIMIT 10 " );
}

function newNotificationsNumber($idService , $idUser){
    
    $rqt = "SELECT COUNT(*) AS nb FROM notification WHERE id_service='$idService' AND for_user='$idUser' AND state=1 ";

    $res = Database::getDb()->rqt($rqt);
    
    return $res[0]['nb'];
}

if( $_GET['controller'] == "ajax.php"){

    extract($_POST) ;

    if($action === "getNotifications"){

        $number = newNotificationsNumber($_SESSION['service']['id'], $_SESSION['user']['id']) ;

        echo json_encode( array('number'=> $number ,'data' => getNotifications($_SESSION['service']['id'], $_SESSION['user']['id'])));

    }
    else if ($action === "viewNotification"){

        if (Database::getDb()->modif("notification", "state", 0 , "for_user", $_SESSION['user']['id']))
            echo 1;

    }

}