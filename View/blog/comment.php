<?php 

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
    </style>


        <!-- Comments Section -->
        <div class="comments-section">
            <h4>Comments</h4>

            <!-- Example Comment -->
            <div class="comment">
                <strong>John Doe:</strong>
                <p>This is an example comment. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>

        </div>

        <!-- Comment Form -->
        <div class="comment-form">
            <h4>Add a Comment</h4>
            <form action="../../Controller/CommentController.php?page=addComment" method="post">
                <!-- You may want to add more fields such as Name, Email, etc. -->
                <div class="mb-3">
                    <label for="comment" class="form-label">Your Comment:</label>
                    <textarea class="form-control" name="comment_text" id="comment_text" rows="3" required></textarea>
                </div>
                <input type="text" name="post_id" id="post_id" value="<?=$blog_id ?>" hidden >
                <input type="text" name="commenter_name" id="commenter_name" value="<?=$row3['name'] ?>" hidden>


                   <i> <button type="submit" class="btn btn-primary btn-sm mb-1 bi bi-arrow-up-circle-fill float-right ">Comment</button></i>
            </form>
        </div>
    </div>

