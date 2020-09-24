<?php
include_once ('php.includes/admin.php');
include_once ('php.includes/session.php');

$adm=new admin();
$session = new session();
$error=0;
if(isset($_SESSION['user']))
{   
    $adm->setCurrentAdmin($session->getCurrentAdmin());
    header("Location:facturador.php");
}else{
    if(isset($_POST['user'])&&isset($_POST['pass']))
    {
        if($adm->loginAdmin($_POST['user'],$_POST['pass']))
        {
            $session->setCurrentAdmin($adm->getCurrentAdmin());
            $adm->setCurrentAdmin($_POST['user']);
            header("Location:facturador.php");
        }else{
            $error=1;
            include_once ('php.views\gestionlogin_view.php');
        }
    }else{
        include_once ('php.views\gestionlogin_view.php');
    }


}




?>