<?php ob_start() ?>
<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../include/header.php"; ?>
<?php
    //if(!isset($_SERVER['HTTP_REFERER'])){
       //redirect them to your desired location
      //echo "<script>window.location.href='".APPURL."'</script>";
     // exit;
 // }
?>
<?php

if(isset($_POST['submit'])){

    if(!isset($_SESSION['id'])){
        echo "<script>alert('Please Login First')</script>";
        echo "<script>window.location.href='".APPURL."/auth/login.php'</script>";
    }
    else{
        $item_id = $_POST['item_id'];
        $name = $_POST['name'];
        $image = $_POST['image'];
        $price = $_POST['price'];
        $user_id = $_SESSION['id'];

        $querry = "INSERT INTO cart (item_id, name, image, price, user_id) VALUES (:item_id, :name, :image, :price, :user_id)";

        //These are handlers data in array.
        $arr = [
            ":item_id" => $item_id,
            ":image" => $image,
            ":name" => $name,
            ":price" => $price,
            ":user_id" => $user_id
        ];

        $path = "cart.php";

        $obj1 = new App;
        $obj1->insert($querry,$arr,$path);

    }
    
}
?>

<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $querry = "SELECT * FROM foods WHERE id = '$id'";
        $app = new App;
        $one = $app->selectOne($querry);


        if(isset($_SESSION['id'])){
            $q = "SELECT * FROM cart WHERE item_id ='$id' AND user_id = '$_SESSION[id]'";
            $app1 = new App;
            $count = $app1->validateCart($q);
        }

    }
    else{
       //echo "<script>alert('Id nhi ati button dabane pe')</script>";
       echo "<script>window.location.href='".APPURL."/404.php'</script>";
       
       //echo "<p>button dabane pe id nhi ai</p>";
    }
   
?>


            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo $one->name; ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Cart</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?php echo APPIMAGES; ?>/<?php echo $one->image; ?>">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="mb-4"><?php echo $one->name; ?></h1>
                        <p class="mb-4">
                            <?php echo $one->description; ?>
                        </p>
                        
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h3>Price: $ <?php echo $one->price; ?></h3>                                   
                                </div>
                            </div>
                           
                        </div>
                        <form action="add-cart.php" method="POST">
                            <input type="hidden" name="item_id" value = "<?php echo $one->id; ?>">
                            <input type="hidden" name="name" value = "<?php echo $one->name; ?>">
                            <input type="hidden" name="image" value = "<?php echo $one->image; ?>">
                            <input type="hidden" name="price" value = "<?php echo $one->price; ?>">
                            <?php if (isset($_SESSION['id']) && ($count > 0) ) : ?>
                                <button type="submit" name="submit" class="btn btn-primary py-3 px-5 mt-2" disabled>Added to Cart</button>
                            <?php elseif ( isset($_SESSION['id']) ) : ?>
                                <button type="submit" name="submit" class="btn btn-primary py-3 px-5 mt-2" >Add to Cart</button> 
                            <?php else : ?> 
                            <h4 style="color:silver">Please Login for using Cart Features</h4>
                            <a href="<?php echo APPURL ?>/auth/login.php"><h2 style="color:blue">Login</h2></a>
                            
                            <?php endif; ?>  
                                                                               
                        </form>
                    </div>
                </div>
            </div>
        </div>

      <!-- Footer Start -->
<?php require "../include/footer.php"; ?>