<?php
include '../config.php';
$admin = new Admin();

if (isset($_POST['a_submit'])) {
    $userid = $_POST['user_id'];
    $question_id = $_POST['questionid'];
    $adesc = $_POST['a_text'];
    $a_id = "aa20" . uniqid();
    echo $userid . "and";
    echo $question_id . "and";
    echo $adesc . "and";
    echo $a_id;

    // echo "<script>alert('email or password incorrect!!'); window.location='../index.php' </script> ";

} else {
    echo "<script>alert('Enter input field'); window.location='../login.php' </script> ";
    exit();
}

