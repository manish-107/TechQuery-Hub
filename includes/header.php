<?php include 'config.php';
$admin = new Admin();

if (!isset($_SESSION['user_id'])) {
    // header('location:login.php');
$uid = $_SESSION['user_id'];
$stmt = $admin->ret("SELECT * FROM `users` WHERE `user_id`='$uid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
 <header>
         <div>
                <div>Tech Query</div>
                <div>About</div>
            </div>
            <div>
                <?php if($row['user_id']) : ?>
             <a href=""><?php echo $row['username']; ?></a>
            <a href="controller/u_logout.php" class="logBtn">Log Out</a>

                 <?php else : ?>
            <a href="login.php" class="logBtn">Log in</a>
            <a href="signup.php" class="logBtn">sign up</a>
                     <?php endif; ?>
            </div>
        </header>