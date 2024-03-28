<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "layouts/header.php"; ?>
<?php


  $app = new App;
  $app->validateSessionAdminInside();

  $query = "SELECT COUNT(*) AS count_foods FROM foods";
  $count_foods = $app->selectOne($query);

  $query = "SELECT COUNT(*) AS count_orders FROM orders";
  $count_orders = $app->selectOne($query);

  $query = "SELECT COUNT(*) AS count_bookings FROM bookings";
  $count_bookings = $app->selectOne($query);

  $query = "SELECT COUNT(*) AS count_admins FROM admins";
  $count_admins = $app->selectOne($query);

  $query = "SELECT COUNT(*) AS count_users FROM users";
  $count_users = $app->selectOne($query);

  $query = "SELECT COUNT(*) AS count_payments FROM payments";
  $count_payments = $app->selectOne($query);

?>
  
  <style>
    .admin-panel {
    border: 2px solid #007bff; /* Blue border */
    border-radius: 10px; /* Rounded corners */
    padding: 10px; /* Padding inside the card */
}

.admin-panel .card-title {
    color: #007bff; /* Blue title */
}

.admin-panel .card-text {
    color: #333; /* Dark text */
}

.admin-panel ul {
    margin-top: 10px; /* Margin above the list */
}

.admin-panel ul li {
    list-style-type: disc; /* List item style */
    margin-left: 20px; /* Indentation */
}

    </style>
  <div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Foods</h5>
                <p class="card-text">number of foods: <?php echo $count_foods->count_foods; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Orders</h5>
                <p class="card-text">number of orders: <?php echo $count_orders->count_orders; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bookings</h5>
                <p class="card-text">number of bookings: <?php echo $count_bookings->count_bookings; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Admins</h5>
                <p class="card-text">number of admins: <?php echo $count_admins->count_admins; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 offset-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="card-text">number of users: <?php echo $count_users->count_users; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Payemnts</h5>
                <p class="card-text">number of payments: <?php echo $count_payments->count_payments; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card admin-panel">
            <div class="card-body">
                <center><h5 class="card-title">About</h5></center>
                <p class="card-text">The Restoran Admin Panel is a comprehensive tool designed to streamline and manage various aspects of the restaurant's operations. Administrators can efficiently oversee food inventory, track orders from placement to delivery, manage reservations and bookings, and handle user accounts and permissions. Additionally, the panel offers robust reporting and analytics features, enabling administrators to gain insights into sales trends, customer preferences, and operational efficiency.</p>
                <p class="card-text">Key features include:</p>
                <ul>
                    <li>Inventory Management: Monitor and update food inventory levels, track ingredient usage, and set up automatic reorder alerts.</li>
                    <li>Order Processing: Receive, process, and track orders seamlessly from placement to fulfillment, with options for order customization and status updates.</li>
                    <li>Booking Management: Manage reservations, table assignments, and guest preferences efficiently to optimize seating capacity and enhance customer satisfaction.</li>
                    <li>User Administration: Create and manage user accounts for staff members, assigning roles and permissions as needed for different operational tasks.</li>
                    <li>Payment Tracking: Track payment transactions, reconcile accounts, and generate financial reports for accurate revenue tracking and accounting.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php require "layouts/footer.php"; ?>   
