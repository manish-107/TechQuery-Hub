<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechQuery-Hub</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/getStarted.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/tags.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Calistoga&family=DM+Serif+Text:ital@0;1&family=Eczar:wght@400..800&family=Forum&family=Macondo&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="fixed">
        <?php include "includes/header.php"; ?>
    </div>

    <!-- sidebar -->
    <?php include "includes/sidebar.php"; ?>
    <!-- side bar ends -->

    <div style="padding-top:60px ;">
        <div class="content">
            <h4>All users</h4>
            <a href="askquestion.php" class="btn">Ask question</a>
        </div>
    </div>
    <div class="tagcon">
        <?php
        // Assuming $pdo is your PDO connection
        $userstmt = $admin->ret("SELECT u.username, COUNT(q.questionid ) AS number_of_questions, u.joindate
                            FROM users u
                            LEFT JOIN questions q ON u.user_id  = q.user_id
                            GROUP BY u.user_id");
        while ($userrow = $userstmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div href="" class="intagcon">
                <div style="margin-bottom:5px;color: aqua;" href=""><?php echo $userrow['username'] ?></div>
                <div>Total number of questions: <?php echo $userrow['number_of_questions'] ?></div>
                <div>Date of joining: <?php echo $userrow['joindate'] ?></div>
            </div>
            <?php
        }
        ?>
    </div>
</body>

</html>