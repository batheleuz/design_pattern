<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 20/04/2017
 * Time: 09:46
 */

function getService($idService){

    $service = Database::getDb()->all("service", "id", $idService);

    if (!empty($service))
        return $service[0]['direction']."/" .$service[0]['nom'];

    return;
}

if( $_GET['controller']  == "ajax.php"){

    extract($_POST);

    if($action == "getUserFromLDAP"){
        //$results = LdapConnection::getInstance()->filter("(cn=*)");
        print "Getting user from ldap";
    }
}

else if( $_GET['controller']  == "admin.php") {
    
     if(isset($_POST['cn'])){
         $_POST['cn'] = ($_POST['cn']!= "") ? $_POST['cn'] : "*" ;
         $results = LdapConnection::getInstance()->filter("(cn={$_POST['cn']})");
     }

    $menu = array(
        "users/liste" => "Utilisateurs",
        "users/ajouter" => "Importer"
    );

    $utilisateurs = "w3-theme-l5";

    //$results = LdapConnection::getInstance()->filter("(cn=*)");

    if( !isset($_GET['param1']))
        $_GET['param1'] = "liste";

    include PATH ."/vue/admin/".$_GET['param1']."-utilisateur.php";

}



