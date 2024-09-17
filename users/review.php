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
if(isset($_POST['submit'])){

   
        $review = $_POST['review'];
        $username = $_SESSION['username'];
    

        $querry = "INSERT INTO reviews (review, username) VALUES (:review, :username)";

        //These are handlers data in array.
        $arr = [
            ":review" => $review,
            ":username" => $username
            
        ];

        $path = "users-bookings.php";

        $obj1 = new App;
        $obj1->insert($querry,$arr,$path);

 }  
?>


        <div class="container-xxl py-5 bg-dark hero-header mb-5">
                        <div class="container text-center my-5 pt-5 pb-4">
                            <h1 class="display-3 text-white mb-3 animated slideInDown">Write a Review</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center text-uppercase">
                                    <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Reservation Start -->
                <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Your Feedback</h5>
                        <h1 class="text-white mb-4">Write Review</h1>
                        <form method="POST" action= "review.php">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="review" class="form-control" placeholder="Write Review" id="message" style="height: 100px"></textarea>
                                        <label for="message">Write Review</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button name = "submit" class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>




<?php require "../include/footer.php"; ?>
