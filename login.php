<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Page</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/global.css">
</head>

<body>
    <section class="center">
        <div>
            <form action="controller/loginSubmit.php">
                <label for="email">First name:</label>
                <input type="email" id="email" name="email"><br><br>
                <label for="password">Last name:</label>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </section>
</body>

</html>