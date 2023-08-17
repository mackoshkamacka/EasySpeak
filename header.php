<?php
    require 'Includes/dbh.inc.php'; 
    session_start(); 
?>

<!DOCTYPE html>
<html lang ='en'> 
<head>
    <meta charset = "UTF-8">
    <meta http-equiv="X-UA-Compatible" content ="IE=edge">
    <meta name = "viewport" content ="width=device-width, initial-scale=1.0"> 
    <title>Home</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.cdnfonts.com/css/monument-extended" rel="stylesheet"> 
    <link href="//db.onlinewebfonts.com/c/1a991b240e707c46ca904d731893f108?family=Neue+Montreal" rel="stylesheet" type="text/css"/>

</head>
<body>


<!--Header section starts-->



<header class ="header">
    <section class="flex">
        <a href="landing.php" class = "logo">EASYSPEAK</a> 


        <form action="" method="post" class="search-form">
            <input type ="text" name ="serach_box" placeholder="Search..." 
            required maxlength ="100">
            <button type ="submit" class ="fas fa-search" name = "search_box"></button>
        </form>

        <div class="icons">
            <div id ="search-btn" class="fas fa-search"></div>
            <div id ="user-btn" class="fas fa-user"></div>
            <a href = "home.php"><div id ="home-btn" class="fas fa-home"></div>
        </div>
        <div class  = "buffer">
            
        </div>
        <div class="profile">
            <img src="Images/pngtree-user-icon-png-image_1796659.jpg" alt="">
            <h3>Student name</h3>
            <span>Student info</span>
            <a href="profile.php" class="btn">View profile</a>
            <div class ="flex-btn">
            <?php 
            if(isset($_SESSION["useruid"])){
                echo("<li><a href='Profile.php'>Profile page</a></li>");
                echo("<li><a href='includes/logout.inc.php'>Log out</a></li>");
            }
            else{
                echo'<a href="Login.php" class="option-btn">Login</a>';
                echo'<a href="Register.php" class = "option-btn">Register</a>';
            }
            ?>
            </div>
        </div>
    </section>

</header>

<!--Side section starts-->
<!--
<div class="side-bar">

    <div class="close-side-bar">
        <i class="fas fa-times"></i>
    </div>

    <div class="profile">
        <img src="Images/pngtree-user-icon-png-image_1796659.jpg" alt="">
        <span>Im going to deletee this slider - its unnec</span>
        <a href="profile.php" class="btn">View profile</a>
    </div>

    <nav class="navbar">
        <a href="Home.php"><i class="fas fa-home"></i><span>HOME</span></a>
        <a href="About.php"><i class="fas fa-question"></i><span>ABOUT</span></a>
        <a href="Chapters.php"><i class="fas fa-square-check"></i><span>CHAPTERS</span></a>
        <a href="Contact.php"><i class="fas fa-address-card"></i><span>CONTACT US</span></a>
    </nav>

</div>
        -->
<!--Side section ends-->
        
