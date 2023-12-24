<?php

class Database{
    private  $dbhost = DB_HOST;
    private $dbname = DB_NAME;
    private $dbuser = DB_USER;
    private $dbpass = DB_PASSWORD;
    private $dbhandler;
    private $stmt;
    public function __construct(){
        $dbCon = "mysql:host=" .$this->dbhost .";dbname=" .$this->dbname;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

        ];
        try {
            $this->dbhandler = new PDO($dbCon,$this->dbuser,$this->dbpass,$options);
        }catch (PDOException $e){
            exit($e->getMessage());

        }
    }
    public function query($qry) {
        $this->stmt = $this->dbhandler->prepare($qry);
    }
    public function bind($name, $value,$type = ''){
        if(empty($type)){
            switch($value){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($name,$value,$type);
    }
    public function execute(){
        return $this->stmt->execute();
    }
    public function singleSet(){
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    public function multipleSet(){
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function rowCount(){
        $this->stmt->execute();
        return $this->stmt->rowCount();
    }
    public function lastInsertId(){
        return $this->dbhandler->lastInsertId();
    }


}
