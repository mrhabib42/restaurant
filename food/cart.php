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

      $querry = "SELECT * From cart WHERE user_id = '$_SESSION[id]'";
      $app = new App;
      $cart_items = $app->selectAll($querry);

      $cart_price = "SELECT SUM(price) AS all_price FROM cart WHERE user_id = '$_SESSION[id]'";
      $total_price = $app->selectOne($cart_price);

      if(isset($_POST['submit'])){
        $_SESSION['total_price'] = $total_price->all_price;
        $path = "../food/checkout.php";
        header("location: ".$path."");


      }

?>


            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/food/cart.php">Cart</a></li>
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
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if($total_price->all_price > 0) : ?>
                            <?php foreach($cart_items as $cart_item) : ?>

                                <tr>
                                  <th><img src="<?php echo APPIMAGES; ?>/<?php echo $cart_item->image ?>" style width=50px height=50px alt=""></th>
                                  <td><?php echo $cart_item->name ?></td>
                                  <td>$<?php echo $cart_item->price ?></td>
                                  <td><a href="<?php echo APPURL; ?>/food/delete-item.php?id=<?php echo $cart_item->id; ?>" class="btn btn-danger text-white">delete</td>
                                </tr>
                            <?php endforeach ; ?>  
                          <?php else: ?>
                            <p>Cart is Empty</p>
                          <?php endif; ?>
                        </tbody>
                      </table>
                      <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
                        <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text"> Total: $<?php echo $total_price->all_price ?></p>
                        <form action="cart.php" method="POST">
                            <button type="submit" name="submit" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Service End -->
        

<?php require "../include/footer.php"; ?>