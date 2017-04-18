<?php

/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 18/04/2017
 * Time: 11:36
 */
class EventEmitter{

    private static $_instance ;
    private $listenners  = [];  // Enregistre la liste des listenner

    public static function  getInstance ( ){

        if( ! self::$_instance ){
          self::$_instance = new EventEmitter();
        }
        return self::$_instance;
    }

    /**
     * @param $event
     * @param array ...$args
     */
    public function emit ( $event , ... $args  ){
            if(array_key_exists( $event , $this->listenners )){
                var_dump($this->listenners[$event][1]);
                foreach ($this->listenners[$event] as $action )
                     call_user_func_array( $action , $args );
            }
    }

    /**
     * @param $event
     * @param $callable
     */
    public function on ( $event ){

        if(!array_key_exists($event , $this->listenners ))
             $this->listenners[$event][] = [] ;

        $this->listenners[$event][] = ActionHandler::getInstance()->userCreated();
    }

    
}