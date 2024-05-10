<?php
require '../config.php';

// Check if the POST data is set
if (isset($_POST["upt_btn"])) {
    // Sanitize user input
    $username = filter_var($_POST['upt_name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['upt_email'], FILTER_SANITIZE_EMAIL);
    $userid = $_POST['upt_uid'];

    // Fetch the existing email for the user
    $stmt_email = $admin->ret("SELECT `u_email` FROM `users` WHERE `user_id`='$userid'");
    $row_email = $stmt_email->fetch(PDO::FETCH_ASSOC);
    $existing_email = $row_email['u_email'];

    // Check if the email has changed
    if ($email != $existing_email) {
        // Email has changed, check for duplication
        $stmt = $admin->ret("SELECT * FROM `users` WHERE `u_email`='$email'");
        $num = $stmt->rowCount();
        if ($num > 0) {
            echo "<script>alert('Email already exists'); window.location='../signup.php'; </script>";
            exit(); // Terminate script execution after redirecting
        }
    }

    // Update user details
    $ustmt = $admin->cud("UPDATE `users` SET `username`='$username', `u_email`='$email' WHERE `user_id`='$userid'", "updated");
    echo "<script>alert('User updated successfully'); window.location='../userProfile.php'; </script>";
    exit(); // Terminate script execution after redirecting
} else {
    // Redirect user to the signup page if the required fields are not provided
    header('Location: ' . BASE_URL . 'signup.php');
    exit();
}
?>