<?php
    include '../config.php';
    $admin = new Admin();
    
    session_destroy();

    unset($_SESSION['user_id']);
    echo "<script>alert('logout successfull'); window.location='../index.php' </script> ";

?>