<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result = false; 
    if(empty($name) || empty($email) ||empty($username) || empty($pwd) ||empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result =false; 
    }
    return $result; 
}

function pwdMatch($pwd, $pwdRepeat){
    $result = false; 
    if($pwd!== $pwdRepeat){
        $result = true;
    }
    else{
        $result =false; 
    }
    return $result; 
}

function invalidUid($username){
    $result = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
 }

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail =?;";
    $stmt = mysqli_stmt_init($conn); 
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../Register.php?error=stmtfailed");
        exit();
    }

    
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt); 

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row; 
    }
    else{
        $result =false; 
        return $result; 
    }

    mysqli_stmt_close($stmt); 

}

function invalidEmail($email){
    $result = false; 
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result =false; 
    }
    return $result; 
}


function createUser($conn, $name, $username, $email, $pwd){
    $sql = "INSERT INTO users (userName, usersUid, usersEmail, usersPwd) VALUES(?, ?, ?, ?); ";
    
    $stmt = mysqli_stmt_init($conn); 
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../Register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); 
    
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt); 
    header("location: ../Home.php"); 
    exit(); 

}

function emptyInputLogin($username, $pwd){
    $result = false; 
    if(empty($username) || empty($pwd)){
            $result = true;
        }
        else{
            $result =false; 
        }
        return $result; 
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("location: ../Login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["usersPwd"]; 
    $checkPwd = password_verify($pwd, $pwdHashed); 
    if($checkPwd === false){
        header("login: ../Login.php?error=wronglogin"); 
        exit();
    }
    else if($checkPwd === true){
        session_start(); 
        $_SESSION["userid"] = $uidExists["usersID"];
        $_SESSION["useruid"] = $uidExists["usersUiD"];
        header("location: ../home.php");
    }
}
