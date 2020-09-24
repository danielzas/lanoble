<?php
include_once('db.php');

class productos extends db{
    private $nombre;
    private $medida;
    private $precio;
    private $descripcion;
    private $tipo;



/**buscar y listar productos */
public function searchProduct($prod)
                                 {
                                    $tabla='';
                                    $query=$this->connect()->prepare('SELECT * FROM productos WHERE nombre LIKE ? LIMIT 5' );
                                    $nombre='%'.$prod.'%';
                                    $query->bindValue(1, $nombre, PDO::PARAM_STR);
                                    $query->execute();
                                    $resultado=$query->fetchAll();
                                    $tabla='<table id="table" class="list__resultados-table" border="none">
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Tipo</th>
                                        <th>Medida</th>
                                        <th>Precio</th>
                                    </tr>
                                    
                                ';
                                    if($resultado)
                                         {
                                            foreach ($resultado as $res){
                                                $tabla.='<tr>
                                                <td id="codigo" name="codigo">'.$res['cod'].'</td>
                                                <td><input type="text" id="nombre" value="'.$res['nombre'].'" disabled ></td>
                                                <td><input type="text" id="descripcion" value="'.$res['descripcion'].'" disabled ></td>
                                                <td><select onchange="cambiarTipo(event)" id="tipo" disabled><option value="'.$res['tipo'].'" selected>'.$res['tipo'].'</option></select></td>
                                                <td><select id="medida" disabled><option value="'.$res['medida'].'" selected>'.$res['medida'].'</option></select></td>
                                                <td><input type="text" id="precio" value="'.$res['precio'].'" disabled ></td>
                                                <td><i class="far fa-trash-alt" id="iconGarbage" onclick="eliminar(event)"></i></td>
                                                <td><i class="fas fa-edit" id="iconEdit" onclick="habilitar(event)"></i></td>
                                                <td></td>
                                                </tr>';
                                            }
                                            echo $tabla.'</table>';
                                            }else{
                                                echo "producto no encontrado";
                                            }
                                 }
public function set()
      {
           $query=$this->connect()->prepare("describe productos tipo" );
            $query->execute();
            $resultado=$query->fetch();
            if($resultado)
                        {
                             $longitud=strlen($resultado[1]);
                             $elementos=substr($resultado[1],4,$longitud - 5);
                             $elementos=str_replace("'","",$elementos);
                             $ele_array=explode(",",$elementos);
                             $longitud=count($ele_array);
                                           /* $options='<select>"'; */
                             $info=json_encode($ele_array);
                                 echo $info;
                                     }
      }

public function saveChanges($datos)
{
        $query=$this->connect()->prepare("UPDATE productos SET nombre = :nom, descripcion = :desc, tipo = :tipo , medida = :medida, precio = :precio WHERE cod = :cod");
        $query->execute(['nom'=>$datos->nombre,'desc'=>$datos->descripcion,'tipo'=>$datos->tipo,'medida'=>$datos->medida,'precio'=>$datos->precio,'cod'=>$datos->codigo]);
       
}
                    
                                
}

$p = new productos();

if(isset($_GET['options'])==1){
$p->set();
}

/**llamada buscar y listar productos */
if(isset($_GET['producto']))
{
   $p->searchProduct($_GET['producto']);
}

/**eliminar producto*/
if(isset($_GET['codigo'])){
   $query=$p->connect()->prepare('DELETE FROM productos WHERE cod = :cod');
   $query->execute(['cod'=>$_GET['codigo']]);
   if($query->rowCount())
   {
       echo "Articulo eliminado correctamente.";
   }
}

if(isset($_GET['datos']))
{
    $datos=json_decode(stripslashes($_GET['datos']));
    $p->saveChanges($datos);
}
/***************probar */

/*********nuevo dato*** */

if(isset($_POST['nombre']))
{
$query=$p->connect()->prepare('INSERT INTO productos VALUES(null,:nom,:des,:tipo,:med,:pre)');
$query->execute(['nom'=>$_POST['nombre'],'des'=>$_POST['descripcion'],'tipo'=>$_POST['tipo'],'med'=>$_POST['medida'],'pre'=>$_POST['precio']]);
if($query->rowCount())
{
    echo "Los datos se guardaron correctamente.";
}else{
    echo "Error.Intente Nuevamente.";
}
}
?>