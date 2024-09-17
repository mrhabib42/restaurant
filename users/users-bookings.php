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

      $querry = "SELECT * From bookings WHERE user_id = '$_SESSION[id]'";
      $app = new App;
      $bookings = $app->selectAll($querry);


?>


            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Bookings</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/users/users-bookings.php?id=<?php echo $_SESSION['id']; ?>">Bookings</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Booking_Date</th>
                            <th scope="col">Num_People</th>
                            <th scope="col">Special_Request</th>
                            <th scope="col">Status</th>
                            <th scope="col">Review Us</th>

                          </tr>
                        </thead>
                        <tbody>
                       <?php if($bookings == true) : ?>
                            <?php foreach($bookings as $booking) : ?>

                                <tr>
                                  <td><?php echo $booking->name ?></td>
                                  <td><?php echo $booking->email ?></td>
                                  <td><?php echo $booking->date_time ?></td>
                                  <td><?php echo $booking->num_people ?></td>
                                  <td><?php echo $booking->sp_request ?></td>
                                  <?php if($booking->status == "Pending"): ?>
                                    <td style="background-color:yellow; border-radius:10% ; text-align:center; font-weight:800; color:black; width:50px"><?php echo $booking->status ?></td>
                                  <?php else: ?>
                                    <td style="background-color:green; border-radius:10% ; text-align:center; font-weight:800; color:black; width:50px;"><?php echo $booking->status ?></td>
                                  <!--  <td><a href="<?php echo APPURL; ?>/food/delete-item.php?id=<?php echo $cart_item->id; ?>" class="btn btn-success text-white">Review</td> -->
                                    <td><a href="<?php echo APPURL; ?>/users/review.php" class="btn btn-success text-white">Review</td>

                                  <?php endif ; ?>
                                </tr>
                            <?php endforeach ; ?>  
                        <?php else: ?>
                            <p>No Bookings Yet</p> 
                        <?php endif; ?>
                        </tbody>
                      </table>
                     
                </div>
            </div>
        <!-- Service End -->
        

<?php require "../include/footer.php"; ?>