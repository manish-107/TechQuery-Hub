<?php
require '../config.php';

if (isset($_POST['a_submit'])) {
    $userid = $_POST['user_id'];
    $question_id = $_POST['questionid'];
    $adesc = addslashes(htmlspecialchars($_POST['a_text']));
    $a_id = "aa20" . uniqid();
    $stmt = $admin->cud("INSERT INTO `answers`(`answer_id`, `questionid`,`user_id`,`answerdesc`) VALUES ('$a_id','$question_id','$userid','$adesc  ')", "saved");

    echo "<script>alert('Done 👍'); window.location='../getStarted.php' </script> ";

} else {
    echo "<script>alert('Enter input field'); window.location='../login.php' </script> ";
    exit();
}

