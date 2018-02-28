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


// Loader --------------------------------------------------------------------
function locate_template($template_names, $load = false, $require_once = true ) {
  $located = '';
  foreach ( (array) $template_names as $template_name ) {
    if ( !$template_name )
    continue;

    if ( file_exists(ABSPATH . '/' . $template_name)) {
      $located = ABSPATH . '/' . $template_name;
      break;
    }
  }

  if ( $load && '' != $located ) {
    if ( $require_once ) {
      require_once( $located );
    } else {
      require( $located );
    }
  }

  return $located;
}

function get_template_part( $slug, $args = array() ) {
  $templates = array();
  $templates[] = "{$slug}.php";
  $located = locate_template($templates);

  if($located) {
    if ( $args && is_array( $args ) ) {
      extract( $args );
    }

    include $located;
  }
}

function get_uniqid( $prefix = '' ) {
  return uniqid( $prefix );
}

function enqueue_google_font_files( $arr ) {
  $font_files = '';
  foreach( $arr as $key => $val) {
    if( array_search($key, array_keys($arr)) != 0 )
      $font_files = $font_files . '|';
    $font_files = $font_files . $key . ':' . implode(',', $val);
  }
  $font_files =  'https://fonts.googleapis.com/css?family=' . $font_files;
  enqueue_style('google-font-files', $font_files);
}
