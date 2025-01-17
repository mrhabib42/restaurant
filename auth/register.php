<?php ob_start() ?>
<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../include/header.php"; ?>
<?php

    $obj1 = new App;
    $obj1->validatingSession();

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $querry = "INSERT INTO users (username,email,password) VALUES (:username,:email,:password)";

        //These are handlers data in array beacuse we pass arr in registartion method in execute parameter.
        $arr = [
            ":username" => $username,
            ":email" => $email,
            ":password" => $password
        ];

        $path = "login.php";

        $obj1->register($querry,$arr,$path);

        
    }?>

                <div class="container-xxl py-5 bg-dark hero-header mb-5">
                    <div class="container text-center my-5 pt-5 pb-4">
                     <h1 class="display-3 text-white mb-3 animated slideInDown">Registeration</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center text-uppercase">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Register</a></li>
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
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Register</h5>
                        <h1 class="text-white mb-4">Register for a new user</h1>
                        <form class="col-md-12" method ="POST" action="register.php" >
                            <div class="row g-3">
                                <div class="">
                                    <div class="form-floating">
                                        <input name="username" type="text" class="form-control" id="name" placeholder="Your Name" required>
                                        <label for="name">Username</label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Your Email" required>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-floating">
                                        <input name="password" type="password" class="form-control" id="email" placeholder="Password Likho" required>
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                               
                               
                               
                                <div class="col-md-12">
                                    <button name="submit" class="btn btn-primary w-100 py-3" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Service End -->
<?php require "../include/footer.php"; ?>