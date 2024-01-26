<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--Jquery link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--CK editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <!--Toastr link and function -->

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!--Toaster Function -->

    <script>
        function toastrFunction(type = 'success', message = '', closeButton = true) {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            switch (type) {
                case 'success':
                    toastr.success(message);
                    break;
                case 'error':
                    toastr.error(message);
                    break;
                case 'info':
                    toastr.info(message);
                    break;
                case 'warning':
                    toastr.warning(message);
                    break;
                default:
                    toastr.error("Error aayo");
                    break;
            }

        }
    </script>
    <!--Popper js cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Sweeter alert cdn link -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Sweet alert Function -->
    <script>

        function confirmDelete(dynamicLocation, blogId) {
            console.log("Function called with blogId:", blogId);
            console.log("Dynamic Location:", dynamicLocation);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the delete URL
                    window.location.href = dynamicLocation + blogId;
                }
            });
        }
    </script>
    <!--Bootstrap icons -->
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <style>
     
        </style>
</head>
<?php
session_start();
?>

<body class="pt-5">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8000/View/index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Blog
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="http://localhost:8000/View/blog/blog2.php">View Blog</a>
                    <a class="dropdown-item" href="http://localhost:8000/View/blog/index.php">Add Blog</a>
                    <!-- <a class="dropdown-item" href="http://localhost:8000/View/blog/editblog.php">Edit Blog</a> -->
                </div>
            </li>
        </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                <?php if (empty($_SESSION['user_id'])): ?>
                    <a href="http://localhost:8000/View/register.php" class="nav-link">
                        <span class="bi bi-person"></span> Sign Up
                    </a>
                <?php endif; ?>

                </li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a href="http://localhost:8000/Controller/LoginController.php?page=logout" class="nav-link">
                            <span class="bi bi-box-arrow-in-right"></span> Logout
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="http://localhost:8000/Controller/LoginController.php?page=login" class="nav-link">
                            <span class="bi bi-box-arrow-in-left"></span> Login
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </nav>
