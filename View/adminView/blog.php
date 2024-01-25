<?php
include '../layout/header.php';
include '../../Controller/BlogController.php';
include '../../Controller/UserController.php';
$blog = new BlogController;
$user = new UserController;

$limit = 10;
if (isset($_GET['pages'])) {
    $page = $_GET['pages'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;
$rowsNew = $blog->viewBLoglimit($offset, $limit);

if (isset($_SESSION['toastr'])) {
    $toastr = $_SESSION['toastr'];
    echo "<script>toastrFunction('{$_SESSION['toastr']['type']}', '{$_SESSION['toastr']['message']}');</script>";
    unset($_SESSION['toastr']);

}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>S.no</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Date Published</th>
                        <th>Written by</th>
                        <th colspan=2>Action</th>
                    </tr>
                </thead>
                <?php
                $counter = 1;
                foreach ($rowsNew as $rows):
                    $row2 = $user->viewUser($rows['user_id']);
                    ?>
                    <tr class="text-center">
                        <td>
                            <?= $counter ?>
                        </td>
                        <td>
                            <?= isset($rows['title']) ? $rows['title'] : 'N/A'; ?>
                        </td>
                        <td> <img src="../../<?= $rows['image']; ?>" alt="Image" height="150px" width="150px"></td>
                        <td>
                            <?= isset($rows['date_published']) ? $rows['date_published'] : 'N/A'; ?>
                        </td>
                        <td>
                            <?= isset($row2['name']) ? $row2['name'] : 'N/A'; ?>
                        </td>
                        <td>
                            <a href="http://localhost:8000/View/blog/viewblog.php?blog_id=<?= $rows['blog_id'] ?>"
                                class="btn btn-primary btn-sm">View</a>
                        </td>
                        <td>
                            <?php $dynamicLocation = "../../Controller/BlogController.php?page=deleteBlog&blog_id="; ?>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="confirmDelete('<?= $dynamicLocation ?>',<?= $rows['blog_id'] ?>)">Delete</a>
                        </td>

                        </td>


                    </tr>
                    <?php
                    $counter = $counter + 1;
                endforeach;
                ?>
            </table>
            <?php
            $row_new = count($rowsNew) + 1;
            $total_page = ceil($row_new / $limit);

            echo '<ul class="pagination">';

            for ($i = 1; $i <= $total_page; $i++) {
                $active = ($i == $page) ? 'active' : '';
                echo "<li class='page-item $active'><a class='page-link' href='blog.php?pages=$i'>$i</a></li>";
            }

            echo '</ul>';
            ?>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'; ?>