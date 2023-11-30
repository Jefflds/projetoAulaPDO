<?php

namespace App\persistence;

use App\SystemServices\MonologFactory;


class ConnectionFactory {

    static $dbuser="root";
    static $dbhost="127.0.0.1";
    static $dbname="users";
    static $dbpassword="";
    static $pdo;

     static function getConnectionInstance(){
        try{
            self::$pdo = new \PDO("mysql:host=".self::$dbhost.";dbname=".self::$dbname, self::$dbuser, self::$dbpassword);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            MonologFactory::getInstance()->info("Conexão Obtida com Sucesso!");
        } catch (\PDOException $e) {
            MonologFactory::getInstance()->info("Conexão Falhou!");
            MonologFactory::getInstance()->info($e->getMessage());
        }
        return self::$pdo;
    }
   
}


