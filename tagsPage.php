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
            <h4>All tags</h4>
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
        $stmtt = $admin->ret("SELECT t.tagid, t.tagname, COUNT(qt.questionid) AS question_count, MAX(q.questioneddate) AS last_updated_question_date, MAX(q.description) AS last_updated_question_desc
        FROM tags AS t
        LEFT JOIN questiontag AS qt ON t.tagid = qt.tagid
        LEFT JOIN questions AS q ON qt.questionid = q.questionid
        GROUP BY t.tagid, t.tagname
        ORDER BY last_updated_question_date DESC;");

        while ($rowtt = $stmtt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div href="" class="intagcon">
                <div style="margin-bottom:5px;color: aqua;" href=""><?php echo $rowtt['tagname'] ?></div>
                <div> <?php echo limitWords($rowtt['last_updated_question_desc'], 10); ?></div>
                <p style="margin:3px">Question :<?php echo $rowtt['question_count'] ?></p>
            </div>
            <?php
        }
        ?>
    </div>


</body>

</html>