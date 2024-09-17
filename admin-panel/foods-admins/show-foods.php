<?php ob_start() ?>
<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layout/header.php"; ?>

<?php

$querry = "SELECT * FROM foods";
// this is for meal id 3
$app4 = new App;
$app4->validatingSessionAdminInside();
$foods = $app4->selectAll($querry);

?>

    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Foods</h5>
              <a  href="<?php echo ADMINURL ; ?>/foods-admins/create-foods.php" class="btn btn-primary mb-4 text-center float-right">Create Foods</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($foods as $food): ?>
                  <tr>
                    <th scope="row"><?php echo $food->id; ?></th>
                    <td><?php echo $food->name; ?></td>
                    <td><img style="width:90px; height:80px" src="<?php echo APPIMAGES1; ?>/<?php echo $food->image; ?>" alt=""></td>
                    <td>$<?php echo $food->price; ?></td>
                     <td><a href="delete-foods.php?id=<?php echo $food->id; ?>" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <?php endforeach; ?>
           
                </tbody>
              </table> 
            </div>
          </div>
        </div>

<?php require "../layout/footer.php"; ?>