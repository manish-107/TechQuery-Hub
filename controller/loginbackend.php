<?php
include '../config.php';
$admin = new Admin();

if (isset($_POST['l_user'])) {
    $uemail = $_POST['l_email'];
    $upass = $_POST['l_password'];

    $stmt = $admin->ret("SELECT * FROM `users` WHERE `u_email`='$uemail'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $num = $stmt->rowCount();
    if ($num > 0) {
        // $db_pass = $row['password'];
        // if (password_verify($vspass, $db_pass)) {
            $id = $row['userid'];
            $_SESSION['userid'] = $id;
            echo "<script>alert('user login successfull'); window.location='../askQuestion.php' </script> ";

        }
        echo "<script>alert('email or password incorrect!!'); window.location='../getStarted.php' </script> ";

    }else{
        echo "<script>alert('Enter input field'); window.location='../login.php' </script> ";
    exit();
    }

?>