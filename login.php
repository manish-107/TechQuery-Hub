<?php require 'config.php';

if (isset($_SESSION['user_id'])) {
    header('location:getstarted.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container element">
        <form action="controller/loginbackend.php" method="POST">
            <h1>sign In</h1>
            <div class="coolinput">
                <label for="l_email" class="text">Email:</label>
                <input type="email" placeholder="Enter your email..." name="l_email" class="input" required>
            </div>
            <div class="coolinput">
                <label for="l_password" class="text">Password:</label>
                <input type="password" placeholder="Enter your Password..." name="l_password" class="input" required>
            </div>
            <div class="center">

                <button type="submit" name="l_user">Log In</button>
            </div>
            <div class="signlink center">Don't have an account ?<a href="signup.php">Sign up</a></div>
            <div class="lastText center"><span>TechQuery Hub - </span> Where Questions Find Answers</div>
        </form>
    </div>
</body>

</html>