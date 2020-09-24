<?php
header('Content-Type: text/html; charset=utf-8');
include_once '../php.includes/codigos.php';

$cod=new codigos();

if(isset($_REQUEST['codigo']) && $cod->searchCodigo($_REQUEST['codigo']))
{
    echo '<p class="formulario__error-activo">Perfecto</p>';
}else
{
    echo '<p class="formulario__error-activo">Codigo Inexistente.Continuar si no cuenta con uno.</p>';
}
?>