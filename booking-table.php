<?php ob_start() ?>
<?php require "config/config.php"; ?>
<?php require "libs/App.php"; ?>
<?php require "include/header.php"; ?>
<?php 
    if(!isset($_SERVER['HTTP_REFERER'])){
      // redirect them to your desired location
      header('location: http://localhost/RestaurantProject/index.php');
      exit;
  }
?>

<?php

        $obj1 = new App;
        // to check user is login or not
        $obj1->validatingSessionNot();

        if(isset($_POST['submit'])){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $date_time = $_POST['date_time'];
            $num_people = $_POST['num_people'];
            $sp_request = $_POST['sp_request'];
            $status = "Pending";
            $user_id = $_SESSION['id'];

            if($date_time > date("m/d/Y h:i:sa")){

                $querry = "INSERT INTO bookings (name, email, date_time, num_people, sp_request, status, user_id) VALUES (:name, :email, :date_time, :num_people, :sp_request, :status, :user_id)";

            //These are handlers data in array.
                $arr = [
                    ":name" => $name,
                    ":email" => $email,
                    ":date_time" => $date_time,
                    ":num_people" => $num_people,
                    ":sp_request" => $sp_request,
                    ":status" => $status,
                    ":user_id" => $user_id
                ];

                $path = "index.php";

                $obj1 = new App;
                $obj1->insert($querry,$arr,$path);


            }else{
                echo "<script>alert('Invalid Date selected Please Select from tomorrow')</script>";
                echo "<script>window.location.href='".APPURL."/booking.php'</script>";

            }

            
            
        }
?>


        <div class="container-xxl py-5 bg-dark hero-header mb-5">
                        <div class="container text-center my-5 pt-5 pb-4">
                            <h1 class="display-3 text-white mb-3 animated slideInDown">Table Booking</h1>
                        </div>
                    </div>
                </div>
<?php require "include/footer.php"; ?>