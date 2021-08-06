<?php

if(isset($_POST["submitfr"])) {
    $email = $_POST["email"];
    
    

    require_once '../../INCLUDES/dbh.inc.php';
    require_once 'functions.php';

    
   
    if (empty($email) == true) {
        header("location: ../forgot-password.php?error=empty");
        exit();
    }

    if(frmatch($conn, $email) == false){

        header("location: ../forgot-password.php?error=noemail");
        exit();
    }
    
    
    
}
if(isset($_POST["submitotp"])) {
    $idems = $_POST["id"];
    $otp = $_POST["otp"];
    
    

    require_once '../../INCLUDES/dbh.inc.php';
    require_once 'functions.php';

    
   
    if (empty($idems) == true) {
        header("location: ../forgot-password-otp.php?error=empty&id=$idems");
        exit();
    }

    if(verifotp($conn, $otp, $idems) == false){

        header("location: ../forgot-password-otp.php?error=wrong&id=$idems");
        exit();
    }
    
   
    
}
if(isset($_POST["changepass"])){
    $idems = $_POST["id"];
    $pass = $_POST["pass"];
    $conpass = $_POST["conpass"];

    require_once '../../INCLUDES/dbh.inc.php';
    require_once 'functions.php';

    
   
    if (empty($idems) || empty($pass) || empty($conpass) == true) {
        header("location: ../changepass.php?error=empty&id=$idems");
        exit();
    }
    if($pass != $conpass){
        header("location: ../changepass.php?error=notmatch&id=$idems");
        exit();
    }

    changepsw($conn, $idems, $pass);
    
}