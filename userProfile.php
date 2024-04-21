<?php
function limitWords($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_slice($words, 0, $word_limit)) . (count($words) > $word_limit ? "..." : "");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechQuery-Hub</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/getStarted.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/userProfile.css">
    <!-- <link rel="stylesheet" href="css/tags.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Calistoga&family=DM+Serif+Text:ital@0;1&family=Eczar:wght@400..800&family=Forum&family=Macondo&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="fixed">
        <?php include "includes/header.php";

        if (!isset($_SESSION['user_id'])) {
            header('location:login.php');
        } ?>
    </div>

    <!-- sidebar -->
    <?php include "includes/sidebar.php"; ?>
    <!-- side bar ends -->

    <div style="padding-top:70px;">
        <div class="content">
            <h3>Updated user details</h3>
        </div>
        <div class="formCon">
            <form action="controller/updateUserDetails.php" method="POST">
                <div class="form">
                    <div class="inputBox">
                        <label for="">Username</label>
                        <input value="<?php echo $row['username']; ?>" name="upt_name" type="text">
                    </div>
                    <div class="inputBox">
                        <label for="">Email </label>
                        <input value="<?php echo $row['u_email']; ?>" name="upt_email" type="email">
                        <input value="<?php echo $uid ?>" name="upt_uid" type="number" hidden>
                    </div>

                    <div class="inputBox">
                        <button class="button" onclick="return confirm('are you sure')" type="submit"
                            name="upt_btn">Update </button>
                    </div>
                </div>
            </form>
        </div>

        <?php
        $userQust = $admin->ret("SELECT * FROM `questions` WHERE `user_id`='$uid'");
        $rowcount = $userQust->rowCount();
        ?>

        <div class="content">
            <h3>Your Questions</h3>
            <div class="uqcardBody">
                <?php if ($rowcount == 0) {
                    echo "<h4>No questions by you 🤡</h4>";
                } else { ?>
                    <?php while ($row_userQuest = $userQust->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="uqCard">
                            <h2><?php echo $row_userQuest['title']; ?></h2>
                            <p><?php echo limitWords($row_userQuest['description'], 30); ?></p>
                            <a href="controller/deleteQuestions.php?q_id=<?php echo $row_userQuest['questionid']; ?>">Delete</a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>