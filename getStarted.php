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

    <!-- card -->
    <?php
    // Include the database configuration file
    // Execute the SQL query to fetch data
    $stmt = $admin->ret("SELECT q.questionid, q.title, q.description AS `desc`, q.questioneddate, u.username AS username, GROUP_CONCAT(t.tagname SEPARATOR ',') AS tags
            FROM questions AS q 
            JOIN questiontag AS qt ON q.questionid = qt.questionid
            JOIN tags AS t ON qt.tagid = t.tagid
            JOIN users AS u ON q.user_id = u.user_id
            GROUP BY q.questionid
            ORDER BY q.questioneddate DESC");

    // Check if there are any rows fetched
    if ($stmt) {
        // Loop through each fetched row
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Fetch the count of answers for this question
            $stma = $admin->ret("SELECT COUNT(*) AS answer_count
                                FROM `answers` 
                                WHERE `questionid` = '{$row['questionid']}'");
            $acount = $stma->fetch(PDO::FETCH_ASSOC)['answer_count'];

            ?>
            <div class="card">
                <div class="cardsec1">
                    <p style="margin: 3px;color: #6696de;">✨ Question </p>
                    <p style="margin: 3px;color: aquamarine;"><?php echo $acount ?> Answers</p> <!-- Corrected here -->
                </div>
                <div class="cardsec2">

                    <div style="word-spacing: 1px;letter-spacing: 1px;display:flex;"><a
                            href="preview.php?question_id=<?php echo $row['questionid']; ?>&qusername=<?php echo $row['username']; ?>"
                            style="margin:3px;">Title <?php echo $row['title']; ?></a>
                    </div>

                    <div
                        style="width:100%;font-size: small; color: gray;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                        <?php echo limitWords($row['desc'], 50); ?>
                    </div>
                    <div class="btnasked">
                        <div>
                            <?php
                            // Loop through tags for this question
                            $tags = explode(',', $row['tags']);
                            foreach ($tags as $tag) {
                                echo '<button class="tagbtn">' . $tag . '</button>';
                            }
                            ?>
                        </div>
                        <div class="qasked"><?php echo $row['username']; ?> Asked on <?php echo $row['questioneddate']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        // If no rows are fetched, display a message or take appropriate action
        echo "No questions found.";
    }
    ?>
</body>

</html>