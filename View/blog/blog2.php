<?php include '../layout/header.php' ?>
<?php
if (isset($_SESSION['toastr'])) {
    $toastr = $_SESSION['toastr'];
    echo "<script>toastrFunction('{$_SESSION['toastr']['type']}', '{$_SESSION['toastr']['message']}');</script>";
    unset($_SESSION['toastr']);

}

?>
<?php
include '../../Controller/BlogController.php';
$blog = new BlogController;
$rows = $blog->viewBlog();
$limit = 6;
if (isset($_GET['pages'])) {
    $page = $_GET['pages'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;
$rowsNew = $blog->viewBLoglimit($offset, $limit);
// echo '<pre>';
// var_dump($rowsNew);
// echo '</pre>';
// die();

$rows2 = $blog->recommendBlog();
?>

<style>
    .card {
        border: 2px solid #a5aacb;
        margin-bottom: 8px;
        border-radius: 10px;
        background-color: #a5aacb;
        text-align: center;
    }

    a {
        margin-left: 5px;
    }

    .card:hover {
        transform: scale(1.005);
    }



    .col {
        background-color: #a5aacb;
        border-radius: 10px;
    }

    h4 {
        margin-top: 20px;

    }

    a {}
</style>
<div class="container">
    <h2 class='text-center mt-2'>Blog</h2>
    <div class="row">
        <?php foreach ($rowsNew as $row) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <h3 class="card-title">
                        <?= $row['title'] ?>
                    </h3>
                    <p class="card-text">
                        <?= $row['date_published'] ?>
                    </p>
                    <img class="card-img" src="<?= '../' . $row['image'] ?>" alt="<?= $row['title'] ?>" width="300"
                        height="200">
                    <div class="card-body">
                        <a href="viewblog.php?blog_id=<?= urlencode($row['blog_id']) ?>" class="btn btn-primary">View
                            More</a>
                        <?php
                        if (isset($_SESSION['user_id']) && $_SESSION['user_id']) {
                            echo '<a href="editblog.php?blog_id=' . urlencode($row['blog_id']) . '" class="btn btn-primary">Edit</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php
    $row_new = count($row) + 1;
    $limit = 6;
    $total_page = ceil($row_new / $limit);

    echo '<ul class="pagination">';

    for ($i = 1; $i <= $total_page; $i++) {
        $active = ($i == $page) ? 'active' : '';
        echo "<li class='page-item $active'><a class='page-link' href='blog2.php?pages=$i'>$i</a></li>";
    }

    echo '</ul>';
    ?>


    <!-- <li class="active"><a>1</a></li>
        <li><a>3</a></li> -->
    </ul>
    <h4 class="text-center">Recommended posts</h4>
    <div class="row">
        <div class="col">

            <ol>
                <?php foreach ($rows2 as $row2) { ?>
                    <li> <a href="viewblog.php?blog_id=<?= urlencode($row2['blog_id']) ?>">
                            <?= $row2['title']; ?>
                        </a><br>
                    </li>
                <?php } ?>
            </ol>
        </div>
    </div>


</div>

<?= include '../layout/footer.php' ?>