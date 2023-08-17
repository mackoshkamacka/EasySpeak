<?php 
    include_once 'header.php'
?>

<main class = "forgot">
    <div class = "row">
            <h3>RESET PASSWORD</h3>
            <p>We will send an email to the email attached to your account. In your inbox, you will find further instructions as to how you can reset your password.</p>
            <form action = "includes/reset-request.inc.php" method = "post" class = "box">
                <input type = "text" name = "email" placeholder = "Email address" class = "enter">
                <button type = "submit" name ="reset-request-submit" class = "row-btn">Recieve password reset link</button>
            </form>
    </div>
</main>









<?php 
    include_once 'footer.php'
?>

<script src="Javascript/script.js"></script> 
</body>
</html>
