<?php
include_once('php.includes/session.php');
include_once('php.includes/user.php');
include_once('php.includes/codigos.php');

$userSession = new session();
$user= new user();
$cod_user = new codigos();
$error=0;
if(isset($_SESSION['dni'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    $cod_user->searchInfoCodigos($userSession->getCurrentUser());
    include_once 'php.views\sesion_view.php';

}else if(isset($_POST['dni']) && isset($_POST['password'])){
    
    $dniForm= $_POST['dni'];
    $passForm = $_POST['password'];
    

    $user = new user();
    $cod_user = new codigos();
    if($user->userExists($dniForm, $passForm)){
        $userSession->setCurrentUser($dniForm);#setear el dni de usuario en la sesion
        $user->setUser($dniForm);#buscar y setear las variables con la informacion del usuario logueado. 
        $userSession->setCurrentUserName($user->getName());#setear el nombre del usuario en la sesion
        $cod_user->searchInfoCodigos($dniForm);#buscar en la bbdd codigos informacion del usuario y setear variables. 
       include_once 'php.views\sesion_view.php'; #abrir pagina home del usuario. Utiliza los valores obtenidos arriba. 
    }else{
         $error=1;
         include_once 'php.views/login_view.php'; 
    }
}else{
    include_once 'php.views/login_view.php';
}
?>