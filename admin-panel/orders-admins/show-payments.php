<?php
require "../../config/config.php";
require "../../libs/App.php";
require "../layouts/header.php";

// Fetch payments from the database
$query = "SELECT id, user_id, payment_id, amount_paid, status, timestamp FROM payments";
$app = new App;
$app->validateSessionAdminInside();
$payments = $app->selectAll($query);
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Payments</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Payment ID</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Status</th>
                            <th scope="col">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $payment) : ?>
                            <tr>
                                <td><?php echo $payment->id; ?></td>
                                <td><?php echo $payment->user_id; ?></td>
                                <td><?php echo $payment->payment_id; ?></td>
                                <td><?php echo $payment->amount_paid; ?></td>
                                <td><?php echo $payment->status; ?></td>
                                <td><?php echo $payment->timestamp; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
