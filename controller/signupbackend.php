<?php
require '../config.php';

// Check if the POST data is set
if (isset($_POST["email"]) && isset($_POST["password"])) {
    // Sanitize user input
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    // Check if the email already exists in the database
    $stmt = $admin->ret("SELECT * FROM `users` WHERE `u_email`='$email'");
    $num = $stmt->rowCount();
    if ($num > 0) {
        echo "<script>alert('Email already exists'); window.location='../signup.php'; </script>";
        exit(); // Terminate script execution after redirecting
    } else {
        // Insert new user into the database
        $stmt = $admin->cud("INSERT INTO `users`(`username`, `u_email`, `password`) VALUES ('$username','$email','$password')", "saved");

        echo "<script>alert('User added successfully'); window.location='../login.php'; </script>";
        exit(); // Terminate script execution after redirecting
    }
} else {
    // Redirect user to the signup page if the required fields are not provided
    header('Location: ' . BASE_URL . 'signup.php');
    exit();
}


