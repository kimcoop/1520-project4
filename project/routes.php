<?php
  
  require_once( 'functions.php' ); // includes session_start()

  switch ( $_GET['action'] ) {
    case "start_new_round":
      $word = Word::get_random();
      $json = array();
      $json[ 'word'] = $word->word;
      echo json_encode( $json );
      break;
    case "save_score":
      if ( Score::create( $_POST['score'], $_POST['username'] )) {
        $message = "Scored saved successfully.";
        $status = 200;
      } else {
        $message = "Error saving score.";
        $status = 500;
      }
      echo json_encode( array("message"=>$message, "status"=>$status ));
      break;
  }

?>