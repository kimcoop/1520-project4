<?php

  include( 'libs/db.php' );
  include( 'libs/model.php' );

  include( 'models/score.php' );
  include( 'models/word.php' );
  
  define( "SAMPLE_FILE_ROOT", 'files/' );

  function clean() {

    echo "Resetting tables in database...<br/>";

    DB::run( "DROP TABLE IF EXISTS users" );
    DB::run( "DROP TABLE IF EXISTS scores" );
    DB::run( "DROP TABLE IF EXISTS words" );
    
  }

  function create_tables() {

    $scores_sql = "CREATE TABLE scores(
      id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
      points varchar(255) NOT NULL,
      username varchar(255) NOT NULL
      )";

    $words_sql = "CREATE TABLE words(
      id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
      word varchar(255) NOT NULL,
      UNIQUE INDEX unique_words( word )
      )";
  
    DB::run( $scores_sql );
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