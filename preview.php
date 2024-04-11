<?php
if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <!-- card -->
    <div class="card">
        <div style="display: flex; column-gap: 10px;flex-direction: column;">
            <h4 style="padding: 0px;margin: 0px;font-weight:bolder;">How to Find Multiple Locations Simultaneously Using
                Plus Codes in
                Google Maps API? </h4>
            <div
                style="border-bottom: 1px solid rgba(165, 161, 161, 0.552);margin: 0px; display: flex;flex-direction: row; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <h5 style="padding-top: 20px;margin: 0px;">Asked : Today</h5>
                <h5 style="padding: 20px;margin: 0px;">Answers : 1</h5>
                <h5 style="padding-top: 20px;margin: 0px;">By : Manish</h5>
            </div>
        </div>

        <div class="qcontent">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero optio rem similique omnis voluptatibus
                voluptates nobis sint sit, odio, veritatis repellendus tempora facere nulla debitis, necessitatibus
                cupiditate impedit consequuntur. Cum Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                deleniti, animi, minima modi quis voluptates pariatur odit culpa a fuga dolorum eius accusantium fugit
                consectetur. Quas temporibus architecto ipsa laudantium quod deleniti, aliquid neque quisquam sed
                voluptate maiores impedit, dolore, consequuntur adipisci! Soluta quo impedit consequuntur,
                necessitatibus aliquid tenetur assumenda rerum sapiente illum? Maiores nesciunt culpa odit quo veritatis
                beatae? Cumque pariatur explicabo libero voluptatibus, praesentium omnis saepe voluptates suscipit
                delectus autem? Illum quo voluptatibus autem neque. Obcaecati accusantium veritatis soluta laboriosam
                maxime excepturi sit ad! Porro officia libero ut at harum recusandae tenetur! Repellendus facilis
                perferendis repellat facere hic!</p>
            <div>
                <img src="images/Screenshot 2024-04-06 155010.png" width="400px" height="400px" alt="" srcset=""
                    class="preview-img">
            </div>
        </div>

        <div class="answerq">
            <div style="padding-bottom: 10px;">Give your answer:</div>
            <textarea style="height: 120px;" placeholder="give your answer here..." required></textarea>
            <button class="btn" style="width: 200px;margin-top: 10px;">Post Answer</button>
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