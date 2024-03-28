<?php
require "../../config/config.php";
require "../../libs/App.php";
require "../layouts/header.php";

$app = new App(); // Instantiate App class

$app->connect();

$app->validateSessionAdminInside();

$query = "SELECT * FROM orders";
$orders = $app->selectAll($query);

// Total Orders
$totalOrdersQuery = "SELECT COUNT(*) AS totalOrders FROM orders";
$totalOrdersResult = $app->selectAll($totalOrdersQuery);
$totalOrders = $totalOrdersResult[0]->totalOrders;

// Pending Orders
$pendingOrdersQuery = "SELECT COUNT(*) AS pendingOrders FROM orders WHERE status = 'pending'";
$pendingOrdersResult = $app->selectAll($pendingOrdersQuery);
$pendingOrders = $pendingOrdersResult[0]->pendingOrders;

// Completed Orders
$completedOrdersQuery = "SELECT COUNT(*) AS completedOrders FROM orders WHERE status = 'Delivered'";
$completedOrdersResult = $app->selectAll($completedOrdersQuery);
$completedOrders = $completedOrdersResult[0]->completedOrders;

// Revenue
$revenueQuery = "SELECT SUM(total_price) AS revenue FROM orders";
$revenueResult = $app->selectAll($revenueQuery);
$revenue = $revenueResult[0]->revenue;
?>

<style>
.dashboard {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    padding: 20px;
}

.widget {
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 5px;
}

h2 {
    font-size: 18px;
    margin-bottom: 10px;
}
</style>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>

              <div class="dashboard">
                <div class="widget">
                    <h2>Total Orders</h2>
                    <p><?php echo $totalOrders; ?></p>
                </div>
                <div class="widget">
                    <h2>Pending Orders</h2>
                    <p><?php echo $pendingOrders; ?></p>
                </div>
                <div class="widget">
                    <h2>Completed Orders</h2>
                    <p><?php echo $completedOrders; ?></p>
                </div>
                <div class="widget">
                    <h2>Revenue</h2>
                    <p>₹<?php echo $revenue; ?></p>
                </div>
            </div>

              <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Town</th>
                    <th scope="col">Country</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($orders as $order) : ?>
                  <tr>
                    <td><?php echo $order->name; ?></td>
                    <td><?php echo $order->email; ?></td>
                    <td><?php echo $order->town; ?></td>
                    <td><?php echo $order->country; ?></td>
                 
                    <td><?php echo $order->phone_number; ?></td>
                    <td>
                    <?php echo $order->address; ?>
                    </td>
                    <td>₹<?php echo $order->total_price; ?></td>
                    <td><?php echo $order->status; ?></td>

                    <td><a href="status.php?id=<?php echo $order->id; ?>" class="btn btn-primary  text-center ">STATUS</a></td>
                    <td><a href="delete-orders.php?id=<?php echo $order->id; ?>" class="btn btn-danger  text-center ">DELETE</a></td>
                  </tr>
                  <?php endforeach; ?>
                  
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

 <?php require "../layouts/footer.php"; ?>
