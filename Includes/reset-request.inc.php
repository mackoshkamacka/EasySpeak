<?php

if (isset($_POST["reset-request-submit"])){ 

    $selector = bin2hex(random_bytes(8)); 
    $token = random_bytes(32); 

    $url = "www.easy-speak.ca/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    
    $expires = date("U") + 1800; 

    require "dbh.inc.php"; 

    $userEmail = $_POST["email"]; 

    $sql = "DELETE FROM pwdReset WHERE pwdResetEMail =?;"; 
    $stmt = mysqli_stmt_init($conn); 

    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error"; 
        exit(); 
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail); 
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEMail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn); 

    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error"; 
        exit(); 
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires); 
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt); 

    $to = $userEmail; 
    $subject = "reset your password for Easyspeak"; 

    $message = '<p>We have recieved a request to reset the password attached to this email address. The link to reset your password can be found below. If you have not made this request, please ignore this email.</p>'; 
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="' . $url .'">' .$url . '</a></p>';

    $headrers = "From: Easyspeak <easyspeak@gmail.com>\r\n";
    $headers .= "Reply-To: easyspeak@gmail.com\r\n"; 
    $headers .= "Conent-type: text/html\r\n";

    mail($to, $subject, $message, $headers);
    
    header("Location: ../reset-password.php?reset=success");

}else{
   header("Location: ../Forgot.php"); 
}
