<?php 
    include_once 'header.php'
?>

<section class="login">
    <div class="row">
        <form action="Includes/Register.inc.php" method="post">
            <h3>REGISTER</h3>
            <input type="text" name ='name' placeholder="Name: " required maxlength ="100"  class="box">
            <input type="text" name ='email' placeholder="Email: " required maxlength ="100"  class="box">
            <input type="text" name ='uid' placeholder="Username: " required maxlength ="100"  class="box">
            <input type="password" name ='pwd' placeholder="Password: " required maxlength ="100" class="box">
            <input type="password" name ='pwdrepeat' placeholder="Confirm password: " required maxlength ="100"  class="box">
            <input type="submit" value="SUBMIT" class ="row-btn" name="submit">
        </form>
    </div>
    <a href="Login.php.php" class = "inline-btn">Login</a>
    <a href= "Forgot.php" class = "inline-btn">Forgot password?</a>
    <a href="#" class = "loginIcon">google,facebook signin</a>


    <div class ="row">
        <?php
        if(isset($_GET["error"])){
            if ($_GET["error"]=="emptyinput"){
                echo("<h3 class = 'error'>Fill in all fields!</h3>");
            }
            else if ($_GET["error"]=="invalidUid"){
                echo("<h3 class = 'error'>Invalid username!</h3>");
            }
            else if ($_GET["error"]=="pwddoesntmatch"){
                echo("<h3 class = 'error'>Passwords don't match!</h3>");
            }
            else if ($_GET["error"]=="usernametaken"){
                echo("<h3 class = 'error'>Username/Email taken</h3>");
            }
            else if ($_GET["error"]=="invalidemail"){
                echo("<h3 class = 'error'>Invalid email</h3>");
            }        
            else if ($_GET["error"]=="stmtfailed"){
                echo("<h3 class = 'error'>Something went wrong, try again</h3>");
            }
            else if ($_GET["error"]=="none"){
                echo ("<h3 class = 'error'> You have been signed up!</h3>");
            }
         }
        ?>
    </div>
</section>





<?php 
    include_once 'footer.php'
?>

<script src="Javascript/script.js"></script> 
</body>
</html>

