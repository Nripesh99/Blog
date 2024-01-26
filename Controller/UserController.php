<?php
// @include '../Model/database.php';
// @include '../../Model/database.php';
class UserController{
    function __construct(){
        $this-> handleRequest();

    }
    public function handleRequest(){
        if(isset($_GET['page'])){
            if($_GET['page'] === 'viewUser'){

                $this->viewUser($_GET['id']);
            }
        }
    }
    public function viewUser($id){
        $database=new Database;
        $row=$database->select('user', 'user_id', $id);
        return $row;
    }
    
}
?>