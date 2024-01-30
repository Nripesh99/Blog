<?php
include 'layout/header.php';
?>
<div class="container mt-5">
<div class="row justify-content-center"> 
        <div class="col-md-6">
            <form class="border p-4 rounded shadow" action="../Controller/LoginController.php?page=register"
                method="post" enctype="multipart/form-data">
                <h2 class="text-center">Register</h2>
                <div class="mb-4">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="cPassword" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" name="cPassword" id="cPassword"
                        onkeyup="validatePassword()" required>
                    <span id="message"></span>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Upload photo:</label>
                    <input type="file" class="form-control" name="file" id="file" required>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary" id="submit" disabled>Register</button>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function validatePassword() {
        var password = $("#password").val();
        var confirmPassword = $("#cPassword").val();
        var submitButton = $("#submit");

        if(password == "" || confirmPassword == ""){
            $("#message").html("Can't be empty").css("color", "red");
            submitButton.attr("disabled");
        }
        else if (password == confirmPassword) {
            $("#message").html("Matching").css("color", "green");
            submitButton.prop("disabled", false);

        } else {
            $("#message").html("Not Matching").css("color", "red");
            submitButton.prop("disabled", true);

        }
    }
</script>

<?php include 'layout/footer.php'; ?>