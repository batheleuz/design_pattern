<?php

/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 18/04/2017
 * Time: 13:14
 */
class EventHandler{

    private static $_instance;

    public static function getInstance(){

        if (!self::$_instance) {
            self::$_instance = new EventHandler();
        }
        return self::$_instance;
    }

    static function test(){
        return function ($firstname, $lastname) {
            echo $firstname . " " . $lastname . " a posté quelque chose ";
        };
    }

    static function serviceNotify(){
        return function( $id_service  , $title , $content , $link="#",  $fa_icon = "bell-o" ){
            $db = Database::getDb();
            $users=$db->all("user" , "service" , $id_service);
            foreach ( $users as $user )
                $db->add("notification" , array(
                "titre" => $title ,
                "contenu" => $content ,
                "for_user" => $user["id"],
                "id_service" => $id_service ,
                "href" => $link ,
                "fa_icon" => $fa_icon
            ));
        };
    }
}