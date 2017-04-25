<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 05/04/2017
 * Time: 10:52
 */
$menu_conf_user = "w3-text-green";
if ($_GET['controller'] == "ajax.php") {

    extract($_POST);

    if ($action == "add_user") {

        $us = Database::getDb()->rqt("SELECT * FROM user WHERE  login='$login' ");

        if (!empty($us)):
            echo 0;
        else:
            $valeur = array("nom" => $nom, "prenom" => $prenom, "login" => strtolower($login), "icon" => $avatar,
                "service" => $_SESSION['service']['id'], "email" => $email, "privileges" => $privileges);
            echo $id_us = Database::getDb()->add("user", $valeur);

        endif;
    } else if ($action == "supprUser") {

        if ($_SESSION['user']['id'] != $id && $_SESSION['service']['id_admin'] != $id) {
            Database::getDb()->suppr("user", "id", $id);
            echo 1;

        } else
            echo 0;

    } else if ($action == "modUser") {

    }

} else {

    function tag($text, $color)
    {

        return "<div class='w3-tag  $color ' style='padding:2px;margin:2px;'>
            <div class='w3-tag $color w3-border w3-border-white' style='min-width:96px;'>" .
        "<span class='w3-small'>" . $text . " </span>" .
        "</div></div>";
    }

    function privilege($privNumber)
    {

        $arr = array(
            "read" => tag(" Lire reporting ", "w3-blue"),
            "create" => tag(" Créer reporting ", "w3-khaki"),
            "import" => tag(" Importer fichier ", "w3-green"),
            "admin" => tag(" Administrer ", "w3-red")
        );

        if ($privNumber == 0)
            return $arr['read'];

        if ($privNumber == 1)
            return $arr['create'] . $arr['read'];

        else if ($privNumber == 2)
            return $arr['import'] . $arr['create'] . $arr['read'];

        else if ($privNumber == 3)
            return $arr['admin'] . $arr['import'] . $arr['create'] . $arr['read'];

        return;
    }

    include 'vue/app/utilisateur.php';

}