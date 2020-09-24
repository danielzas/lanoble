<?php
include_once 'php.includes/user.php';
include_once 'php.includes/session.php';
include_once 'php.includes/codigos.php';


$user = new user();
$cod = new codigos();
$session = new session();
$error=0;
if(isset($_SESSION['dni']))
{
        header ('Location: login.php');
}else{
   if(isset($_POST['submit']))
   {
         $error=$user->newUser($_POST['dni'],$_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['celular'],$_POST['codigo'],$_POST['password'],$_POST['password2'],$_POST['sexo']="",$_POST['nacimiento']);
         if($error==0)
         {
         header ('Location: login.php?msj=$msj');
         }else{
                 $error=1;
         }
   }
}


include_once 'php.views/registro_view.php';
/* exit(); */
?>