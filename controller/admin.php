<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 20/12/2016
 * Time: 11:15
 */

if ($_SESSION['user'] != null) {

    ob_start();

    include PATH . "/modele/admin/" . $_GET['page'];

    $content = ob_get_clean();

    include PATH . '/vue/template/admin.php';

} else {

    include PATH . "/vue/admin/login.php";

}