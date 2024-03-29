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

    .border {
        background-color: beige;
    }

    .reply-form {
        display: none;
        /* Hide the form by default */
        margin-top: 10px;
    }
</style>
<script>
    function showForm(commentId) {
        console.log(commentId)
        // Implement showForm function to display the corresponding reply form
        var replyForm = document.getElementById('replyForm_' + commentId);
        var hideForm = document.getElementById('hideform_' + commentId);
        hideForm.style.display = 'none';
        if (replyForm) {
            replyForm.style.display = 'block';
        }
    }

    function hideForm(commentId) {
        // Implement hideForm function to hide the reply form
        var replyForm = document.getElementById('replyForm_' + commentId);
        if (replyForm) {
            replyForm.style.display = 'none';
        }
    }


</script>
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
                    <!-- <div id="commentsContainer"> -->


                        <div class="comment px-3" id="commentsContainer">
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
                                <div class="w-75 p-3 ms-auto " id='repliesContainer'>
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
                                <div id="combineContainer">
                                    <form action="../../Controller/CommentController.php?page=addCommentReply"
                                        class="form-group reply-form" method="post"
                                        id="replyForm_<?= $rows3['comment_id'] ?>">
                                        <input type="text" name="parent_comment_id" value="<?= $rows3['comment_id'] ?>"
                                            hidden>
                                        <input type="text" name="blog_id" value="<?= $row['blog_id'] ?>" hidden>
                                        <input type="text" name="commenter_name" value="<?= $row3['name'] ?>" hidden>
                                        <label for="comment" class="form-label">Your Comment:</label>
                                        <input type="text" class="form-control" name="comment_text" required>
                                        <input type="submit" class="btn btn-primary">
                                    </form>
                                </div>
                                <?php
                                if (isset($_SESSION['user_id'])):
                                    ?>
                                    <div id="hideform_<?= $rows3['comment_id'] ?>">
                                        <div onclick="showForm('<?= $rows3['comment_id'] ?>')"
                                            class="btn btn-primary reply-btn">
                                            <i class="bi bi-reply"></i>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                    <!-- </div> -->

                    <div class="text-center">
                        <button class="btn btn-primary" id="seeMore">See more</button>
                    </div>
                </div>
                <!-- Comment Form -->
                <div class="comment-form px-3">
                    <?php if (isset($_SESSION['user_id'])): ?>

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
                        <?php endif; ?>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
<script>
    $(document).ready(function () {
        // Initial load of comments
        // loadComments();
        // Attach click event to the "See more" button
        $('#seeMore').click(function () {
            loadComments();
            $('#seeMore').hide();;
        });

        function loadComments() {
            // Make an AJAX request to fetch more comments
            $.ajax({
                url: '../../Controller/CommentController.php',
                type: 'GET',
                data: { page: 'addCommentJ', blog_id: <?php echo $row['blog_id']; ?> },
                success: function (response) {
                    var $responseArray = JSON.parse(response);
                    var comment = $responseArray['result'];
                    var replies = $responseArray['result2'];
                    var blog_id = <?php echo json_encode($_GET['blog_id']); ?>;

                    // Initialize an empty string to store the combined HTML
                    let combinedHtml = '';

                    for (let i = 0; i < comment.length; i++) {

                        let commentHTML = `
                        <div class="text-end">
                            <small>
                                <strong class="text-muted">${comment[i].commenter_name}</strong>
                                <small class="text-muted">on ${comment[i].comment_timestamp}</small>
                            </small>
                        </div>
                        <div class="border rounded px-2">
                            <p>${comment[i].comment_text}</p>
                        </div>
                `;

                        let replyHTML = '';
                        let combineHtml = '';

                        // Check if there are replies for this comment
                        if (replies[comment[i].comment_id] && replies[comment[i].comment_id].length > 0) {
                            for (let j = 0; j < replies[comment[i].comment_id].length; j++) {
                                replyHTML += `
                            <div class="w-75 p-3 ms-auto">
                                <div class="text-end">
                                    <small>
                                        <strong class="">${replies[comment[i].comment_id][j].commenter_name}</strong>
                                        <small class="text-muted">on ${replies[comment[i].comment_id][j].comment_timestamp}</small>
                                    </small>
                                </div>
                                <div class="border rounded px-2">
                                    <p>${replies[comment[i].comment_id][j].comment_text}</p>
                                </div>
                            </div>
                        `;
                            }
                        }

                        combineHtml = `
                    <form action="../../Controller/CommentController.php?page=addCommentReply" class="form-group reply-form" method="post" id="replyForm_${comment[i].comment_id}">
                        <input type="text" name="parent_comment_id" value="${comment[i].comment_id}" hidden>
                        <input type="text" name="blog_id" value="<?= $row['blog_id'] ?>" hidden>
                        <input type="text" name="commenter_name" value="<?= $row3['name'] ?>" hidden>
                        <label for="comment" class="form-label">Your Comment:</label>
                        <input type="text" class="form-control" name="comment_text" required>
                        <input type="submit" class="btn btn-primary">
                    </form>
                    <div id="hideform_${comment[i].comment_id}">
                                        <div onclick="showForm('${comment[i].comment_id}')"
                                            class="btn btn-primary reply-btn">
                                            <i class="bi bi-reply"></i>
                                        </div>
                                    </div>

                `;

                        // Concatenate the HTML strings for comment, replyHtml, and combineHtml
                        combinedHtml += commentHTML + replyHTML + combineHtml;
                        console.log(combinedHtml);
                    }

                    // Append the combined HTML to the commentsContainer
                    $('#commentsContainer').append(combinedHtml);



                },
                // Handle error if any
                error: function (error) {
                    console.log("Error fetching comments: ", error);
                }
            });
        }
    });
</script>

<?php include '../layout/footer.php' ?>