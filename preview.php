<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechQuery-Hub</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/preview.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Calistoga&family=DM+Serif+Text:ital@0;1&family=Eczar:wght@400..800&family=Forum&family=Macondo&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
            <h4>Question</h4>
            <button class="btn">Ask question</button>
        </div>
    </div>
    <?php
    if (isset($_GET['question_id']) && isset($_GET['qusername'])) {
        $question_id = $_GET['question_id'];
        $qusername = $_GET['qusername'];
    }

    $stms = $admin->ret("SELECT * FROM `questions` WHERE `questionid`='$question_id'");
    $qrow = $stms->fetch(PDO::FETCH_ASSOC);
    ?>
    <!-- card -->
    <div class="card">
        <div style="display: flex; column-gap: 10px;flex-direction: column;">
            <h4 style="padding: 0px;margin: 0px;font-weight:bolder;"><?php echo $qrow['title']; ?> </h4>
            <div
                style="border-bottom: 1px solid rgba(165, 161, 161, 0.552);margin: 0px; display: flex;flex-direction: row; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <h5 style="padding-top: 20px;margin: 0px;">Asked : <?php echo $qrow['questioneddate']; ?> </h5>
                <h5 style="padding: 20px;margin: 0px;">Answers : 1</h5>
                <h5 style="padding-top: 20px;margin: 0px;">By : <?php echo $qusername ?></h5>
            </div>
        </div>

        <div class="qcontent">
            <p> <?php echo $qrow['description']; ?></p>
            <div>
                <img src="controller/<?php echo $qrow['qimage'] ?>" width="400px" height="400px" alt="" srcset=""
                    class="preview-img">
            </div>
        </div>

        <div class="answerq">
            <form action="controller/uploadAnswer.php" method="post">
                <div style="padding-bottom: 10px;">Give your answer:</div>
                <input type="text" value="<?php echo $uid ?>" name="user_id" hidden>
                <input type="text" value="<?php echo $question_id ?>" name="questionid" hidden>
                <textarea style="height: 120px;" name="a_text" placeholder="give your answer here..."
                    required></textarea>
                <button class="btn" name="a_submit" style="width: 200px;margin-top: 10px;">Post Answer</button>
            </form>
        </div>


        <div class="qanswers">
            <h3>Recent Answers :</h3>
            <div class="ans">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, rem praesentium? Delectus provident
                    et
                    officia tempore nulla, consectetur minus ipsa incidunt accusantium assumenda labore sunt alias nemo
                    odit
                    porro sed accusamus sequi deleniti vitae tenetur? Cupiditate commodi aliquam qui ab impedit neque
                    voluptatibus doloribus sequi officiis architecto.
                    Nostrum officiis accusamus voluptatem impedit
                    obcaecati repellat eligendi maxime vel officia quasi libero maiores a, facilis amet odit nisi
                    tempore
                    quo deserunt? Asperiores atque officia fugit ipsum quas architecto cupiditate laborum debitis
                    soluta,
                    dolorem illo hic adipisci. Suscipit, aliquam. Sit voluptate cumque ipsum rem laboriosam deleniti
                    dolorem. A non eaque distinctio porro incidunt?

                </p>
                <div style="display: flex; justify-content: space-between;">
                    <p style="color: aqua;">By manish</p>
                    <p style="color:chartreuse">on 06 monday</p>
                </div>
            </div>

        </div>

    </div>
    <script>
        $(document).ready(function () {
            $('.preview-img').click(function () {
                $(this).toggleClass('preview-active');
            });
        });
    </script>
</body>

</html>