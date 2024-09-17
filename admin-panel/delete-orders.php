<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "layout/header.php"; ?>
<?php 
    if(!isset($_SERVER['HTTP_REFERER'])){
      // redirect them to your desired location
      echo "<script>window.location.href='".ADMINURL."'</script>";
      exit;
  }
?>
<?php

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $querry = "DELETE FROM orders where id = '$id'";
            $app = new App;
            $path = "../admin-panel/orders-admins/show-orders.php";
            $app->delete($querry , $path);


        }
        else{
          echo "<script>window.location.href='".APPURL."/404.php'</script>";
        }
?>

<?php require "layout/footer.php"; ?>