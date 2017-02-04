<?php
/* This class exists so that we can use mysql/host in our DB class
It converts mysql/host to mysql[host] */
class Config {
  public static function get($path = null) {
    if ($path) {
      $config = $GLOBALS ['config'];
      $path = explode ( '/', $path );
      
      foreach ( $path as $bit ) {
        if (isset ( $config [$bit] )) {
          $config = $config [$bit];
        }
      }
      return $config;
    }
  }
}
?>
