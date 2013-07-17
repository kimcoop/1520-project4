<?php

session_start();

function __autoload($class) {
  $class = strtolower($class);
  if ( $class == 'usercourse' ) 
    $class = 'user_course';
  
  $file = 'models/' . $class . '.php';
  if ( file_exists( $file ))
    include $file;
  elseif ( file_exists( 'libs/'. $class . '.php' ))
    include 'libs/'. $class . '.php';
}

date_default_timezone_set( 'America/New_York' );

function was_posted( $name ) {
  return isset($_POST['action']) && $_POST['action'] == $name;
}

function sort_by_points( $a, $b ) {
  if ( $a->points == $b->points ) return 0;
  return ( $a->points > $b->points ) ? -1 : 1;
}

?>