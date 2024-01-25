<?php
include '../Model/database.php';
class CommentController
{

    function __construct()
    {
        if (isset($_GET['page'])) {
            if ($_GET['page'] === 'addComment') {
                $this->addComment();
            }
        }
    }
    function addComment()
    {
        $newCategory = array(
            'commenter_name'=>$_POST['commenter_name'],
            'comment_text'=>$_POST['comment_text'],
        );
        $datbase = new Database;
        $result=$datbase->insert('comment', $newCategory);

    }

}
new CommentController;
?>