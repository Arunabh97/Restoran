<?php
require "../../config/config.php";
require "../../libs/App.php";
require "../layouts/header.php";

$app = new App;

$app->validateSessionAdminInside();

if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";

    $arr = [
        ":username" =>  $username,
        ":email" =>  $email,
        ":password" =>  $password,
    ];

    $path = "users.php";

    $app->register($query, $arr, $path);
}

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Users</h5>
                <form method="POST" action="create-users.php" enctype="multipart/form-data">

                    <div class="form-outline mb-4 mt-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" name="username" id="form2Example1" class="form-control" placeholder="Username" />
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example1" class="form-control" placeholder="Password" />
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
