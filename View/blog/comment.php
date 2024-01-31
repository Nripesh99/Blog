<!-- Example Comment -->
<!--$commentController = new CommentController;
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
} -->
<div id="commentContainer">

    <?php foreach ($row4 as $rows3): ?>
        <div class="text-end">
            <small>
                <strong class="text-muted">
                    <?= isset($rows3['commenter_name']) ? $rows3['commenter_name'] : ''; ?>
                </strong>
                <small class="text-muted">
                    on
                    <?= $rows3['comment_timestamp']; ?>
                </small>
            </small>
        </div>
        <div class="border rounded px-2">
            <p>
                <?= isset($rows3['comment_text']) ? $rows3['comment_text'] : ''; ?>
            </p>
        </div>
        <?php $row6 = $commentController->viewCommentReply($row['blog_id'], $rows3['comment_id']); ?>
        <div class="w-75 p-3 ms-auto ">

            <?php foreach ($row6 as $rows6): ?>
                <div class="text-end">
                    <small>
                        <strong class="text-muted">
                            <?= isset($rows6['commenter_name']) ? $rows6['commenter_name'] : ''; ?>
                        </strong>
                        <small class="text-muted">
                            on
                            <?= $rows6['comment_timestamp']; ?>
                        </small>
                    </small>
                </div>
                <div class="border rounded px-2">
                    <p>
                        <?= isset($rows6['comment_text']) ? $rows6['comment_text'] : ''; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

        <form action="../../Controller/CommentController.php?page=addCommentReply" class="form-group reply-form"
            method="post" id="replyForm_<?= $rows3['comment_id'] ?>">
            <input type="text" name="parent_comment_id" value="<?= $rows3['comment_id'] ?>" hidden>
            <input type="text" name="blog_id" value="<?= $row['blog_id'] ?>" hidden>
            <input type="text" name="commenter_name" value="<?= $row3['name'] ?>" hidden>
            <label for="comment" class="form-label">Your Comment:</label>
            <input type="text" class="form-control" name="comment_text" required>
            <input type="submit" class="btn btn-primary">
        </form>
        <?php
        if (isset($_SESSION['user_id'])):
            ?>
            <div id="hideform_<?= $rows3['comment_id'] ?>">
                <div onclick="showForm('<?= $rows3['comment_id'] ?>')" class="btn btn-primary reply-btn">
                    <i class="bi bi-reply"></i>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>