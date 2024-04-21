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
            <h4>All questions</h4>
            <?php if (isset($row['user_id'])): ?>
                <a href="askquestion.php" class="btn">Ask question</a>
            <?php else: ?>
                <a href="" class="btn">Ask question</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="tagcon">
        <?php
        // Assuming $admin->ret() returns a valid PDO statement
        while ($rowtt = $stmtt->fetch(PDO::FETCH_ASSOC)) {
            $userId = $rowtt['user_id'];
            // Assuming you have a PDO connection named $pdo
            $query = "SELECT u.username, COUNT(DISTINCT q.id) AS number_of_questions, COUNT(DISTINCT a.id) AS number_of_answers, u.join_date
                      FROM users u
                      LEFT JOIN question q ON u.id = q.user_id
                      LEFT JOIN answer a ON u.id = a.user_id
                      WHERE u.id = :userId
                      GROUP BY u.id";

            $stmt = $pdo->prepare($query);
            $stmt->execute(['userId' => $userId]);
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            <div href="" class="intagcon">
                <div style="margin-bottom:5px;color: aqua;" href=""><?php echo $userData['username'] ?></div>
                <div>Number of questions: <?php echo $userData['number_of_questions'] ?></div>
                <div>Number of answers: <?php echo $userData['number_of_answers'] ?></div>
                <div>Date of joining: <?php echo $userData['join_date'] ?></div>
            </div>
            <?php
        }
        ?>
    </div>
</body>

</html>