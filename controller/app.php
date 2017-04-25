<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 20/12/2016
 * Time: 11:15
 */

if ($_SESSION['user'] != null) {

    ob_start();

    require_once PATH."/modele/app/notifications.php";
    require_once PATH."/modele/app/". $_GET['page'];

    $content = ob_get_clean();

    include PATH.'/vue/template/app.php';

} else {

    include PATH."/vue/app/login.php";

}

