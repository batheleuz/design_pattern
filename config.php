<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 12/12/2016
 * Time: 19:45
 */

/* * CHARGEMENT DE NOTRE AUTOLOADER ********* */

require "classes/Autoloader.php";
Autoloader::register();

/* * FIN ************************************ */

define("ADD_BD", "localhost");

define("NOM_BD", "reporting");

define("USER_BD", "root");

define("PASS_BD", "root");

define("URL", "http://localhost/design_pattern/");

define("ASSETS", URL . "assets/");

define("PATH", __DIR__);


