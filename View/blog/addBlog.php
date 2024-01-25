<?= include '../layout/header.php' ?>
<?php
include '../../Controller/BlogController.php';
include '../../Controller/CategoryController.php';
$category = new CategoryController;
$row = $category->viewCategory();
?>
<div class="container mt-5">

    <h1 class="text-center">Add Blog</h1>
    <form class="border p-4 rounded shadow" action="../../Controller/BlogController.php?page=addBlog" method="post"
        enctype="multipart/form-data">
        <label for="category">Category</label>
<select name="category" id="category">
    <option value="">Select Category</option>
    <?php foreach ($row as $rows): ?>
        <?php if (empty($rows['category_parent_id'])): ?>
            <option value="<?= $rows['category_id']; ?>"><?= $rows['category_name']; ?></option>
        <?php endif; ?>
    <?php endforeach; ?>
</select>

<label for="subCategory">Sub Category</label>
<select name="subCategory" id="subCategory">
    <option value="">Select Sub Category</option>
    <?php foreach ($row as $rows): ?>
        <?php if (!empty($rows['category_parent_id'])): ?>
            <option value="<?= $rows['category_id']; ?>" 
                    data-parent-id="<?= $rows['category_parent_id']; ?>"
                    class="subCategoryOption" style="display: none;">
                <?= $rows['category_name']; ?>
            </option>
        <?php endif; ?>
    <?php endforeach; ?>
</select>
<script>
    $(document).ready(function () {
        $('#category').change(function () {
            var selectedCategoryId = $(this).val();
            $('.subCategoryOption').hide(); // Hide all subcategory options
            $('.subCategoryOption[data-parent-id="' + selectedCategoryId + '"]').show(); // Show only relevant subcategory options
        });
    });
</script>





        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="image">Add Image:</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="8" required></textarea>
        </div>

        <div class="text-center p-4">

            <button type="submit" class="btn btn-primary" id="submit">AddBlog</button>
        </div>
    </form>
</div>