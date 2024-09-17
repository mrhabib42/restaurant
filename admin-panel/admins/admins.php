<?php ob_start() ?>
<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layout/header.php"; ?>
<?php

$querry = "SELECT * FROM admins";
// this is for meal id 3
$app4 = new App;
$app4->validatingSessionAdminInside();
$admins = $app4->selectAll($querry);

?>

    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="<?php echo ADMINURL ; ?>/admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                <?php if($admins == true) : ?>
                  <?php foreach($admins as $admin) : ?>
                  <tr>
                    <th scope="row"><?php echo $admin->id; ?></th>
                    <td><?php echo $admin->name; ?></td>
                    <td><?php echo $admin->email; ?></td>
                  <?php endforeach; ?>
                  <?php endif; ?>
                   

                </tbody>
              </table> 


<?php require "../layout/footer.php"; ?>