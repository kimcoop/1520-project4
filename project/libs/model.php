<?php

  class Model {

    function __construct() {
      // TODO - move utilty functions into file and include it here
    }

    public static function update( $table, $entity, $updates ) {
      $pk = self::pk_for_table( $table );
      $where = "$pk='" . $entity->get( $pk ) . "'";
      return DB::update( $table, $updates, $where );
    }

    public static function insert( $table, $entity ) {
      return DB::insert( $table, $entity );
    }

    public static function class_for_table( $table ) {
      // this could be optimized. hard-coding strings is a ghetto hack ><
      switch ( $table ) {
        case "words":
          return "Word";
        default:
          return "User";
      }
    }

    public static function where_one( $table, $conditions ) {
      $klass = self::class_for_table( $table );
      $result = DB::where( $table, $conditions, 'one', $klass );
      return $result;
    }

    public static function where_many( $table, $conditions ) {
      $klass = self::class_for_table( $table );
      $collection =  DB::where( $table, $conditions, 'many', $klass );
      return $collection;
    }

    public static function find_by_id( $table, $id ) {
      $klass = self::class_for_table( $table );
      $conditions = "id='$id'";
      return DB::where( $table, $conditions, 'one', $klass );
    }

    public static function find_all( $table ) {
      $klass = self::class_for_table( $table );
      return DB::select_all( $table, $klass );
    }

    public static function delete_where( $table, $conditions ) {
      return DB::delete_where( $table, $conditions );
    }

  }


?>