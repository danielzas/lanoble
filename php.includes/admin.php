<?php
include_once 'db.php';

class admin extends db{
    private $user;
    private $pass;


    public function loginAdmin($name,$password)
    {
        $password=(hash('sha512',$password));  
        $query=$this->connect()->prepare('SELECT * FROM gestion WHERE user = :user and password = :pass limit 1');
        $query->execute(['user'=>$name,'pass'=>$password]);
        if($query->rowCount())
        {
            $this->user=$name;
            return true;
        }else{
            return false;
        }
    }

    public function setCurrentAdmin($name)
    {
        $this->user=$name;
    }

    public function getCurrentAdmin()
    {
        return $this->user;
    }

}

?>