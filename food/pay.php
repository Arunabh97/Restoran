<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../razorpay-php-master/Razorpay.php"; ?>

<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href = 'http://localhost/restoran';</script>";
    exit;
}

if (!isset($_SESSION['user_id'])) {
   // header("location: " . APPURL . "");
   echo "<script>window.location.href = '" . APPURL . "';</script>";
}

// Initialize Razorpay with your API key and secret
$razorpay = new Razorpay\Api\Api('rzp_test_y2Kh0hf5Nte5vu', 'JdWtSiishh5s3oHCnZzIrQmj');

?>

<style>
    .payment-container {
        text-align: center;
        margin-top: 50px;
    }

    .payment-heading-container {
        display: flex;
        align-items: center; 
        justify-content: center; 
        margin-bottom: 20px;
    }

    .payment-heading {
        font-size: 40px;
        margin-left: 10px;
    }

    .payment-image {
        max-width: 20%;
        height: auto;
        margin-bottom: 20px;
    }

     #rzp-button {
        background-color: #267bbf;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        display: inline-block;
        border-radius: 5px;
        margin-top: 20px;
        margin-bottom: 10px; 
        transition: background-color 0.3s ease-in-out; 
    }

    #rzp-button:hover {
        background-color: #3498db; 
    }

    #rzp-button img {
        vertical-align: middle;
        margin-right: 10px;
    }

    .razorpay-badge-container {
       margin: 10px;
    }
</style>

        <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Pay with Razorpay</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pay</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

    <div class="container">
    <div class="payment-container">
        <div class="payment-heading-container">
        
        <h2 class="payment-heading">Online Payment with <img src="../img/pay.png" alt="Razorpay Logo" class="payment-image"> Gateway</h2>
        </div>

        <form action="razorpay_success.php" method="POST">
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            <input type="hidden" name="amount" value="<?php echo $_SESSION['total_price'] * 100; ?>">
            <input type="hidden" name="currency" value="INR">
            <button id="rzp-button">
                <img src="../img/pay.png" alt="Razorpay Icon" height="30">
                Pay with Razorpay
            </button>
        </form>
        <!-- Wrap the Razorpay badge in a div with margin -->
        <div class="razorpay-badge-container">
            <a href="https://razorpay.com/" target="_blank">
                <img referrerpolicy="origin" src="https://badges.razorpay.com/badge-dark.png" style="height: 60px; width: 150px;" alt="Razorpay | Payment Gateway | Neobank">
            </a>
        </div>
        <script>
            var options = {
                key: 'rzp_test_y2Kh0hf5Nte5vu',
                amount: <?php echo $_SESSION['total_price'] * 100; ?>,
                currency: 'INR',
                name: 'Restoran',
                description: 'Payment for your purchase',
                image: '../img/favicon.png',
                handler: function(response) {
                    // Handle the success response and redirect if needed
                    window.location.href = 'delete-cart.php';
                    window.location.href = 'razorpay_success.php?id=' + response.razorpay_payment_id;
                }
            };

            var rzp = new Razorpay(options);

            document.getElementById('rzp-button').onclick = function(e) {
                rzp.open();
                e.preventDefault();
            }
        </script>
    </div>
</div>

<?php require "../includes/footer.php"; ?>
