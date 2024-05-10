<?php
require '../config.php'; // Include the configuration file

if (isset($_POST['l_user'])) {
    $uemail = $_POST['l_email']; // Get the email from the form
    $upass = $_POST['l_password']; // Get the password from the form

    // Retrieve user data from the database based on the provided email
    $stmt = $admin->ret("SELECT * FROM `users` WHERE `u_email`='$uemail'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $num = $stmt->rowCount();

    if ($num > 0) {
        // User found in the database
        $db_pass = $row['password']; // Fetch password from the database

        // Check if the provided password matches the one stored in the database
        if ($upass === $db_pass) {
            $id = $row['user_id']; // Get user ID
            $_SESSION['user_id'] = $id; // Set user ID in session

            // Redirect user to the specified page after successful login
            echo "<script>alert('Login successful'); window.location='../getStarted.php'</script>";
        } else {
            // Password incorrect
            echo "<script>alert('Email or password incorrect!'); window.location='../login.php'</script>";
        }
    } else {
        // No user found
        echo "<script>alert('Email or password incorrect!'); window.location='../login.php'</script>";
    }
} else {
    // Redirect to the login page if form fields are not submitted
    echo "<script>alert('Enter input fields'); window.location='../login.php'</script>";
    exit(); // Exit to prevent further execution
}
?>