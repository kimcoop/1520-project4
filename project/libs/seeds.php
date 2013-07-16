<?php

  include( 'libs/db.php' );
  include( 'libs/model.php' );

  include( 'models/user.php' );
  include( 'models/word.php' );
  
  define( "SAMPLE_FILE_ROOT", 'files/' );

  function clean() {

    echo "Resetting tables in database...<br/>";

    DB::run( "DROP TABLE IF EXISTS users" );
    DB::run( "DROP TABLE IF EXISTS words" );
    
  }

  function create_tables() {

    $users_sql = "CREATE TABLE users(
      id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
      user_id varchar(255) NOT NULL,
      email varchar(255) NOT NULL,
      password varchar(255) NOT NULL,
      UNIQUE INDEX unique_email( email )
      )";

    $words_sql = "CREATE TABLE words(
      id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
      word varchar(255) NOT NULL,
      UNIQUE INDEX unique_words( word )
      )";
  
    DB::run( $users_sql );
    DB::run( $words_sql );
    
  }

  function populate_table( $klass, $filename, $table=NULL ) {
    if ( $table == NULL ) 
      $table = $filename;
    $file = SAMPLE_FILE_ROOT . $filename . ".txt";
    if ( !file_exists( $file )) 
      return;
    echo "<li>$table ($filename.txt) </li>";
    $objects = file( $file );
    foreach( $objects as $line ) {
      $object = $klass::load_from_file( $line );
      DB::insert( $table, $object );
    }
  }

  function populate_tables() {

    echo "<strong>Populating words from file...</strong><br/>";
    populate_table( "Word", "words" );
  }


  /*
  *
  * MAIN
  *
  */

  clean();
  create_tables();
  populate_tables();

  echo "<br><strong>Done!</strong>";


?>