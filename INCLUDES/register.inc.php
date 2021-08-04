<?php


if(isset($_POST["register"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $pass = $_POST["psw"];
    $conpass = $_POST["psw-repeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.php';


    if(emptyInputSignup($fname, $lname, $email, $mobile, $pass, $conpass) !== false){
        echo $fname, $lname, $email, $mobile, $pass, $conpass;
        header("location: ../register.php?error=emptyinput");
        exit();
    }

    if(invalidemail($email) !== false){

        header("location: ../register.php?error=invalidemail");
        exit();
    }

    if(passmatch($pass, $conpass) !== false){

        header("location: ../register.php?error=macthpass");
        exit();
    }
    if (invalidmobile($mobile) !== false) {

        header("Location: ../register.php?error=invalidmobile");
        exit();
    }
    if(emailexist($conn, $email) !== false){
        header("location: ../register.php?error=exist");
        exit();
    }

    createuser($conn, $fname, $lname, $email, $mobile, $pass);
    
}
else{
    header("location: ../register.php?error");
    exit();
}


