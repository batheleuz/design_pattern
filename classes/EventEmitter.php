<?php

/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 18/04/2017
 * Time: 11:36
 */
class EventEmitter{

    private static $_instance;
    /**
     * @var array contents listeners and there function.
     */
    private $listenners = [];

    public static function getInstance(){

        if (!self::$_instance) {
            self::$_instance = new EventEmitter();
        }
        return self::$_instance;
    }

    /**
     * @call function depuis notre pool evennement  $listenners.
     * @param $event Le nom de l'evennement
     * @param array ...$args
     */
    public function emit($event, ...$args){

        if (array_key_exists($event, $this->listenners)) {
            foreach ($this->listenners[$event] as $action)
                call_user_func_array($action, $args);
        }
    }

    /**
     * @param $event: Le nom de l'evenement.
     * @param $callback_Func null by default : le code de la function appeler.
     ******** On recupere la function $event () dans EventHandler si @param $callback_Func n'est pas renseigné.
     */
    public function on($event , $callback_Func = null ){

        if (!array_key_exists($event, $this->listenners))
            $this->listenners[$event][] = [];
        if( is_null($callback_Func) )
            $this->listenners[$event][] = EventHandler::getInstance()->$event();
        else{
            $this->listenners[$event][] = $callback_Func ;
        }

    }


}