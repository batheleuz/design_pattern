<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 12/12/2016
 * Time: 19:45
 */


/* * CHARGEMENT DE NOTRE AUTOLOADER ********* */

require  "classes/Autoloader.php";
Autoloader::register();

/* * FIN ************************************ */

define ("ADD_BD" , "localhost");

define ("NOM_BD" , "reporting" );

define ("USER_BD" , "root" );

define ("PASS_BD" , "root" );

define ("URL" , "http://localhost/design_pattern/");

define ("ASSETS" , URL."assets/");

define ("PATH" , __DIR__ );

$_GLOBALS['vr'] = Database::getDb()->all("formVrByDir");

$_GLOBALS['groupe_intervention'] = Database::getDb()->all("groupe_intervention");

$_GLOBALS['ui'] = Database::getDb()->all("ui");

$_GLOBALS['colonnes_encours']  =  Database::getDb()->all("colonnes" , "encours" , 1);

$_GLOBALS['colonnes_releves']  =  Database::getDb()->all("colonnes" , "releves" , 1);

foreach ($_GLOBALS['colonnes_encours'] as $col )
    $buffer[] = $col['col_label'];

$_GLOBALS['entete_encours'] = $buffer;

foreach ($_GLOBALS['colonnes_releves'] as $col )
    $buffer[] = $col['col_label'];

$_GLOBALS['entete_releves'] = $buffer;
