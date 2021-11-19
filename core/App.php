<?php
require_once './database/Connection.php';
require_once './database/QueryBuilder.php';
require_once './exceptions/AppException.php';

class App{

    private static $container = [];

    public static function bind(string $key, $value){
        static::$container[$key] = $value;
    }

    public static function get(string $key){
        if(!array_key_exists($key, static::$container)){
            throw new AppException("No se ha encontrado la clave $key en el contenedor");
        }
        return static::$container[$key];
    }
}