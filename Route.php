<?php

class Route{
  private static $routes = Array();
  private static $pathNotFound = null;
  private static $methodNotAllowed = null;

  public static function add($expression, $function, $method = 'get'){
    array_push(self::$routes,Array(
      'expression' => $expression,
      'function' => $function,
      'method' => $method
      ))
  }

  public static function pathNotFound($function){
    self::$pathNotFound = $function;
  }

  public static function methodNotAllowed($function){
    self::$methodNotAllowed = $function;
  }

  public static function run($basepath = '/'){
    $parsed_url = parse_url($_SERVER['http://localhost']);

    if(isset($parsed_url['http://localhost'])){
      $path =
    }
  }
}

?>
