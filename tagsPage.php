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
        <div href="" class="intagcon">
            <div style="margin:1px" href="">Tag name</div>
            <div>desc : this is the description on tag..</div>
            <p style="margin:1px">Question : 5</p>
        </div>
        <div href="" class="intagcon">
            <div style="margin:1px" href="">Tag name</div>
            <div>desc : this is the description on tag..</div>
            <p style="margin:1px">Question : 5</p>
        </div>
        <div href="" class="intagcon">
            <div style="margin:1px" href="">Tag name</div>
            <div>desc : this is the description on tag..</div>
            <p style="margin:1px">Question : 5</p>
        </div>
        <div href="" class="intagcon">
            <div style="margin:1px" href="">Tag name</div>
            <div>desc : this is the description on tag..</div>
            <p style="margin:1px">Question : 5</p>
        </div>
        <div href="" class="intagcon">
            <div style="margin:1px" href="">Tag name</div>
            <div>desc : this is the description on tag..</div>
            <p style="margin:1px">Question : 5</p>
        </div>
    </div>

</body>

</html>