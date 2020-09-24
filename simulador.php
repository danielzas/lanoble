<?php
include_once 'php.includes/session.php';

$session=new session();
if(isset($_SESSION['dni']))
{
include_once 'php.views/simulador.view.php';   

}else{
    header("Location: login.php");  
}


?>

