<?php
  
  require_once( 'functions.php' ); // includes session_start()

  define( "ROUNDS_NEW", "rounds_new" );
  define( "SCORES_NEW", "scores_new" );
  define( "SCORES_INDEX", "scores_index" );

  define( "ERROR", 500 );
  define( "OK", 200 );

  if ( isset($_GET['action']) ):
    switch ( $_GET['action'] ) {
      case ROUNDS_NEW:
        $word = Word::get_random();
        $json = array();
        $json[ 'word'] = $word->word;
        echo json_encode( $json );
        break;
      case SCORES_INDEX:
        $scores = Score::find_all();
        usort( $scores, 'sort_by_points' );
        echo json_encode( $scores );
        break;
    }
    exit;
  endif;

  if ( isset($_POST['action']) ): 
    switch ( $_POST['action'] ) {
      case SCORES_NEW:
        $expire = time() + 60 * 60 * 24 * 30;
        setcookie( "username", $_POST['username'], $expire ); // set cookie to what user passed in
        if ( Score::create( $_POST['points'], $_POST['username'] )) {
          $message = "Scored saved successfully.";
          $status = OK;
        } else {
          $message = "Error saving score.";
          $status = ERROR;
        }
        echo json_encode( array("message"=>$message, "status"=>$status ));
        exit;
      default:
        var_dump( $_POST);
        break;
    }
    exit;
  endif;

  echo json_encode( array("message"=>"oops!", "status"=>ERROR, "post"=>$_POST, "get"=>$_GET ));
  exit;

?>