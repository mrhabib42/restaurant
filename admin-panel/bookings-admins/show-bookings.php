<?php ob_start() ?>
<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layout/header.php"; ?>

<?php 
$querryb = "SELECT * FROM bookings";
$obj = new App;
$obj->validatingSessionAdminInside();
$bookings = $obj->selectAll($querryb);


?>


    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">date_booking</th>
                    <th scope="col">num_people</th>
                    <th scope="col">special_request</th>
                    <th scope="col">status</th>
                    
                    <th scope="col">created_at</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php if($bookings == true) : ?>
                  <?php foreach ($bookings as $booking): ?>
                  <tr>
                    <th scope="row"><?php echo $booking->id; ?></th>
                    <td><?php echo $booking->name; ?></td>
                    <td><?php echo $booking->email; ?></td>
                    <td><?php echo $booking->date_time; ?></td>
                    <td><?php echo $booking->num_people; ?></td>
                    <td><?php echo $booking->sp_request; ?></td>
                    

                    <?php if($booking->status == "Pending"): ?>
                    <td><a href="<?php echo ADMINURL ; ?>/bookings-admins/booking-status.php?id=<?php echo $booking->id; ?>" class="btn btn-warning  text-center "><?php echo $booking->status; ?></a></td>
                  <?php else: ?>
                    <td><a href="<?php echo ADMINURL ; ?>/bookings-admins/booking-status.php?id=<?php echo $booking->id; ?>" class="btn btn-success  text-center "><?php echo $booking->status; ?></a></td>
                    <?php endif ;?>
                     <!--<td><?php echo $booking->status; ?></td> -->
                    <td><?php echo $booking->created_at; ?></td>
                     <td><a href="<?php echo ADMINURL ; ?>/delete-bookings.php?id=<?php echo $booking->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
                <?php else: ?>
                <h2 style="color:red">NO BOOKINGS YET </h2>
              <?php endif; ?>
              </table> 
              
            </div>
          </div>
        </div>
<?php require "../layout/footer.php"; ?>