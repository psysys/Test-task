<?php
namespace app\core;

class Dbase {
    
    public function getConnection(){
        $params = include '../app/config/config.php';
        
        $db = new \PDO($params['db']['dsn'],$params['db']['username'],$params['db']['password']);
        $db->exec("set names ".$params['db']['charset']);
        
        return $db;
    }
}
