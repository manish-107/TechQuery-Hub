<?php
require '../config.php';
$admin = new Admin();

// Check if the POST data is set
if (isset($_POST["upt_btn"])) {
    // Sanitize user input
    $username = filter_var($_POST['upt_name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['upt_email'], FILTER_SANITIZE_EMAIL);
    // Check if the email already exists in the database
    $stmt = $admin->ret("SELECT * FROM `users` WHERE `u_email`='$email'");
    $num = $stmt->rowCount();
    if ($num > 0) {
        echo "<script>alert('Email already exists'); window.location='../signup.php'; </script>";
        exit(); // Terminate script execution after redirecting
    } else {
        // Insert new user into the database
        $ustmt = $admin->cud("UPDATE `users` SET `username`='$username',`u_email`='$email'", "updated");

        echo "<script>alert('User updated successfully'); window.location='../userProfile.php'; </script>";
        exit(); // Terminate script execution after redirecting
    }
} else {
    // Redirect user to the signup page if the required fields are not provided
    header('Location: ' . BASE_URL . 'signup.php');
    exit();
}


