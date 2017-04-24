<?php

/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 20/04/2017
 * Time: 10:15
 */
class LdapConnection{

    private static $instance;
    const DOMAIN_NAME = "cn=read-only-admin,dc=example,dc=com";
    const PASSWD = "password";

    private static $ldap_con;

    private function __construct(){
        ldap_set_option(self::$ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        self::$ldap_con = ldap_connect("ldap.forumsys.com");
    }

    /**
     * LdapConnection constructor.
     */
    public static function getInstance(){
        if( !self::$instance ) {
            self::$instance = new LdapConnection() ;
        }
        return self::$instance;
    }

    /**
     * @param $expression
     * @return array
     */
    public function filter( $expression ){
        // $filter = "(cn=Albert Einstein)" ;
        if ( ldap_bind( self::$ldap_con, self::DOMAIN_NAME , self::PASSWD ) ){
            $result = ldap_search(self::$ldap_con,  "dc=example,dc=com", $expression) or exit("Unable to search");
            return $entries = ldap_get_entries(self::$ldap_con, $result);
        }

    }
    
}