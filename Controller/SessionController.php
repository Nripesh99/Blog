<?php
class SessionController{
    function __construct(){
        $this->handleRequest();
    }
    public function handleRequest(){
        if($_GET['session']==='sessionCheck'){
            $this->sessionCheck();
        }
    }
    public function sessionCheck(){
        if(empty($_SESSION['user_id'])){
            echo "couldn't access this page";
            header("Location:../ ");
            die();
        }
    }
}
?>