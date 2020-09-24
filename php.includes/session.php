<?php
    class session{
        public function __construct()
        {
            session_start();
        }

        public function setCurrentUser($dni)
        {
            $_SESSION['dni']=$dni;
        }
        public function setCurrentUserName($name){
            $_SESSION['name']=$name; 
        }

        public function getCurrentUser(){
        return $_SESSION['dni'];
         }
       public function getCurrentName(){
           return $_SESSION['name'];
       }

       public function setCurrentAdmin($user)
       {
           $_SESSION['user']=$user;
       }
       public function getCurrentAdmin(){
        return $_SESSION['user'];
    }
        public function closeSession(){
            session_unset();
            session_destroy();
            
        }
    }
?>