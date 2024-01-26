<?php
@include_once '../Model/database.php';

class CommentController
{

    function __construct()
    {
        if (isset($_GET['page'])) {
            if ($_GET['page'] === 'addComment') {
                $this->addComment();
            }elseif($_GET['page'] === 'viewComment'){
                $this->viewComment($_GET['blog_id']);
            }
        }
    }
    function addComment()
    {
        session_start();
        $newCategory = array(
            'blog_id'=>$_POST['blog_id'],
            'commenter_name'=>$_POST['commenter_name'],
            'comment_text'=>$_POST['comment_text'],
        );
        $datbase = new Database;
        $result=$datbase->insert('comment', $newCategory);
       
        if($result){
            $_SESSION['toastr'] = array(
                'type' => 'success', // or 'success' or 'info' or 'warning'
                'message' => 'Comment  added succesfully!',
            );
            header('Location:http://localhost:8000/View/blog/viewblog.php?blog_id='. $_POST['blog_id']);
        }else{
            $_SESSION['toastr'] = array(
                'type' => 'warning', // or 'success' or 'info' or 'warning'
                'message' => 'Comment Failed',
            );
            header('Location:http://localhost:8000/View/blog/viewblog.php?blog_id='. $_POST['blog_id']);
        }
    }
    function viewComment($blog_id){
        $database=new Database();
        $condition = 'WHERE blog_id = ' . $blog_id . ' LIMIT 3';
        $result=$database->viewonLimit('comment',$condition);
        return $result;
    }

}
new CommentController;
?>