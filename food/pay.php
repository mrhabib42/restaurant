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

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
                    <div class="container text-center my-5 pt-5 pb-4">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Pay With PAY PAL</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center text-uppercase">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pay</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

    <div class="container">  
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AWWe8cDDNk65FQT5DUweMOiBZEqWvdufA4NQYF1ls3mzJWVmbn0MnJ8IhOi4fzFqKg_96LRkmjyDZLFg&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: '<?php echo $_SESSION['total_price']; ?>' // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='../food/delete-cart.php';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
                </div>
<?php require "../include/footer.php"; ?>