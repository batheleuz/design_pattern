<?php

/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 18/04/2017
 * Time: 11:36
 */
class EventEmitter{

    private static $_instance ;
    /**
     * @var array contents listeners and there function. 
     */
    private $listenners  = [];

    public static function  getInstance ( ){

        if( ! self::$_instance ){
          self::$_instance = new EventEmitter();
        }
        return self::$_instance;
    }

    /**
     * @call function ( function witch name is  $event )
     * @param $event
     * @param array ...$args
     */
    public function emit ( $event, ... $args  ){
            if(array_key_exists( $event , $this->listenners )) {
                foreach ($this->listenners[$event] as $action )
                     call_user_func_array( $action , $args );
            }
    }

    /**
     * save the function from  @class EventHandler ( Closure or Callable) in $listenners with $event Key.
     * @param $event
     */
    public function on ( $event ){

        if(!array_key_exists($event , $this->listenners ))
             $this->listenners[$event][] = [] ;

        $this->listenners[$event][] = EventHandler::getInstance()->$event();

    }

    
}