<?php ob_start() ?>
<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layout/header.php"; ?>

<?php 
$querryo = "SELECT * FROM orders";
$obj = new App;
$obj->validatingSessionAdminInside();
$orders = $obj->selectAll($querryo);


?>

    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">town</th>
                    <th scope="col">country</th>
                    <th scope="col">zipcode</th>
                    <th scope="col">phone_number</th>
                    <th scope="col">address</th>
                    <th scope="col">total_price</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php if($orders == true) : ?>
                  <?php foreach ($orders as $order) : ?>
                  <tr>
                    <th scope="row"><?php echo $order->id; ?></th>
                    <td><?php echo $order->name; ?></td>
                    <td><?php echo $order->email; ?></td>
                    <td><?php echo $order->town; ?></td>
                    <td><?php echo $order->country; ?></td>
                    <td>
                    <?php echo $order->zipcode; ?>
                    </td>
                    <td><?php echo $order->phone; ?></td>
                    <td><?php echo $order->address; ?> </td>
                    <td>$<?php echo $order->total_price; ?></td>

                  <!--  <td><?php echo $order->status; ?></td> --> 
                  <?php if($order->status == "Pending"): ?>
                    <td><a href="<?php echo ADMINURL ; ?>/orders-admins/order-status.php?id=<?php echo $order->id; ?>" class="btn btn-warning  text-center "><?php echo $order->status; ?></a></td>
                  <?php else: ?>
                    <td><a href="<?php echo ADMINURL ; ?>/orders-admins/order-status.php?id=<?php echo $order->id; ?>" class="btn btn-success  text-center "><?php echo $order->status; ?></a></td>
                    <?php endif ;?>
                     <td><a href="<?php echo ADMINURL ; ?>/delete-orders.php?id=<?php echo $order->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
                <?php else: ?>
                  <h2 style="color:red">NO ORDERS YET </h2>
                  
              </table> 
              <?php endif; ?>
              
<?php require "../layout/footer.php"; ?>