<?php 
require "config/config.php";
require "libs/App.php";
require "includes/header.php";

session_start();

if(isset($_POST['submit'])) {
    if(!isset($_SESSION['user_id'])){
        header("Location: " . APPURL);
        exit;
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $date_booking = $_POST['date_booking'];
    $num_people = $_POST['num_people'];
    $special_request = $_POST['special_request'];
    $status = "Pending";
    $user_id = $_SESSION['user_id'];

    $current_date = date("m/d/Y h:i:sa");
    if(strtotime($date_booking) > strtotime($current_date)) {
        $query = "INSERT INTO bookings (name, email, date_booking, num_people, special_request, status, user_id) VALUES (:name, :email, :date_booking, :num_people, :special_request, :status, :user_id)";
        $arr = array(
            ":name" => $name,
            ":email" => $email,
            ":date_booking" => $date_booking,
            ":num_people" => $num_people,
            ":special_request" => $special_request,
            ":status" => $status,
            ":user_id" => $user_id
        );
        $path = "users/bookings.php"; 
        
        $app = new App(); 
        $inserted = $app->insert($query, $arr, $path);

        if($inserted) {
            $_SESSION['success_message'] = "Booking successfully added.";
            header("Location: " . APPURL . "/users/bookings.php");
            exit;
        } else {
            echo "<script>alert('Error inserting booking. Please try again.')</script>";
            echo "<script>window.location.href='index.php'</script>";
            exit;
        }
    } else {
        echo "<script>alert('Invalid date. Please pick a date starting from tomorrow.')</script>";
        echo "<script>window.location.href='index.php'</script>";
        exit;
    }
}

require "includes/footer.php";
?>
