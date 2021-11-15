<?php

require_once __DIR__ . '/../core/App.php';
class Connection 
{
    public static function make()
    {
        try{
            //Fijar la conexión en UTF8, de otra forma da problemas con acentos, etc
            //Fijar que cuando se produzca un error salte una excepción
            $config = App::get('config')['database'];
            $connection = new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']);
          }catch(PDOException $PDOException){
            die($PDOException->getMessage());
        }
        return $connection;
    }
}