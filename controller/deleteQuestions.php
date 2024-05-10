<?php
require '../config.php';

$qid = $_GET['q_id'];

// Fetch the image path from the database before deleting the question
$getImgPath = $admin->ret("SELECT `qimage` FROM `questions` WHERE `questionid`='$qid'");
$num_rows = $getImgPath->rowCount();
if ($getImgPath && $num_rows > 0) {
    $row = $getImgPath->fetch(PDO::FETCH_ASSOC);
    $img_path = $row['qimage'];

    // Delete the image file from the server
    if (!empty($img_path) && file_exists($img_path)) {
        unlink($img_path);
    }
}

// Delete from the questions table
$deleteQuestion = $admin->cud("DELETE FROM `questions` WHERE `questionid`='$qid'", "deleted");

// Delete associated records from the questiontag table
$deleteQuestionTags = $admin->cud("DELETE FROM `questiontag` WHERE `questionid`='$qid'", "deleted");

// Check if there are any answers associated with the question and delete them
$deleteAnswers = $admin->cud("DELETE FROM `answers` WHERE `questionid`='$qid'", "deleted");

// Check if the delete operations were successful
if ($deleteQuestion && $deleteQuestionTags && $deleteAnswers) {
    echo "<script>alert('Question deleted successfully'); window.location='../userProfile.php' </script>";
} else {
    echo "<script>alert('Error deleting question'); window.location='../userProfile.php' </script>";
}
?>