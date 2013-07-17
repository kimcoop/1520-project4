<?php

  class User extends Model {

    public $id, $email, $password;

    function __construct() {
      parent::__construct();
    }

      /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source http://gravatar.com/site/implement/images/php/
     */
    function get_gravatar( $s = 80, $d = 'mm', $r = 'g', $atts = array() ) {
      $email = $this->get_email();
      $url = 'http://www.gravatar.com/avatar/';
      $url .= md5( strtolower( trim( $email ) ) );
      $url .= "?s=$s&d=$d&r=$r";
      return $url;
    }

    public function get_values() {
      return array( $this->email, $this->password );
    }

    public function set_all( $id, $email, $password ) {
      $this->id = $id;
      $this->email = $email;
      $this->password = $password;
    }

    public function __toString() {
      return "$this->email";
    }


    /*
    *
    * CLASS METHODS
    *
    */

    public static function create( $email, $password ) {
      $user = new User();
      $hashed_password = hash( 'sha256', $password );
      $user->set_all( $email, $password );
      return DB::insert( 'users', $user );
    }
    


    public static function load_record( $record ) {
      $user = new User();
      $user->set_all( 
        rtrim( $record[ "id" ]),
        rtrim( $record[ "email" ]),
        rtrim( $record[ "password" ])
      );
      return $user;
    }

    public static function get_properties() {
      return "email, password";
    }

    public static function signin( $email, $password ) {
      $hashed_password = hash( 'sha256', $password );
      if ( self::password_is_correct( $email, $hashed_password ) ) {
        $user = self::find_by_email( $email );
        session_start();
        $_SESSION[ 'user' ] = $user;
        
        $expire = time() + 60 * 60 * 24 * 30;
        setcookie( "email", $email, $expire ); // set cookie to what user passed in
        return $user;

      } else {
        return NULL;
      }
    }

    public static function password_is_correct( $email, $password ) {
      $user = self::find_by_email( $user_id );
      if ( !$user ) 
        return false;
      else
        return $password == $user->password;
    }

    public static function find_all() {
      return parent::find_all( 'users' );
    }

    public static function find_by_email( $email ) {
      return parent::where_one( 'users', "email='$email'" );
    }
  }
?>