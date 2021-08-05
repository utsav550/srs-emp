<?php

function emptyInputSignup($fname, $lname, $email, $mobile, $pass, $conpass)
{

    $result;
    if (empty($fname) || empty($lname) || empty($email) || empty($mobile) || empty($pass) || empty($conpass)) {
        $result = true;
        return $result;
    } else {
        $result = false;
        return $result;
    }
}

function invalidemail($email)
{

    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
        return $result;
    } else {
        $result = false;
        return $result;
    }
}
function passmatch($pass, $conpass)
{

    $result;
    if ($pass !== $conpass) {
        $result = true;
        return $result;
    } else {
        $result = false;
        return $result;
    }
}
function invalidmobile($mobile) {
    $result;
    if (!preg_match("/^[0-9]*$/", $mobile)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emailexist($conn, $email)
{
    $sql = "SELECT * FROM `register` WHERE `email` = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../register.php?error=stmt");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultdata = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultdata)) {
        return $row;
    } else {
        $result = false;
        return $result;
        // for register check
    }
    mysqli_stmt_close($stmt);
}



function createuser($conn, $fname, $lname, $email, $mobile, $pass)
{
    $sql = "INSERT INTO `register`(`f_name`, `l_name`, `email`, `mobile`, `Password`, `status`, `otp`) 
    VALUES (? ,? ,? ,?,?,?,?)";


    $otp = rand(111111, 999999);

    $mailHtml = "Please Confirm your email for SRS with OTP </br> $otp </br> Don't share your personal information with other such as email, password and OTP";

    mail($email, 'Account Verification', $mailHtml);


    $status = "registered";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../register.php?error=db");
        exit();
    }

    $hpass = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $email, $mobile, $hpass, $status, $otp);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../log-in.php?error=suc");
}




// log in system --------------------------------------------------------------------

function loginuser($conn, $email, $pwd)
{
    $emailexist = emailexist($conn, $email);

    if ($emailexist == false) {

        header("Location: ../log-in.php?error=wrongloginem");
        exit();
    }


    $pwdhashed = $emailexist["Password"];


    if (password_verify($pwd, $pwdhashed)) {

        session_start();
        $_SESSION["email"] = $emailexist["email"];
        $_SESSION["fname"] = $emailexist["f_name"];
        $_SESSION["lname"] = $emailexist["l_name"];
        $_SESSION["u_id"] = $emailexist["user_idems"];
        $_SESSION["status"] = $emailexist["status"];
        if ($_SESSION["status"] == "registered") {
            header("Location: ../verifyemail.php?error=done");
            exit();
        }
        header("Location: ../UserDashBoard/index.php?error=done");
        exit();
    } else {
        header("Location: ../log-in.php?error=wrongloginem");
        exit();
    }
}
//---------------------------------- OTP -------------------------------

function verifyuser($conn, $email, $otp)
{
    $emailexist = emailexist($conn, $email);

    if ($emailexist == false) {

        header("Location: ../log-in.php?error=wrongloginem");
        exit();
    }

    $otpdb = $emailexist["otp"];
    $id = $emailexist["user_idems"];
    if ($otpdb == $otp) {
        $status = "verified";
        $sql = "UPDATE `register` SET `status`= ? WHERE `user_idems` = ?";


        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location: ../register.php?error=db");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $status, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if ($_SESSION["status"] == "registered") {
            $_SESSION["status"] = "verified";
        }

        header("Location: ../log-in.php?error=ver");
        exit();
    } else {
        header("Location: ../verifyemail.php?error=wrong");
    }
}
