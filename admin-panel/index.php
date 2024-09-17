<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "layout/header.php"; ?>
<?php
  $obj1 = new App;
  $obj1->validatingSessionAdminInside();
?>

<?php

$querryf = "SELECT COUNT(*) AS count_foods FROM foods";
// this is for meal id 1
$app1 = new App;
$foods = $app1->selectOne($querryf);

$querryo = "SELECT COUNT(*) AS count_orders FROM orders";
// this is for meal id 1
$app1 = new App;
$orders = $app1->selectOne($querryo);

$querryb = "SELECT COUNT(*) AS count_bookings FROM bookings";
// this is for meal id 1
$app1 = new App;
$bookings = $app1->selectOne($querryb);

$querrya = "SELECT COUNT(*) AS count_admins FROM admins";
// this is for meal id 1
$app1 = new App;
$admins = $app1->selectOne($querrya);

$querryu = "SELECT COUNT(*) AS count_users FROM users";
// this is for meal id 1
$app1 = new App;
$users = $app1->selectOne($querryu);

?>


    <div class="container-fluid">
            
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Foods</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of foods: <?php echo $foods->count_foods; ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              
              <p class="card-text">number of orders: <?php echo $orders->count_orders; ?></p>
              
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          
          <div class="card">
            <!--<a href="">  -->
            <div class="card-body">
              <h5 class="card-title">Bookings</h5>
              
              <p class="card-text">number of bookings: <?php echo $bookings->count_bookings; ?></p>
              
            </div>
           <!-- </a> -->
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $admins->count_admins; ?></p>
              
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
              
              <p class="card-text">number of users: <?php echo $users->count_users; ?></p>
              
            </div>
          </div>
        </div>
      </div>
     <!--  <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->

<?php require "layout/footer.php"; ?>

