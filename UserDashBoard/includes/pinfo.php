<?php


if(isset($_POST["pinfosubmit"])) {
    $emailid = $_POST["emailid"];
    $tfn = $_POST["tfn"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $sub = $_POST["sub"];
    
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    require_once '../../INCLUDES/dbh.inc.php';
    require_once 'functions.php';

    
    if (empty($tfn) || empty($gender) || empty($dob) || empty($address) || empty($sub) || empty($state) || empty($zip)) {
        header("location: ../profile.php?error=empty");
        exit();
    }
    

    addpi($conn,$emailid, $tfn, $gender, $dob, $address, $sub, $city, $state, $zip);
    
}









    

    

