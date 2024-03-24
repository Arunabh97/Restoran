<?php
require "../../config/config.php";
require "../../libs/App.php";
require "../layouts/header.php";

// Fetch messages from the database
$query = "SELECT user_id, name, email, subject, message, created_at FROM messages";
$app = new App;
$app->validateSessionAdminInside();
$messages = $app->selectAll($query);
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Customer Enquiries</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($messages as $message) : ?>
                                <tr>
                                    <td><?php echo $message->user_id; ?></td>
                                    <td><?php echo $message->name; ?></td>
                                    <td><?php echo $message->email; ?></td>
                                    <td><?php echo $message->subject; ?></td>
                                    <td><?php echo $message->message; ?></td>
                                    <td><?php echo $message->created_at; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
