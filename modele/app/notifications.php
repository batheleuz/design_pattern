<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 24/04/2017
 * Time: 14:53
 */

function getNotifications( $idService , $idUser = null , $state = null ) {

    $rqt = "SELECT * FROM  notification WHERE id_service = '$idService' " ;

    if( !is_null($state) && !is_null($idUser) ){
        $rqt .= "AND for_user='$idUser' and state='$state' " ;
    }
    return Database::getDb()->rqt( $rqt." ORDER BY id DESC LIMIT 10 " );
}

if( $_GET['controller'] == "ajax.php"){
    extract($_POST) ;
    if($action === "getNotifications"){

        $notifs = getNotifications( $_SESSION['user']['service'] ,  $user  ,  0 );

        if( $notifNumber != count($notifs) )
            echo json_encode($notifs);
        else  return;
    }
    else if ($action === "viewNotification" ){
        if (Database::getDb()->modif( "notification", "state" , 1 , "id"  , $notifID ) )
            echo 1;
    }

}