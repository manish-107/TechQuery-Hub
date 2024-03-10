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
        <form action="#">
            <h1>Sign up</h1>
            <div class="coolinput">
                <label for="input" class="text">Name:</label>
                <input type="text" placeholder="Enter your name..." name="input" class="input">
            </div>
            <div class="coolinput">
                <label for="input" class="text">Email:</label>
                <input type="email" placeholder="Enter your Email..." name="input" class="input">
            </div>
            <div class="coolinput">
                <label for="input" class="text">Password:</label>
                <input type="password" placeholder="Enter your Password..." name="input" class="input">
            </div>
            <div class="center">

                <button type="submit">Sign Up</button>
            </div>
            <div class="signlink center">Already has account ? <a href="login.php">Sign in</a></div>
            <div class="lastText center"><span>TechQuery Hub - </span> Where Questions Find Answers</div>
        </form>
    </div>
</body>

</html>