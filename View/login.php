<?php
include 'layout/header.php';
if (isset($_SESSION['toastr'])) {
    $toastr = $_SESSION['toastr'];
    echo "<script>toastrFunction('{$_SESSION['toastr']['type']}', '{$_SESSION['toastr']['message']}');</script>";
    unset($_SESSION['toastr']);

}

?>


<div class='container mt-5'>
    <div class="row justify-content-center">

        <div class="col-md-4 ">

            <form class="border p-4 rounded shadow" action="../Controller/LoginController.php?page=login" method="post">
                <h2 class="text-center mb-4">Login</h2>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary" id="submit">Login</button>
                </div>
                <div class="text-center">
                    <p>Not a User? <a class="nav-link" href="register.php"> <span class="bi bi-person"></span> Sign Up</a></p>
                </div>

        </div>
    </div>
</div>


<?= include 'layout/footer.php'; ?>