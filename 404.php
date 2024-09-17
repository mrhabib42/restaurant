<?php ob_start() ?>
<?php require "config/config.php"; ?>
<?php require "libs/App.php"; ?>
<?php require "include/header.php"; ?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">404</h1>
                    <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p>
                    <p class="lead">
                    The page you’re looking for doesn’t exist.
                     </p>
                <a href="index.php" class="btn btn-primary">Go Home</a>
                   
                </div>
            </div>
        </div>

<?php require "include/footer.php"; ?>