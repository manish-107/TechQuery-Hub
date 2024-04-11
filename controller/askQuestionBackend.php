<?php
include '../config.php';
$admin = new Admin();

if (isset($_POST['q_submit'])) {
    $count = 1;
    $count++;

    $q_id =  "cc10" . $count;
    $uid =  $_POST['u_id'];
    $qtitle = $_POST['q_title'];
    $qdesc = $_POST['q_desc'];
    $qpic = $_POST['q_desc'];
    $qtags = $_POST['q_tags'];
    $img_path = "uploads/" . basename($_FILES['q_pic']['name']);
    move_uploaded_file($_FILES['q_pic ']['tmp_name'], $img_path);

    echo $q_id;
    echo $uid;
    echo $qtitle;
    echo $qdesc;
    echo $qpic;
    echo $qtags;
    echo $img_path;

    // $stmt = $admin->cud("INSERT INTO `questions`( `questionid `, `user_id`, `title`, `description`, `qimage`) VALUES ('$q_id','$uid','$qtitle','$qdesc','$img_path')", "saved");



    // echo "<script>alert('event added successfully'); window.location='../admin/viewevent.php' </script> ";
}
?>