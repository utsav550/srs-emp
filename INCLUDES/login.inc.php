<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pwd = $_POST["psw"];

    require_once 'dbh.inc.php'; 
    require_once 'functions.php';

    loginuser($conn, $email, $pwd);
   
}
else{
    header("Location: ../log-in.php");
    exit();
}

