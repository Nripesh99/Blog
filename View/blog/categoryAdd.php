<?php
// header.php
include '../layout/header.php';

// CategoryController.php
include '../../Controller/CategoryController.php';
$controller = new CategoryController;
$row = $controller->viewCategory();

?>

<div class="container justify-content-center ">
    <div class="row justify-content-center">
        <div class="col-md-4 ">
            <!-- Add Category Form -->
            <h4 class='text-center'>Add category</h4>
            <form action="../../Controller/CategoryController.php?page=addCategory" class="form-group border p-4 rounded shadow" method="post">
                <label for="category" class="form-label">Category Name</label>
                <input type="text" name="category" id="category" class="form-control mb-2">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="addCategorySubmit">Add Category</button>
                </div>
            </form>

            <h4 class='text-center'>Add sub Category</h4>
            <form action="../../Controller/CategoryController.php?page=addSubCategory" class="form-group border p-4 rounded shadow" method="post">
                <label for="category_parent_id" class="form-label">Choose a Category</label><br>
                <select name="category_parent_id" id="category_parent_id">
                    <?php
                    foreach ($row as $rows) {
                        echo '<option value="' . $rows['category_id'] . '">' . $rows['category_name'] . '</option>';
                    }
                    ?>
                </select><br>
                <label for="subCategory" class="form-label">Sub Category</label>
                <input type="text" name="subCategory" id="subCategory" class="form-control mb-2">
            <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="addSubCategorySubmit">Add Sub Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
