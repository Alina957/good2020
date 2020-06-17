<?php
class connectBD {
    private $host ="localhost";
    private $user ="alinamust";
    private $password ="123583";
    private $db ="kuxko";
    private $charset="utf8";
     //private $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
    private $opt =[
        PDO::ATTR_ERRMODE            =>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    public $pdo;
    function connect(){
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db;charset=$this->charset,$this->user,$this->password,$this->opt");

    }
    function closeConnect(){
        $this->pdo=null;
    }
}
?>