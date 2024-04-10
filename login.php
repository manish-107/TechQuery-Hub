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
            <h1>sign In</h1>
            <div class="coolinput">
                <label for="input" class="text">Email:</label>
                <input type="email" placeholder="Enter your email..." name="input" class="input" required>
            </div>
            <div class="coolinput">
                <label for="input" class="text">Password:</label>
                <input type="password" placeholder="Enter your Password..." name="input" class="input" required>
            </div>
            <div class="center">

                <button type="submit">Log In</button>
            </div>
            <div class="signlink center">Don't have an account ?<a href="signup.php">Sign up</a></div>
            <div class="lastText center"><span>TechQuery Hub - </span> Where Questions Find Answers</div>
        </form>
    </div>
</body>

</html>