<?php
include_once 'db.php';
include_once 'codigos.php';
$errors=0;
class user extends db{
        private $user;
        private $password;
        private $nombre;
        private $apellido;
        private $mail;
        private $tel;
        private $fecha;
        private $sexo;

public function userExists($dni,$pass)
{
    $pass=(hash('sha512',$pass));  
    
    $query=$this->connect()->prepare('SELECT * FROM clientes where dni= :dni and password= :pass');
    $query->execute(['dni'=>$dni,'pass'=>$pass]);

    if($query->rowCount())
    {
        return true;
    }else{
        return false;
    }
}


public function checkDNI($dni)
{
    $query=$this->connect()->prepare('SELECT * FROM clientes where dni= :dni ');
    $query->execute(['dni'=>$dni]);

    if($query->rowCount())
    {
        return true;
    }else{
        return false;
    }
}

public function setUser($dni)
{
     $query=$this->connect()->prepare('SELECT * FROM clientes where dni=:dni limit 1');
     $query->execute(['dni'=>$dni]);
     $result=$query->fetch();
     if($result)
     {
         $this->user=$result['dni'];
         $this->nombre=$result['nombre'];
         $this->apellido=$result['apellido'];
         $this->mail=$result['email'];
         $this->tel=$result['tel'];
         $this->sexo=$result['sexo'];
         $this->password=$result['password'];
         $this->fecha=$result['fecha_nacimiento']; 
       
     }
}

public function getUser()
{
     return $this->user;
}
public function getName()
{
     return $this->nombre;
}

public function getApe()
{
     return $this->apellido;
}

public function getTel()
{
     return $this->tel;
}

public function getMail()
{
     return $this->mail;
}
public function getSexo()
{
     return $this->sexo;
}
public function getPass()
{
     return $this->password;
}

public function getDate()
{
    return $this->fecha;
}
public function updateUser($nombre,$apellido,$mail,$tel,$fecha,$password1,$password2,$sexo)
{
    $this->nombre=$this->checkString($nombre);
    $this->apellido=$this->checkString($apellido);
    $this->mail=$this->checkMail($mail);
    $this->tel=$this->checkNum($tel);
    $this->sexo=$sexo;
    $this->password=$this->checkPassword($password1,$password2);
    $this->fecha=$fecha;
    if($this->mail && $this->tel && $this->password)
         {
             $this->finishUpdateUser();
            return true;
         }else{
             return false;
         }
     
}
/************************************************ */

private function checkString($str)
{
    $str=htmlspecialchars($str,ENT_QUOTES,'UTF-8');
    return $str;
}

private function checkMail($mail){
    $mail=filter_var($mail,FILTER_SANITIZE_EMAIL);
    if(filter_var($mail,FILTER_VALIDATE_EMAIL))
    {
        return $mail;
    }
    return false;
}

private function checkNum($tel)
{
  if(filter_var($tel,FILTER_VALIDATE_INT))
  {
      $tel=filter_var($tel,FILTER_SANITIZE_NUMBER_INT);
      if(filter_var($tel,FILTER_VALIDATE_INT))
      {
          return $tel;
      }else{
          return false;
      }    
  }
}

private function checkPassword($pass1,$pass2)
{
    if($pass1 === $pass2)
    {
        if(!$pass1)
        {
            return $this->getPass();
        }else{
        $pass1=hash('sha512',$pass1);
        return $pass1;}
    }else{
        return false;
    }
}

private function finishUpdateUser()
{
    $query=$this->connect()->prepare('UPDATE clientes 
                                     SET nombre= :nombre,apellido= :apellido , password= :password, tel= :tel, email= :email, fecha_nacimiento= :fecha,sexo = :sexo 
                                    WHERE dni = :dni');
    $query->execute(['nombre'=>$this->nombre,'apellido'=>$this->apellido,'password'=>$this->password,'tel'=>$this->tel,'email'=>$this->mail,'fecha'=>$this->fecha,'sexo'=>$this->sexo,'dni'=>$this->user]);
    $query->fetch();
}

/*************************ALTA USUARIO******************/

public function newUser($dni,$nombre,$apellido,$mail,$telefono,$codigo=false,$password1,$password2,$sexo,$fecha)
{
    $this->user=$this->checkNum($dni);
    $this->nombre=$this->checkString($nombre);
    $this->apellido=$this->checkString($apellido);
    $this->mail=$this->checkMail($mail);
    $this->tel=$this->checkNum($telefono);
    $this->fecha=$fecha;
    $this->sexo=$sexo;
    $this->password=$this->checkPassword($password1,$password2);
    $this->codigo=$this->checkNum($codigo);

    if(isset($this->user) && isset($this->nombre) && isset($this->apellido) && isset($this->mail) && isset($this->tel) && isset($this->fecha) && isset($this->sexo) && isset($this->password) && ($this->codigo || !$this->codigo ))
    {   
        if(!$this->checkDNI($this->user)){
                    $this->insertDB();
                    return 0;
            }else{
                    return 1;
                 }
    }else{
        return 1;
    }
}

private function insertDB()
{
    $query=$this->connect()->prepare('INSERT INTO clientes(dni, nombre, apellido, password, tel, email, fecha_nacimiento, sexo)
                                     VALUES(:dni, :nombre, :apellido, :password, :tel, :email, :fecha, :sexo)');
    $query->execute(['dni'=>$this->user,'nombre'=>$this->nombre,'apellido'=>$this->apellido,'password'=>$this->password,'tel'=>$this->tel,'email'=>$this->mail,'fecha'=>$this->fecha,'sexo'=>$this->sexo]);
    $query->fetch();

    $codigo = new codigos();
    $codigo->newCodigo($this->user);

    if($this->codigo)
            {
                $codigo->sumCount($this->codigo);
            }
        else{
            header('Location: error2.php');
        }
}
}
?>