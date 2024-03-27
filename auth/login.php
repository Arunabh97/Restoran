<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>

<?php 

    $app = new App;
    $app->validateSession();

    if(isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];


        $query = "SELECT * FROM users WHERE email='$email'";

        $data = [
            "email" =>  $email,
            "password" =>  $password,
        ];

        $path = "http://localhost/restoran";

        $app->login($query, $data, $path);

    }

?>

<style>
    .eye-toggle {
        font-size: 1.5rem;
        padding: 10px;
        color: #6c757d;
        cursor: pointer;
    }

    .eye-toggle:hover {
        color: #007bff;
    }
</style>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Login</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12 bg-dark">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Login</h5>
                        <h1 class="text-white mb-4">Login</h1>
                        <form class="col-md-12" method="POST" action="login.php">
                            <div class="row g-3">
                               
                                <div class="">
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="form-floating position-relative">
                                        <input name="password" type="password" class="form-control" id="password" placeholder="Your Password">
                                        <label for="password">Password</label>
                                        <span toggle="#password" class="eye-toggle bi bi-eye-slash position-absolute end-0 top-50 translate-middle-y" style="cursor: pointer;"></span>
                                    </div>
                                </div>
                               
                                <div class="col-md-12">
                                    <button name="submit" class="btn btn-primary w-100 py-3" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


<script>

document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.querySelector('.eye-toggle');
    const passwordField = document.querySelector(togglePassword.getAttribute('toggle'));

    togglePassword.addEventListener('click', function() {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
});

</script>        

<?php require "../includes/footer.php"; ?>
     