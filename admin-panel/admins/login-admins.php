<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php 


    $app = new App;
    $app->validateSessionAdmin();

    if(isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];


        $query = "SELECT * FROM admins WHERE email='$email'";

        $data = [
            "email" =>  $email,
            "password" =>  $password,
        ];

        $path = "http://localhost/restoran/admin-panel";

        $app->login($query, $data, $path);

    }

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>

.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 30px;
    background-color: #fff;
    max-width: 450px; 
}

.card-title {
    font-size: 36px;
    color: #333;
    margin-bottom: 30px;
    text-align: center;
    position: relative; 
}

.card-title .icon {
    position: absolute; 
    left: 50%; 
    top: -60px; 
    transform: translateX(-50%); 
    font-size: 48px; 
    color: #007bff; 
}

.card-title span {
    background: linear-gradient(to right, #007bff, #00bfff); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}

.form-group {
    margin-bottom: 25px;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 10px;
    padding: 15px;
    font-size: 16px;
    color: #495057;
    background-color: #f8f9fa;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 10px;
    padding: 15px;
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-primary:focus {
    outline: none;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

#togglePassword {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

#form2Example2[type="password"] + .input-group-append i.fa-eye-slash {
    display: none;
}

#form2Example2[type="text"] + .input-group-append i.fa-eye {
    display: none;
}

</style>

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title text-center mt-4">
                            <span class="icon"><i class="fas fa-utensils"></i></span> Admin Panel
                        </h5>
                    <form method="POST" action="login-admins.php" class="needs-validation">
                      
                        <div class="form-group">
                            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" required />
                            <div class="invalid-feedback">Please provide a valid email.</div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" required />
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback">Please provide a password.</div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    $('#togglePassword').click(function() {
        const passwordField = $('#form2Example2');
        const passwordFieldType = passwordField.attr('type');
        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $('#togglePassword i').removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            $('#togglePassword i').removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
});

</script>  

<?php require "../layouts/footer.php"; ?>
     