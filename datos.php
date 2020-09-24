<?php
ob_start();
include_once 'php.includes/session.php';
include_once 'php.includes/user.php';

$error=0;
$session=new session();
$user=new user();
if(isset($_SESSION['dni']))
{
$user->setUser($session->getCurrentUser());
include_once 'php.views/sesion_datos.php';   


    if(isset($_POST['submit']))
        {
               
           if($user->updateUser($_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['celular'],$_POST['nacimiento'],$_POST['password'],$_POST['password2'],$_POST['sexo']))
           {
            
            echo "<meta http-equiv='refresh' content='0'>";
                
           }else{
             
              $session->closeSession();
              
              header('Location: error.php');
              
              exit();

              //no me cierra del todo la sesión, si actualizo la pagina me retoma la sesion. Estudiar cookies en php para tratar de resolver este punto. 
           }
         
        }
             
}else{
    echo '<h1>Debes loguearte</h1>';
}

ob_end_flush();
?>