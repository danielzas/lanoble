<?php
header('Content-Type: text/html; charset=utf-8');
    include_once('php.includes/db.php');
    include_once('php.includes/user.php');
    include_once('php.includes/codigos.php');
    $db = new db();

    if(isset($_GET['producto'])){
        $tabla='';
        $nombre='%'.$_GET['producto'].'%';
    $query=$db->connect()->prepare('SELECT * FROM productos WHERE nombre LIKE ? ' );
    $query->bindValue(1, $nombre, PDO::PARAM_STR);

    $query->execute();
     $tabla='<table id="table" class="list__resultados-table" border="none">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Tipo</th>
            <th>Medida</th>
            <th>Precio</th>
        </tr>
        
    ';
    $resultado=$query->fetchAll();
    if($resultado)
    {
        
        foreach ($resultado as $res){
        $tabla.='<tr><td>'.$res['nombre'].'</td><td>'.$res['descripcion'].'</td><td>'.$res['tipo'].'</td><td>'.$res['medida'].'</td><td>'.$res['precio'].'</td></tr>';
    }
    echo $tabla.'</table>';
    }else{
        echo "producto no encontrado";
    }
}

$user=new user();
$cod = new codigos();
if(isset($_GET['dni']))
{
    $tabla='';
    $dni=$_GET['dni'];
$query=$user->connect()->prepare('SELECT * FROM clientes JOIN codigos WHERE  clientes.dni = codigos.dni AND clientes.dni = :dni ' );
/* $query->bindValue(1, $dni, PDO::PARAM_STR); */
$query->execute(['dni'=>$dni]);

/* $query->execute(); */
 $tabla='<table id="table"  border="none">
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Puntos</th>
    </tr>
    
';
$resultado=$query->fetch();
if($resultado)
{
    $tabla.='<tr><td id="dni">'.$resultado['dni'].'</td><td id="nombre">'.$resultado['nombre'].'</td><td>'.$resultado['apellido'].'</td><td id="puntosCliente">'.$resultado['puntos'].'</td></tr>';
    echo $tabla.'</table>';
}else{
    echo "Usuario no registrado";
}

}


if(isset($_GET['user']) && isset($_GET['puntosCanje']) && isset($_GET['puntos']))
{
    /* $val=$cod->checkPuntos($_GET['user'],$_GET['puntosCanje']); */
    if(($cod->checkPuntos($_GET['user'],$_GET['puntosCanje']))){
    $query=$cod->connect()->prepare('UPDATE codigos SET puntos=puntos - :puntosCanje + :puntos WHERE dni=:dni ');
    $query->execute(['puntosCanje'=>$_GET['puntosCanje'],'puntos'=>$_GET['puntos'],'dni'=>$_GET['user']]);
    if($query->rowCount()){
    echo 'Operacion Finalizada '.' Puntos Canjeados:'.$_GET['puntosCanje'].' , '.'Puntos Ganados:'.$_GET['puntos'];
}else{
    echo "Error en la operacion.";
}
    }else{
        echo "Error en la operacion";
    }

}



?>