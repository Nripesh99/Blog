<?= include '../layout/header.php' ?>
<?php
include '../../Controller/BlogController.php';
include '../../Controller/CategoryController.php';
$category = new CategoryController;
$row = $category->viewCategory();
$row2 = $category->viewCategory();

?>
<div class="container mt-5">

    <label for="category">Category</label>
    <select name="category" id="category">
        <option value="">Select Category</option>
        <?php foreach ($row as $rows): ?>
            <?php if (empty($rows['category_parent_id'])): ?>
                <option value="<?= $rows['category_id']; ?>">
                    <?= $rows['category_name']; ?>
                </option>
            <?php endif; ?>
    </select>
    <?php endforeach; ?>

    <label for="subCategory">Sub Category</label>
    <select name="subCategory" id="subCategory">
        <option value="">Select Sub Category</option>
        <?php foreach ($row2 as $rows): ?>
            <?php if (isset($rows['category_parent_id'])): ?>
                <option value="<?= $rows['category_id']; ?>" data-parent-id="<?= $rows['category_parent_id']; ?>"
                    class="subCategoryOption">
                    <?= $rows['category_name']; ?>
                </option>
            <?php endif; ?>
        <?php endforeach; ?>
        
    </select>

    <script>
        $(document).ready(function () {
            $('.subCategoryOption').hide();

            $('#category').change(function () {
                var selectedCategoryId = $(this).val();
                // Hide all subcategory options
                $('.subCategoryOption').hide();
                // Show only relevant subcategory options
                $('.subCategoryOption[data-parent-id="' + selectedCategoryId + '"]').show();
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