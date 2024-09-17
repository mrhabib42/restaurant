<?php ob_start() ?>
<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layout/header.php"; ?>

<?php 
    $obj1 = new App;
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        if(isset($_POST['submit'])){
          //$obj1 = new App;
          // $id = $_GET['id'];

          $status = $_POST['status'];
                    
          $querryu = "UPDATE bookings SET status = :status WHERE id = '$id'";

         

          $arr =[
              ":status" => $status
          ];
          $path = "../bookings-admins/show-bookings.php";

          $obj1->update($querryu, $arr , $path);
  }
    }
    



    
?>


<div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Change Booking Status</h5>
              <!-- most important that while submitting make sure id will pass through link otherwise in post method id will not recognizeable -->
          <form method="POST" action="booking-status.php?id=<?php echo $id ?>" enctype="multipart/form-data">
                <!-- Email input -->
   
                <div class="form-outline mb-4 mt-4">

                  <select name="status" class="form-select  form-control" aria-label="Default select example">
                    <option selected>Choose Status</option>
                    <option value="Pending">Pending</option>
                    <option value="Confirmed">Confirmed</option>
                    
                  </select>
                </div>

                <br>
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
              </form>

            </div>

<?php require "../layout/footer.php"; ?>