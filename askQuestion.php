<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/askQuestion.css">
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
            <h4>Ask Question in public</h4>
        </div>
    </div>

    <!-- card -->
    <div class="card">
        <div class="rules">
            <h5>Writing a good question
                You’re ready to ask a programming-related question and this form will help guide you through the
                process.
                Looking to ask a non-programming question? See the topics here to find a relevant site. <br><br>
                Rules:</h5>
            <ul>
                <li>Summarize your problem in a one-line title.</li>
                <li>Describe your problem in more detail.</li>
                <li>Add “tags” which help surface your question to members of the community.</li>
                <li>Review your question and post it to the site.</li>
            </ul>

        </div>


        <!-- form controls -->
        <form action="controller/askQuestionBackend.php" method="POST" enctype="multipart/form-data">
            <div class="inputTitle">
                <h5>Title</h5>
                <h6>Be specific and imagine you1'e asking a question to another person.</h6>
                <input type="text" name="q_title" placeholder="eg: how to center a div" required>
            </div>
            <div class="inputTitle">
                <h5>What are the details of your problem?</h5>
                <h6>Introduce the problem and expand on what you put in the title. Minimum 20 characters.</h6>
                <textarea style="height: 250px;" name="q_desc" placeholder="e.g., how to center a div"
                    required></textarea>
            </div>
            <div class="inputTitle">
                <h5>Code snippet of image</h5>
                <h6>Be specific about the input you're providing</h6>
                <input type="file" id="fileInput" name="q_pic" required>
            </div>
            <div class="inputTitle">
                <h5>Tags</h5>
                <h6>Add up to 5 tags to describe what your question is about. Enter the tags one by one seperated by
                    comma
                    ","</h6>
                <input type="text" id="tagsInput" name="q_tags" onchange="trimmedTags()"
                    placeholder="e.g., mern stack, vba" required>
                <div class="tagcol">
                    <!-- <div class="subtag">
                    <div>mern</div>
                    <button type="button">X</button>
                </div> -->
                </div>
            </div>
            <div class="inputTitle">
                <button type="submit" name="q_submit" class="btn">Submit If your done</button>
            </div>
        </form>

        <div class="endTxt">
            Happy coding - lets Connect <a style="color: aqua;" href="https://github.com/manish-107">GitHub</a> & <a
                style="color: rgb(226, 4, 4);" href="https://twitter.com/Mani_xsh">Twitter</a>
        </div>
    </div>
    <script>

        $(document).ready(function () {

            $('#tagsInput').on('input', function () {
                // Get the value of the input field and split it by commas
                const tags = $(this).val().split(',');

                // Trim each tag to remove any leading or trailing whitespace
                const trimmedTags = tags.map(tag => tag.trim());

                // Clear existing tags
                $('.tagcol').empty();

                // Check if the number of tags exceeds five
                if (trimmedTags.length > 5) {
                    $('.tagcol').text('You can only enter up to five tags.');
                    return;
                }

                // Iterate over trimmedTags and create HTML structure for each tag
                trimmedTags.forEach(tag => {
                    const $tag = $('<div class="subtag"></div>');
                    $tag.append($('<div></div>').text(tag));
                    // $tag.append($('<button type="button">X</button>'));
                    $('.tagcol').append($tag);
                });
            });

        });




    </script>
</body>

</html>