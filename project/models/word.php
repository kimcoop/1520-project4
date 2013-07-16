<?php

  class Word extends Model {

    public $id, $word;

    function __construct() {
      parent::__construct();
    }

    public function get_values() {
      return array( $this->word);
    }

    public function __toString() {
      return "$this->id $this->word";
    }

    public function set_all( $id, $word ) {
      $this->id = $id;
      $this->word = $word;
    }

    /*
    *
    * CLASS METHODS
    *
    */

    public static function find_by_id( $id ) {
      return parent::where_one( 'words', "id='$id'" );
    }

    public static function where_one( $conditions ) {
      return parent::where_one( 'words', $conditions );
    }

    public static function where_many( $conditions ) {
     return parent::where_many( 'words', $conditions ); 
    }

    public static function get_properties() {
      return "word";
    }

    public static function load_record( $record ) {
      $word = new Word();
      $word->set_all( $record['id'], $record[ "word" ] );
      return $word;
    }

    public static function load_from_file( $line ) {
      $word = new Word();
      $word->set_all( -1, rtrim($line) ); // new entities have no ID
      return $word;
    }
  }


?>