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
            }elseif($_GET['page'] === 'addCommentReply'){
                $this->addCommentReply();
            }elseif($_GET['page']=== 'addCommentJ'){
                $this->addCommentJ($_GET['blog_id']);

            }
        }
    }
    function addComment()
    {
        session_start();
        if(!isset($_SESSION['user_id'])){
            $_SESSION['toastr'] = array(
                'type' => 'success', // or 'success' or 'info' or 'warning'
                'message' => 'File added succesfully!',
            );
            header("Location:../view/login.php");
            die();
        }
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

    function addCommentReply(){
        session_start();
        $newCategory = array(
            'blog_id'=>$_POST['blog_id'],
            'commenter_name'=>$_POST['commenter_name'],
            'comment_text'=>$_POST['comment_text'],
            'parent_comment_id'=>$_POST['parent_comment_id'],
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
        $condition = 'WHERE blog_id = ' . $blog_id . ' AND parent_comment_id IS NULL LIMIT 3';
        $result=$database->viewonLimit('comment',$condition);
        return $result;
    }
    function viewCommentReply($blog_id, $comment_id){
        $database=new Database();
        $condition = 'WHERE blog_id = ' . $blog_id . ' AND parent_comment_id = ' . $comment_id . ' ORDER BY comment_id DESC LIMIT 1';
        $result=$database->viewonLimit('comment',$condition);
        return $result;

    }
    function addCommentJ($blog_id){
        $database=new Database();
        $condition = 'WHERE blog_id = ' . $blog_id;
        $result=$database->viewonLimit('comment',$condition);


    // Return a JSON-encoded response
    echo json_encode($result);
    die();
    }

}
new CommentController;
?>