<?php
include '../layout/header.php';
if (isset($_SESSION['toastr'])) {
    $toastr = $_SESSION['toastr'];
    echo "<script>toastrFunction('{$_SESSION['toastr']['type']}', '{$_SESSION['toastr']['message']}');</script>";
    unset($_SESSION['toastr']);

}
?>
<?php
include '../../Controller/BlogController.php';
include '../../Controller/UserController.php';
include '../../Controller/CommentController.php';
$commentController = new CommentController;
$blogController = new BlogController;
$userController = new UserController;
$blog_id = $_GET['blog_id'];
$row = $blogController->viewBLogCondition($blog_id);
$user_id = $row['user_id'];
$row2 = $userController->viewUser($user_id);
$row4 = $commentController->viewComment($blog_id);
// var_dump($row4);
// die();
if (isset($_SESSION['user_id'])) {
    $user_id2 = $_SESSION['user_id'];
    $row3 = $userController->viewUser($user_id2);
}



?>
<style>
    .comments-section {
        margin-top: 20px;
    }

    .comment {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .comment-form {
        margin-top: 20px;
    }

    img {
        border: 2px solid black;
        border-radius: 10px;
        height: 300px;
        width: 500px;
    }

    .card-text {

        /* text-align: justify; */

        span {
            font-size: 30px;

        }
    }

     #table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

th {
  background-color: #f2f2f2;
  padding: 12px;
  text-align: left;
}

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    td {
        padding: 10px;
        border: 1px solid #ddd;
    }
    .border{
        background-color: beige;
    }
</style>
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8  mt-5 ">
            <div class="card">
                <div class="text-center">
                    <img src="../<?= $row['image'] ?>" class="card-img-fluid mt-5" id='img' alt="Blog Photo">
                </div>
                <h1 class="card-title text-center md-4 p-4">
                    <?= $row['title'] ?>
                </h1>

                <div class="card-body">
                    <p class="card-text">

                        <?= $row['content'] ?>
                </div>
                <small class="text-muted text-right">

                    Written by <strong>
                        <?= $row2['name'] ?>
                    </strong> on
                    <?= $row['date_published'] ?><br>
                </small>



                <!-- Comments Section -->
                <div class="comments-section px-3">
                    <h4 class="px-3">Comments</h4>

                    <!-- Example Comment -->
                    <div class="comment px-3">
                        <?php foreach ($row4 as $rows3): ?>
                            <div class="text-end">

                                <small><strong class="text-muted">
                                        <?php 
                                        echo isset($rows3['commenter_name']) ? $rows3['commenter_name'] : ''; ?>
                                    </strong> 
                                    <small class="text-muted">
                                    on
                                        <?php
                                        $date = $rows3['comment_timestamp']; // Change $row to $rows3
                                        echo $date;
                                        ?>
                                    </small>
                                </small> 
                            </div>
                            <div class="border  rounded px-2">

                                <p >
                                    <?php echo isset($rows3['comment_text']) ? $rows3['comment_text'] : ''; ?>
                                </p>
                            </div>
                          <a href="../../Controller/CommentController.php?page=addCommentReply&blog_id=$blogid&">  <i class="bi bi-reply"></i></a>
                          
                        <?php endforeach; ?>
                    </div>

                </div>
                <!-- Comment Form -->
                <div class="comment-form px-3">
                    <h4>Add a Comment</h4>


                    <form action="../../Controller/CommentController.php?page=addComment" method="post">
                        <!-- You may want to add more fields such as Name, Email, etc. -->
                        <div class="mb-3">
                            <label for="comment" class="form-label">Your Comment:</label>
                            <textarea class="form-control" name="comment_text" id="comment_text" rows="3"
                                required></textarea>
                        </div>
                        <input type="text" name="blog_id" id="blog_id" value="<?= $blog_id ?>" hidden>
                        <input type="text" name="commenter_name" id="commenter_name" value="<?= $row3['name'] ?>"
                            hidden>


                        <i> <button type="submit"
                                class="btn btn-primary btn-sm mb-1 bi bi-arrow-up-circle-fill float-right ">Comment</button></i>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</div>

<?php include '../layout/footer.php' ?>