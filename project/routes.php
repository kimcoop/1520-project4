<?php
  
  require_once( 'functions.php' ); // includes session_start()

  switch ( $_GET['action'] ) {
    case "start_new_round":
      $word = Word::get_random();
      $json = array();
      $json[ 'word'] = $word->word;
      echo json_encode( $json );
      break;
    case "quit":
      echo json_encode(' quit' );
      break;
  }

?>