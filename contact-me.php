<?php
require "config/config.php";
require "libs/App.php";
require "includes/header.php";

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['submit'])) {
    if(!isset($_SESSION['user_id'])){
        header("Location: " . APPURL);
        exit;
    }

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    // Prepare SQL query
    $query = "INSERT INTO messages (name, email, subject, message, user_id) VALUES (:name, :email, :subject, :message, :user_id)";
    $arr = array(
        ":name" => $name,
        ":email" => $email,
        ":subject" => $subject,
        ":message" => $message,
        ":user_id" => $user_id
    );
    $path = "contact.php";
    // Instantiate App class
    $app = new App();

    // Insert data into the database
    $inserted = $app->insert($query, $arr, $path);

    if($inserted) {
        $_SESSION['success_message'] = "Message sent successfully.";
        echo "<script>alert('Message successfully inserted.');</script>";
    } else {
        $_SESSION['error_message'] = "Error sending message. Please try again.";
    }

    header("Location: " . APPURL . "/contact.php");
    exit;
} elseif (!isset($_SESSION['user_id'])) {
    $_SESSION['error_message'] = "Please login to send a message.";
    header("Location: " . APPURL . "/auth/login.php");
    exit;
}

?>