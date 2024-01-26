
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
        <div class="comments-section px-3">
            <h4 class="px-3">Comments</h4>

            <!-- Example Comment -->
            <div class="comment px-3">
                <?php foreach($row3 as $rows3):?>
                <strong><?php echo isset($rows3['commenter_name']) ?$rows3['commenter_name'] : ''; ?></strong>
                </strong>
                <p><?php echo isset($rows3['comment_text']) ? $rows3['comment_text'] :''; ?></p>
                <?php endforeach; ?>
            </div>

        </div>

        <!-- Comment Form -->
        <div class="comment-form px-3">
            <h4>Add a Comment</h4>
            <form action="../../Controller/CommentController.php?page=addComment" method="post">
                <!-- You may want to add more fields such as Name, Email, etc. -->
                <div class="mb-3">
                    <label for="comment" class="form-label">Your Comment:</label>
                    <textarea class="form-control" name="comment_text" id="comment_text" rows="3" required></textarea>
                </div>
                <div class="container mt-4">

      <div class="media">
        <img src="user-avatar.jpg" class="mr-3" alt="User Avatar" style="width: 50px;">
        <div class="media-body">
          <h5 class="mt-0">John Doe</h5>
          <p>This is the first comment. It's great!</p>
          <small class="text-muted">Published on January 26, 2024</small>
          <button class="btn btn-sm btn-primary float-right">Reply</button>
        </div>
      </div>
                <input type="text" name="blog_id" id="blog_id" value="<?=$blog_id ?>" hidden >
                <input type="text" name="commenter_name" id="commenter_name" value="<?=$row3['name'] ?>" hidden>


                   <i> <button type="submit" class="btn btn-primary btn-sm mb-1 bi bi-arrow-up-circle-fill float-right ">Comment</button></i>
            </form>
        </div>
    </div>

