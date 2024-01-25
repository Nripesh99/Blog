<?php include '../layout/header.php' ?>
<?php
include '../../Controller/BlogController.php';
include '../../Controller/UserController.php';
$blogController = new BlogController;
$userController = new UserController;
$blog_id = $_GET['blog_id'];

$row = $blogController->viewBLogCondition($blog_id);
$user_id = $row['user_id'];
$row2 = $userController->viewUser($user_id);
var_dump($row2);
die();
if(isset($_SESSION['user_id'])){
    $user_id2=$_SESSION['user_id'];
    $row3 = $userController->viewUser($user_id2);
}



?>
<style>
    /* .card {
        justify-content: center;
        margin-left: 35%;
    } */

    img {
        border: 2px solid black;
        border-radius: 10px;
        height: 300px;
        width: 500px;
    }

    .card-text {

        text-align: justify;

        span {
            font-size: 30px;

        }
    }
</style>
<div class="container-sm-md-4 ">
    <div class="row justify-content-center">
        <div class="col-md-8  mt-5 ">
            <div class="card">
                <h1 class="card-title text-center md-4 p-4">
                    <?= $row['title'] ?>
                </h1>

                <div class="text-center">
                    <img src="../<?= $row['image'] ?>" class="card-img-fluid mx-auto" alt="Blog Photo">
                </div>
                <div class="card-body">
                    <p class="card-text">

                    </p>
                    <span>
                        <?= $row['content']['0'] ?>
                    </span>
                    <?= substr($row['content'], 1) ?>
                </div>
                <small class="text-muted text-right">

                    Written by <strong>
                        <?= $row2['name'] ?>
                    </strong> on
                    <?= $row['date_published'] ?><br>
                </small>
            <?php include 'Comment.php'; ?>
            </div>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>