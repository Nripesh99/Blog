<!--Add  blog -->

<?php
// @session_start();
ob_start();
include '../layout/header.php';
if(empty($_SESSION['user_id'])){
    $_SESSION['toastr'] = array(
        'type' => 'error', // or 'success' or 'info' or 'warning'
    'message' => 'Login To add blog',
    );
    header("Location:../login.php");
    die();
}
 ?>
<?php
include '../../Controller/BlogController.php';
include '../../Controller/CategoryController.php';
$category = new CategoryController;
$row = $category->viewCategory();
?>
<div class="container mt-5">
    <h1 class="text-center">Add Blog</h1>
    <form class="border p-4 rounded shadow" action="../../Controller/BlogController.php?page=addBlog" method="post" enctype="multipart/form-data">
        <label for="category">Category</label>
        <select name="category" class="form-control" id="category">
            <option value="">Select Category</option>
            <?php foreach ($row as $rows): ?>
                <?php if (empty($rows['category_parent_id'])): ?>
                    <option class="form-control" value="<?= $rows['category_id']; ?>"><?= $rows['category_name']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>

        <label for="subCategory">Sub Category</label>
        <select name="subCategory" class="form-control" id="subCategory">
            <option value="">Select Sub Category</option>
            <?php foreach ($row as $rows): ?>
                <?php if (!empty($rows['category_parent_id'])): ?>
                    <option class="form-control subCategoryOption" value="<?= $rows['category_id']; ?>" 
                            data-parent-id="<?= $rows['category_parent_id']; ?>"
                            style="display: none;">
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
            <div id="content"></div>
            <input type="text" name="content" id="hiddenContent" hidden>
        </div>

        <div class="text-center p-4">
            <button type="submit" class="btn btn-primary" id="submit">Add Blog</button>
        </div>
    </form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder: {
                uploadUrl: '../../Controller/BlogController.php?page=addImage'
            }
        })
        .then(editor => {
            console.log(editor);
            editor.model.document.on('change:data', () => {
                document.getElementById('hiddenContent').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>


