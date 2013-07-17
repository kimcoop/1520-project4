<?php

  class Game {

    public $rounds_played, $rounds_won;

    function __construct() {
      // parent::__construct();
    }

    function rounds_won() {
      return $this->rounds_won;
    }

    function rounds_lost() {
      return $this->rounds_played - $this->rounds_won;
    }

    function winning_percentage() {
      return $this->rounds_won / $this->rounds_played;
    }

    function to_json() {
      $json = array();
      $json[ 'rounds_played' ] = $this->rounds_played;
      $json[ 'rounds_won' ] = $this->rounds_won();
      $json[ 'rounds_lost' ] = $this->rounds_lost();
      $json[ 'winning_percentage' ] = $this->winning_percentage();
      return $json;
    }

    public function __toString() {
      // return "$this->id $this->word";
    }

    /*
    *
    * CLASS METHODS
    *
    */

    public static function find_all() {
      // return parent::find_all( 'words' );
    }
  }


?>