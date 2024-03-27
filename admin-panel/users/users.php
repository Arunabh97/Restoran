<?php
require "../../config/config.php";
require "../../libs/App.php";
require "../layouts/header.php";

$query = "SELECT id, username, email, created_at FROM users";

$app = new App;

$users = $app->selectAll($query);
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Users</h5>
                <a href="create-users.php" class="btn btn-primary mb-4 text-center float-right">Create User</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user) : ?>
                            <tr>
                                <th scope="row"><?php echo $user->id; ?></th>
                                <td><?php echo $user->username; ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo $user->created_at; ?></td>
                                <td>
                                    <a href="edit-users.php?id=<?php echo $user->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="delete-users.php?id=<?php echo $user->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
