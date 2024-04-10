<?php 
    require '../config/db.php';

   if(isset($_POST["email"]) && isset($_POST["password"])){
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        echo $email;
    } else {
        header('Location: ' . ROOT_URL . 'signup.php', true, 302);  //control goes here
        die();
    }
 ?>