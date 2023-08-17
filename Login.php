<?php 
    include_once 'header.php'
?>





<section class="login">
    <div class="row">
        <form action="Includes/login.inc.php" method="post">
            <h3>LOGIN</h3>
            <input type="text" placeholder="Username/Email: " required maxlength ="100" name ='uid' class="box">
            <input type="password" placeholder="Password: " required maxlength ="100" name ='pwd' class="box">
            <input type="submit" value="SUBMIT" class ="row-btn" name="submit">
        </form>
    </div>
    <a href="Forgot.php" class = "inline-btn">Forgot password? </a>
    <a href="Register.php" class = "inline-btn">Signup </a>
    <a href="#" class = loginIcon>google,facebook signin</a>
    <div class = "row">
    <?php
        if(isset($_GET["error"])){
            if ($_GET["error"=="emptyinput"]){
                echo("<p>Fill in all fields!</p>");
            }
            else if ($_GET["error"]=="wronglogin"){
                echo("<p>Incorrect login information</p>");
            }
            
         }
    ?>
    </div>

    </div>
</section>






<?php 
    include_once 'footer.php'
?>

<script src="Javascript/script.js"></script> 
</body>
</html>
