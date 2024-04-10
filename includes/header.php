 <header>
         <div>
                <div>Tech Query</div>
                <div>About</div>
            </div>
            <div>
                <?php if($row['user_id']) : ?>
             <a href=""><?php echo $row['username']; ?></a>
                 <?php else : ?>
            <a href="login.php" class="logBtn">Log in</a>
                     <?php endif; ?>
            </div>
        </header>