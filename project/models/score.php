<?php

  class Score extends Model {

    public $id, $points, $username;

    function __construct() {
      parent::__construct();
    }

    function __toString() {
      return "$this->points $this->username";
    }

    function get_rank() {

    }

    function get_values() {
      return array( $this->points, $this->username );
    }

    function set_all( $id, $points, $username ) {
      $this->id = $id;
      $this->points = $points;
      $this->username = $username;
    }

    /*
    *
    * CLASS METHODS
    *
    */

    public static function create( $points, $username ) {
      $score = new Score();
      $score->set_all( -1, $points, $username );
      return DB::insert( 'scores', $score );
    }

    public static function find_all() {
      return parent::find_all( 'scores' );
    }

    public static function get_properties() {
      return "points, username";
    }

    public static function load_record( $record ) {
      $score = new Score();
      $score->set_all( $record['id'], $record[ "points" ], $record[ "username" ] );
      return $score;
    }


  }


?>