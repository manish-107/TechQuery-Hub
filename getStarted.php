<?php include 'config.php';
$admin = new Admin();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}

$uid = $_SESSION['user_id'];
$stmt = $admin->ret("SELECT * FROM `users` WHERE `user_id`='$uid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
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
            <button class="btn">Ask question</button>
        </div>
    </div>

    <!-- card -->
    <div class="card">
        <div class="cardsec1">
            <p style="margin: 3px;color: #6696de;">123 votes</p>
            <p style="margin: 3px;color: aquamarine;">1 Answer</p>
        </div>
        <div class="cardsec2">
            <div style="word-spacing: 1px;letter-spacing: 1px;">Title Lorem ipsum dolor sit amet consectetur adipisicing
                elit.
                Quam,
                consectetur veritatis dolor
                excepturi deleniti minus voluptate porro! Praesentium, voluptatibus quam!</div>
            <div
                style="font-size: small; color: gray;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                description Lorem ipsum dolor sit amet consectetur
                adipisicing
                elit. Consectetur qui debitis nulla dignissimos distinctio commodi, quod magnam nisi optio? Facilis
                eum
                cupiditate ut illum praesentium maxime doloremque sit sed nulla hic possimus necessitatibus nihil
                perferendis ad tempore, minus eligendi neque?</div>
            <div class="btnasked">

                <div>
                    <button class="tagbtn">mern stack</button>
                    <button class="tagbtn">php</button>
                    <button class="tagbtn">mern stack</button>
                    <button class="tagbtn">php</button>
                    <button class="tagbtn">mern stack</button>
                    <button class="tagbtn">php</button>
                    <button class="tagbtn">mern stack</button>
                    <button class="tagbtn">php</button>
                </div>
                <div class="qasked">Manish Asked on april 28</div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>