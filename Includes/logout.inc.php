<?php
session_start(); 
session_unset(); 
session_destroy(); 
header("loacation: ../Landing.php"); 
exit(); 
