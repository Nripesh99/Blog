<?php include 'layout/header.php';
if (isset($_SESSION['toastr'])) {
    $toastr = $_SESSION['toastr'];
    echo "<script>toastrFunction('{$_SESSION['toastr']['type']}', '{$_SESSION['toastr']['message']}');</script>";
    unset($_SESSION['toastr']);

}
?>
<style>
    i {
        font-size: 10em;
        /* Adjust the size as needed */
    }

    .banner {
        background-image: url("5172658.jpg");
        background-size: cover;
        background-position: center;
        /* Optional: Center the background image */

        color: white;
    }
</style>

<section class="banner " id="banner ">

    <div class="row">
        <h2 class="ms-3 mt-5">Blog site</h2>
        <div class="col-md-6">
            <p class="ms-3"> Lorem ipsum dolor sit amet consectetur adipiscing elit morbi purus luctus, vitae velit
                tincidunt
                turpis
                inceptos convallis ad sem fermentum netus ante, eleifend pellentesque aliquet senectus porttitor
                phasellus
                non commodo aenean. Curae scelerisque litora commodo arcu conubia iaculis felis egestas mi, ad
                cursus mollis
                sociis morbi ridiculus ultrices odio pretium, suscipit sem ut lectus sodales tincidunt hac rutrum.
                Velit
                eros accumsan imperdiet rutrum pharetra tortor fusce pretium, ac faucibus congue sollicitudin eu
                magnis
                aptent euismod tincidunt, neque augue libero posuere phasellus dictum viverra. Vestibulum urna per
                pellentesque proin tristique est primis curabitur curae, bibendum netus sodales eget nunc non a
                laoreet,
                mattis sociis ad eu arcu ut hac interdum. Laoreet cubilia tincidunt vel libero penatibus enim
                bibendum quis
                velit, purus vulputate in ad torquent accumsan hac lacus consequat, phasellus urna justo rutrum
                augue nibh
                est dui.</p>
        </div>
        <div class="col-md-6">
            <div class="col text-center">
                <img src="blogimg2.png" alt="image" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <section class="provide" id="provide">
        <div class="row mt-5 p-3">
            <div class="text-center">
                <h2>Feature's Provided</h2>
            </div>
            <div class="col-md-4">
                <div class="text-center">

                    <i class="bi bi-pencil-square"></i>
                    <h3>Blog Writing</h3>
                </div>


            </div>
            <div class="col-md-4">
                <div class="text-center">

                    <i class="bi bi-pencil-square"></i>
                    <h3>Blog Editing</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <i class="bi bi-pencil-square"></i>
                    <h3>Blog Deleting</h3>

                </div>

            </div>


        </div>
    </section>

    <section class="blog mt-5" id="blog">
        <h2 class="text-center">Today's Blog</h2>
        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top"
                        src="https://revenuearchitects.com/wp-content/uploads/2017/02/Blog_pic-1030x584.png"
                        alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <div class="card-button text-center">
                        <a href="http://localhost:8000/View/blog/blog2.php" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 ">
                <div class="card">
                    <img class="card-img-top"
                        src="https://revenuearchitects.com/wp-content/uploads/2017/02/Blog_pic-1030x584.png"
                        alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <div class="card-button text-center">
                        <a href="http://localhost:8000/View/blog/blog2.php" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top"
                        src="https://revenuearchitects.com/wp-content/uploads/2017/02/Blog_pic-1030x584.png"
                        alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <div class="card-button text-center">
                        <a href="http://localhost:8000/View/blog/blog2.php" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php include 'layout/footer.php' ?>