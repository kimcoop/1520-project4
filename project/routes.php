<?php
  
  require_once( 'functions.php' ); // includes session_start()

  switch ( $_GET['action'] ) {
    case "start_new_round":
      $word = Word::get_random();
      $json = array();
      $json[ 'word'] = $word->word;
      echo json_encode( $json );
      break;
    case "quit": // TODO show stats etc
      echo json_encode(' quit' );
      break;
  }

  if ( $_GET['action'] == 'logout' ) {
    session_destroy();
    header('Location: index.php') ;
    exit();

  } elseif ( isset($_GET['student_search_term']) ) {
    $search_term = $_GET['student_search_term'];
    if ( $user = User::find_by_psid_or_name( $search_term )) {
      $user_id = $user->get_user_id();
      set_viewing_student( $user ); // store to session
      header( "Location: student.php?user_id=$user_id" );
    } else {
      $search = $_GET['student_search_term'];
      display_notice( "User <strong>$search</strong> not found.", 'error' );
      header( "Location: advisor.php" );
    }
    exit();

  } else {
    $str = 'Route '. $_GET['action'] .' not recognized.';
    display_notice( $str, 'error' );
    header('Location: index.php') ;
    exit();

  }

?>