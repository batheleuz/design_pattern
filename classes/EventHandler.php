<?php

/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 18/04/2017
 * Time: 13:14
 */
class EventHandler
{

    private static $_instance;

    public static function getInstance()
    {

        if (!self::$_instance) {
            self::$_instance = new EventHandler();
        }
        return self::$_instance;
    }

    static function userCreated()
    {

        return function ($firstname, $lastname) {

            echo $firstname . " " . $lastname . " a posté quelque chose ";

        };

    }

}