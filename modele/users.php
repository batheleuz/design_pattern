<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 05/04/2017
 * Time: 10:52
 */

function tag( $text , $color ){
    return "<div class='w3-tag  $color ' style='padding:2px;margin:2px;'>
            <div class='w3-tag $color w3-border w3-border-white'>" .
            "<span class='w3-small'>".  $text ." </span>".
            "</div></div>" ;
}

function privilege( $privNumber ){

    $arr = array(
       "read"   => tag(" Lire reporting " , "w3-blue"),
       "create" => tag(" Créer reporting " , "w3-khaki" ) ,
       "import" => tag(" Importer fichier " , "w3-green") ,
       "admin" =>  tag(" Administrer " , "w3-red")
    );

    if( $privNumber == 0 )
        return $arr['read'] ;

    if( $privNumber == 1 )
        return  $arr['create'] . $arr['read'] ;

    else if( $privNumber == 2 )
        return $arr['import'] . $arr['create'] . $arr['read']  ;

    else if($privNumber == 3 )
        return  $arr['admin'] . $arr['import'] . $arr['create'] . $arr['read']   ;

    return;
}

include 'vue/app/utilisateur.php';