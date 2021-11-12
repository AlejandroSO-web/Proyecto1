<?php
class Connection{

    public static function make($config){

        try{
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