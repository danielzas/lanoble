<?php
include_once ('php.includes\session.php');

$session = new session();

if(isset($_SESSION['user']))
{
  include_once 'php.views\facturador.view.php';
}else
{
    header("Location:gestion.php");
}

?>