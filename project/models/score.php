<?php

  class Score extends Model {

    public $id, $score, $username;

    function __construct() {
      parent::__construct();
    }

    function __toString() {
      return "$this->score $this->username";
    }

    function get_rank() {

    }

    function get_values() {
      return array( $this->score, $this->username );
    }

    function set_all( $id, $score, $username ) {
      $this->id = $id;
      $this->score = $score;
      $this->username = $username;
    }

    /*
    *
    * CLASS METHODS
    *
    */

    public static function find_all() {
      return parent::find_all( 'scores' );
    }

    public static function get_properties() {
      return "score, username";
    }

    public static function load_record( $record ) {
      $score = new Score();
      $score->set_all( $record['id'], $record[ "score" ], $record[ "username" ] );
      return $score;
    }


  }


?>