<?php
require "../../config/config.php";
require "../../libs/App.php";
require "../layouts/header.php";

$app = new App;

$app->validateSessionAdminInside();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $user_id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = :id";
    $stmt = $app->link->prepare($query);
    $stmt->execute([':id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$user) {
        echo "User not found.";
        exit;
    }
} else {
    header("Location: users.php");
    exit;
}

if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $prev_password = $_POST['prev_password'];
    $new_password = $_POST['new_password'];

    if(!empty($new_password) && password_verify($prev_password, $user['password'])) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
        $query = "UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id";

        $arr = [
            ":username" =>  $username,
            ":email" =>  $email,
            ":password" => $hashed_password,
            ":id" => $user_id
        ];

        $path = "users.php";

        $app->update($query, $arr, $path);
    } else {
        
        $error_message = "Previous password does not match.";
    }
}

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Edit User</h5>
                <?php if(isset($error_message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="edit-users.php?id=<?php echo $user_id; ?>" enctype="multipart/form-data">
                    <!-- Username input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="username" id="form2Example1" class="form-control" placeholder="Username" value="<?php echo $user['username']; ?>" />
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" value="<?php echo $user['email']; ?>" />
                    </div>
                    <!-- Previous password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="prev_password" id="form2Example1" class="form-control" placeholder="Previous Password" />
                    </div>
                    <!-- New password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="new_password" id="form2Example1" class="form-control" placeholder="New Password" />
                    </div>
                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
