<?php
include_once 'session.php';

$cerrar = new session();
$cerrar->closeSession();

header("location: ../index.html");
?>