<?php 

  $app = new App;
  $app->startingSession();

  define("ADMINURL", "http://localhost/restoran/admin-panel");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link href="<?php echo ADMINURL; ?>/styles/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="<?php echo ADMINURL; ?>">RESTORAN Admin Panel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <?php if(isset($_SESSION['email'])) : ?>
        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link" style="margin-left: 20px;" href="<?php echo ADMINURL; ?>">
              <i class="material-icons" style="vertical-align: middle; margin-right: 5px; color: #4CAF50;">home</i> Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/admins/admins.php" style="margin-left: 20px;">
              <i class="material-icons" style="vertical-align: middle; margin-right: 5px; color: #2196F3;">supervisor_account</i> Admins
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/users/users.php" style="margin-left: 20px;">
              <i class="material-icons" style="vertical-align: middle; margin-right: 5px; color: #FF5722;">person</i> Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/foods-admins/show-foods.php" style="margin-left: 20px;">
              <i class="material-icons" style="vertical-align: middle; margin-right: 5px; color: #9C27B0;">fastfood</i> Foods
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/orders-admins/show-orders.php" style="margin-left: 20px;">
              <i class="material-icons" style="vertical-align: middle; margin-right: 5px; color: #E91E63;">shopping_cart</i> Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/bookings-admins/show-bookings.php" style="margin-left: 20px;">
              <i class="material-icons" style="vertical-align: middle; margin-right: 5px; color: #FF9800;">event</i> Bookings
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/orders-admins/show-payments.php" style="margin-left: 20px;">
              <i class="material-icons" style="vertical-align: middle; margin-right: 5px; color: #607D8B;">payment</i> Payments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/users/user-messages.php" style="margin-left: 20px;">
              <i class="material-icons" style="vertical-align: middle; margin-right: 5px; color: #fff;">message</i> User Enquiries
            </a>
          </li>
        </ul>
        <?php endif; ?>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <?php if(!isset($_SESSION['email'])) : ?>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo ADMINURL; ?>/admins/login-admins.php">login
              </a>
          </li>
          <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
         
          <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['email']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/logout.php">Logout</a>
              
          </li>
          <?php endif; ?>
                          
          
        </ul>
      </div>
    </div>
    </nav>
    <div class="container-fluid">