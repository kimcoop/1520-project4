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
  return isset( $_POST[$name] );
}

function current_user() {
  return $_SESSION['user'];
}

function is_logged_in() {
  return isset( $_SESSION['user'] );
}

// function sort_by_term( $a, $b ) {
//   if ( $a->term == $b->term )
//     return 0;
//   else
//     return ( $a->term < $b->term ? -1 : 1 );
// }

?>