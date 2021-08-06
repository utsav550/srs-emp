<?php
include "session.inc.php";
if(isset($_POST["reset"])) {
    $oldpass = $_POST["oldpass"];
    $newpass = $_POST["newpass"];
    $connewpass = $_POST["connewpass"];
    

    require_once '../../INCLUDES/dbh.inc.php';
    require_once 'functions.php';

    
   
    if (empty($oldpass) || empty($newpass) || empty($connewpass)) {
        header("location: ../reset.php?error=empty");
        exit();
    }

    if(repassmatch($newpass, $connewpass) !== false){

        header("location: ../reset.php?error=macthpass");
        exit();
    }
    
    changepass($conn, $emailid, $newpass, $oldpass);
    
}
else{
    header("location: ../register.php?error");
    exit();}