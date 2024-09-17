<?php ob_start() ?>
<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../include/header.php"; ?>
<?php 

    $obj1 = new App;
    $obj1->validatingSession();

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $querry = "SELECT * FROM users WHERE email='$email'";

        $data = [
           "email" => $email,
            "password" => $password,
        ];
        //header("location:../index.php");

        $path = "../index.php";

        $obj1->login($querry ,$data , $path);

    }
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                    <div class="container text-center my-5 pt-5 pb-4">
                     <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
                        <nav aria-label="breadcrumb">
                         <ol class="breadcrumb justify-content-center text-uppercase">
                             <li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Login</a></li>
                             <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/auth/register.php">Register</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        <!-- Navbar & Hero End -->



        <!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12 bg-dark">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Login</h5>
                        <h1 class="text-white mb-4">Login</h1>
                        <form class="col-md-12" method="POST" action="login.php">
                            <div class="row g-3">
                               
                                <div class="">
                                    <div class="form-floating">
                                        <input name = "email" type="email" class="form-control" id="email" placeholder="Your Email" required>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-floating">
                                        <input name = "password" type="password" class="form-control" id="email" placeholder="Your Email" required>
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                               
                               
                               
                                <div class="col-md-12">
                                    <button name = "submit" class="btn btn-primary w-100 py-3" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Service End -->
        
<?php require "../include/footer.php"; ?>