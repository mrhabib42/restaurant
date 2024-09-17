<?php ob_start() ?>
<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layout/header.php"; ?>

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
            $app = new App;
            $querry1 = "SELECT * FROM foods WHERE id = $id";
            $one = $app->selectOne($querry1);
            unlink("foods-images/".$one->image);


            $querry = "DELETE FROM foods where id = '$id'";
            //$app = new App;
            $path = "../foods-admins/show-foods.php";
            $app->delete($querry , $path);


        }
        else{
          echo "<script>window.location.href='".APPURL."/404.php'</script>";
        }
?>





<?php require "../layout/footer.php"; ?>