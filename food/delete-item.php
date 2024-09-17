<?php ob_start() ?>
<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../include/header.php"; ?>
<?php 
    if(!isset($_SERVER['HTTP_REFERER'])){
      // redirect them to your desired location
      echo "<script>window.location.href='".APPURL."'</script>";
      exit;
  }
?>
<?php

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $querry = "DELETE FROM cart where id = '$id'";
            $app = new App;
            $path = "../food/cart.php";
            $app->delete($querry , $path);


        }
        else{
          echo "<script>window.location.href='".APPURL."/404.php'</script>";
        }
?>
<?php require "../include/footer.php"; ?>