<?php ob_start() ?>
<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../include/header.php"; ?>
<?php 
    if(!isset($_SERVER['HTTP_REFERER'])){
      // redirect them to your desired location
      header('location: http://localhost/RestaurantProject/index.php');
      exit;
  }
?>
<?php

        $app = new App;
        if(isset($_POST['submit'])){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $town = $_POST['town'];
            $country = $_POST['country'];
            $zipcode = $_POST['zipcode'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            //And now the below values we are getting from sessions
            $total_price = $_SESSION['total_price'];
            $user_id = $_SESSION['id'];

            $querry = "INSERT INTO orders (name, email, town, country, zipcode, phone, address, total_price, user_id) VALUES (:name, :email, :town, :country, :zipcode, :phone, :address, :total_price, :user_id)";

        //These are handlers data in array.
        $arr = [
            ":name" => $name,
            ":email" => $email,
            ":town" => $town,
            ":country" => $country,
            ":zipcode" => $zipcode,
            ":phone" => $phone,
            ":address" => $address,
            ":total_price" => $total_price,
            ":user_id" => $user_id
        ];

        $path = "../food/pay.php";

        $app->insert($querry,$arr,$path);

        }
?>


            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Checkout</a></li>
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
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Checkout</h1>
                        <form  class="col-md-12" method="POST" action="checkout.php">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name = "town" type="text" class="form-control" id="town" placeholder="Town">
                                        <label for="town">Town</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="country" type="text" class="form-control" id="email" placeholder="Country">
                                        <label for="text">Country</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="zipcode" type="text" class="form-control" id="email" placeholder="Zipcode">
                                        <label for="text">Zipcode</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input name="phone" type="text" class="form-control" id="email" placeholder="Phone number">
                                        <label for="text">Phone number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="address" class="form-control" placeholder="Address" id="message" style="height: 100px"></textarea>
                                        <label for="message">Address</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button name="submit" class="btn btn-primary w-100 py-3" type="submit">Order and Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        <!-- Service End -->
        

        <!-- Footer Start -->
<?php require "../include/footer.php"; ?>