<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restoran";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href = 'http://localhost/restoran';</script>";
    exit;
}

if (!isset($_SESSION['user_id'])) {
   echo "<script>window.location.href = '" . APPURL . "';</script>";
}

if(isset($_GET['id'])) {
    $payment_id = $_GET['id'];

    if (isset($_SESSION['total_price']) && isset($_SESSION['user_id'])) {
        $amount_paid = $_SESSION['total_price'];
        $user_id = $_SESSION['user_id'];

        $amount_paid = floatval($amount_paid);

        $sql = "INSERT INTO payments (user_id, payment_id, amount_paid) VALUES ('$user_id', '$payment_id', $amount_paid)";

        if ($conn->query($sql) === TRUE) {
            $conn->close();

            echo '<html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="refresh" content="5;url=/../restoran/users/orders.php">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Payment Success</title>
                        <style>
                            body {
                                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                                background-color: #f5f5f5;
                                color: #333;
                                text-align: center;
                                margin-top: 20px;
                                padding: 0;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                height: 100vh;
                            }
                            .container {
                                background-color: #fff;
                                border-radius: 10px;
                                padding: 20px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                            h2 {
                                color: #28a745;
                            }
                            p {
                                margin-top: 10px;
                            }
                            a {
                                color: #007bff;
                                text-decoration: none;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h2>Payment details successfully stored in the database.</h2>
                            <p>Payment ID: ' . $payment_id . '</p>
                            <p>You will be redirected to the orders page in 5 seconds.</p>
                            <p>If not redirected, <a href="/../restoran/users/orders.php">click here</a>.</p>
                        </div>
                    </body>
                </html>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid session variables.";
    }
} else {
    echo "Invalid payment ID";
}
?>
