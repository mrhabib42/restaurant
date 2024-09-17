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

      $querry = "SELECT * From orders WHERE user_id = '$_SESSION[id]'";
      $app = new App;
      $orders = $app->selectAll($querry);


?>


            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Orders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/users/users-orders.php?id=<?php echo $_SESSION['id']; ?>">Orders</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12">
                <?php if($orders == true) : ?>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Town</th>
                            <th scope="col">Country</th>
                            <th scope="col">Zip Code</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                       
                            <?php foreach($orders as $order) : ?>

                                <tr>
                                  <td><?php echo $order->name ?></td>
                                  <td><?php echo $order->email ?></td>
                                  <td><?php echo $order->town ?></td>
                                  <td><?php echo $order->country ?></td>
                                  <td><?php echo $order->zipcode ?></td>
                                  <td><?php echo $order->phone ?></td>
                                  <td><?php echo $order->address ?></td>
                                  <td>$<?php echo $order->total_price ?></td>
                                  <?php if($order->status == "Pending"): ?>
                                    <td style="background-color:yellow; border-radius:10% ; text-align:center; font-weight:800; color:black; width:50px"><?php echo $order->status ?></td>
                                 <?php else: ?>
                                    <td style="background-color:green; border-radius:10% ; text-align:center; font-weight:800; color:black; width:50px"><?php echo $order->status ?></td>
                                 <?php endif ;?>
                                    <td><?php echo $order->created_at ?></td>
                                  
                                </tr>
                            <?php endforeach ; ?>  
                        
                        </tbody>
                      </table>
                      <?php else: ?>
                            <p>No Orders Yet</p> 
                        <?php endif; ?>
                </div>
            </div>
        <!-- Service End -->
        

<?php require "../include/footer.php"; ?>