<?= include '../layout/header.php' ?>
<?php
include '../../Model/database.php';
$database = new Database;
$blog_id = $_GET['blog_id'];
$row = $database->select('blog', 'blog_id', $blog_id);
?>
<div class="container mt-5">
    <h2 class="text-center">Edit Blog</h2>
    <form class="border p-4 rounded shadow" action="../../Controller/BlogController.php?page=editBlog"
          method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" id="blog_id" name="blog_id" value="<?php echo $row['blog_id'] ?>" hidden>
            <input type="text" id="user_id" name="user_id" value="<?php echo $row['user_id'] ?>" hidden>

            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title'] ?>">
        </div>

        <div class="form-group">
            <label for="image">Add Image:</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="8"><?php echo $row['content'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="submit">Edit Blog</button>
    </form>
</div>
<?= include '../layout/footer.php' ?>
