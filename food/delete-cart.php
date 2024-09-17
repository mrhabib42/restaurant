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

        

    $querry = "DELETE FROM cart where user_id = '$_SESSION[id]'";
    $app = new App;
    $path = "../food/cart.php";
    $app->delete($querry , $path);


        
?>

<?php require "../include/footer.php"; ?>
