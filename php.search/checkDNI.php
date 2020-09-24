<?php
header('Content-Type: text/html; charset=utf-8');
include_once '../php.includes/user.php';
$user=new user();

if(isset($_REQUEST['dni']) && $user->checkDNI($_REQUEST['dni']))
        {
           echo '<p class="formulario__error-activo">Usuario Registrado</p>';
        }


?>