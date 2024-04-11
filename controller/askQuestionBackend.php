<?php
include '../config.php';
$admin = new Admin();

if (isset($_POST['q_submit'])) {


    $q_id = "cc10" . uniqid();
    $uid = $_SESSION['user_id'];
    $qtitle = $_POST['q_title'];
    $qdesc = $_POST['q_desc'];
    // Check if the 'q_pic' file was uploaded
    // if(isset($_FILES['q_pic'])) {
    //     // File uploaded successfully
    //     $img_path = "uploads/" . basename($_FILES['q_pic']['name']);
    //     if (move_uploaded_file($_FILES['q_pic']['tmp_name'], $img_path)) {
    //         echo "File uploaded successfully.";
    //     } else {
    //         echo "Failed to upload file.";
    //     }
    // } else {
    //     // 'q_pic' file was not uploaded
    //     $img_path = ""; // Set default or handle accordingly
    // }
    $qtags = $_POST['q_tags'];
    $tagsArray = explode(',', $qtags);

    // $stmt = $admin->cud("INSERT INTO `questions`( `questionid`, `user_id`, `title`, `description`, `qimage`) VALUES ('$q_id','$uid','$qtitle','$qdesc','$img_path')", "saved");
    foreach ($tagsArray as $tag) {
        $tag = trim($tag);

        $stmt = $admin->cud("INSERT INTO `tags`(`tagname`) VALUES ('$tag')", "saved");
    }

    // Retrieve the tag IDs for the given tag names
    $tagIds = [];
    foreach ($tagsArray as $tag) {
        $tag = trim($tag);

        // Retrieve the tag ID from the tags table
        $result = $admin->ret("SELECT `tagid` FROM `tags` WHERE `tagname`='$tag'");
        if ($result && $row = $result->fetch(PDO::FETCH_ASSOC)) {
            $tagIds[] = $row['tagid'];
        }
    }

    // Insert tag IDs along with the question ID into the questiontag table
    foreach ($tagIds as $tagId) {
        $stmt = $admin->cud("INSERT INTO `questiontag`(`tagid`,`questionid`) VALUES ('$tagId','$q_id')", "saved");
    }

    echo "<script>alert('event added successfully'); window.location = '../getStarted.php' </script> ";

}
?>