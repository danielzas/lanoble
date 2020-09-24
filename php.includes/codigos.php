<?php
include_once 'db.php';

class codigos extends db{
    private $codigo;//variable autoincremental en la bbdd
    private $puntos;
    private $dni;
    private $count;

    /* public function __construct()
    {
        parent::__construct();
        $this->dni=$dni;
    } */

    public function searchInfoCodigos($dni)
    {
      $query=$this->connect()->prepare('SELECT * FROM codigos WHERE dni= :dni');
      $query->execute(['dni'=>$dni]);
      $resultado=$query->fetch();
      if($resultado)
      {
      $this->codigo=$resultado['codigo'];
      $this->count=$resultado['count'];
      $this->puntos=$resultado['puntos'];
      $this->dni=$resultado['dni'];
      return true;
    }else{
        return false;
    }
        }

    public function searchCodigo($codigo)
    {
        $query=$this->connect()->prepare('SELECT * FROM codigos WHERE codigo=:cod');
        $query->execute(['cod'=>$codigo]);
        if($query->rowCount())
        {
            return true;
        }else{
            return false;
        }
    }
/*********get************* */
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getCount()
    {
        return $this->count;
    }
    public function getPuntos()
    {
        return $this->puntos;
    }
    public function getDNI()
    {
        return $this->dni;
    }

/***********alta**********/

public function newCodigo($dni)
{
    $query=$this->connect()->prepare('INSERT INTO codigos(codigo,count,dni,puntos) VALUES(null,:count,:dni,:puntos)');
    $query->execute(['count'=>0,'dni'=>$dni,'puntos'=>0]);
}

public function sumCount($codigo)
{
    $query=$this->connect()->prepare('SELECT * FROM codigos WHERE codigo = :codigo');
    $result=$query->execute(['codigo'=>$codigo]);
    $result=$query->fetch();
    if($result)
    {
        if($result['count'] < 3)
        {
        $query=$this->connect()->prepare('UPDATE codigos SET count=count + 1 where codigo=:cod');
        $query->execute(['cod'=>$codigo]);
        }else
        {
            echo 'supera mas de 3';
        }
    }
}



/*************actualizacion**********/
/* public function updatePoints($dni,$monto)
{
    $query=$this->connect()->prepare('SELECT * FROM codigos WHERE dni=:dni');
    $resultado=$query->execute(['dni'=>$dni]);
    if($resultado)
    {
        $nuevosPuntos=
    }else{
        $error='Error.Usuario no registrado.';
    }


} */

public function checkPuntos($dni,$puntos)
{
    $query=$this->connect()->prepare('SELECT * FROM codigos WHERE dni = :dni');
    $query->execute(['dni'=>$dni]);
    $resultado=$query->fetch();
    if($resultado)
    {
        if($puntos <= 50 && $puntos <= $resultado['puntos'] )
        {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
   
}

}

?>