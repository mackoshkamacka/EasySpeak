<?php

if(isset($_POST["submit"])) {
    $name =$_POST["name"];    
    $email =$_POST["email"];    
    $username =$_POST["uid"];    
    $pwd =$_POST["pwd"];    
    $pwdRepeat =$_POST["pwdrepeat"];    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat)!== false){
        header("location: ../Register.php?error=emptyinput");
        exit();
    }
    

    if(pwdMatch($pwd, $pwdRepeat)!== false){
        header("location: ../Register.php?error=pwddoesntmatch");
        exit();
    }

    if(uidExists($conn, $username, $email)!== false){
        header("location: ../Register.php?error=usernametaken");
        exit();
    }

    if(invalidEmail($email)!== false){
        header("location: ../Register.php?error=invalidemail");
        exit();
    }

    if (invalidUid($username)!== false){
        header("location: ../Register.php?error=invalidUid");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);


}
else {
    header("location: ../Register.php");
    exit();
}