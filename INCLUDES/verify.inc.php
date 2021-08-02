<?php
if (isset($_POST["verify"])) {
    $email = $_POST["email"];
    $otp = $_POST["otp"];

    require_once 'dbh.inc.php'; 
    require_once 'functions.php';
    verifyuser($conn, $email, $otp);
   
}
else{
    header("Location: ../log-in.php");
    exit();
}
