<?php
/**
* Core Funtions
*
* @package Megghross
*/

define("SERVER", "107.170.194.72");
define("DB_NAME", "trackmyshuttle");
define("DB_USER", "trackmyshuttle");
define("DB_PASS", "trackmyshuttle");

//
//define("SERVER", "107.170.194.72");
//define("DB_NAME", "trackmyshuttle");
//define("DB_USER", "trackmyshuttle");
//define("DB_PASS", "trackmyshuttle");



/*---------------------------------------------------------------------------------------*/
 function dev_print($param = null)
{
    if ($param) {
        echo "<pre>";
        print_r($param);
        echo "</pre>";
    } else {
        echo "<pre>";
        print_r("NULL");
        echo "</pre>";
    }
}

/*---------------------------------------------------------------------------------------*/
 function dev_print_exit($param = null)
{
    if ($param) {
        echo "<pre>";
        print_r($param);
        echo "</pre>";
    } else {
        echo "<pre>";
        print_r("NULL");
        echo "</pre>";
    }
    exit();
}
