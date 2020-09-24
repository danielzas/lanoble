<?php
class db{
    private $host;
    private $port;
    private $db;
    private $user;
    private $pass;
    private $charset;
    public function __construct()
    {
        $this->host='localhost';
        $this->port='3308';
        $this->db='lanoble';
        $this->user='root';
        $this->pass='loco2015';
        $this->charset='utf8mb4';
    }

    public function connect()
    {
        try{
        $connection='mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->db.';charset='.$this->charset;
        $options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES=>false];
        $pdo=new PDO($connection,$this->user,$this->pass,$options);
        return $pdo;
    }catch(PDOExeption $e){
        print_r("Error connection:" . $e->getMessage());
    }
    }
}

?>