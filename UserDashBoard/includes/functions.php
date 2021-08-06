<?php


function checkpersonalinfo($eid, $conn)
{
    $result;

    $sql = "SELECT * FROM `personal_info` WHERE `user_idems` = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../register.php?error=stmt");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $eid);
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

function fetchinfo($conn, $emailid)
{
    $sql = "SELECT * FROM `register` WHERE `email` = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../404.html?error=stmt");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $emailid);
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
function fetchinfoid($conn, $id)
{
    $sql = "SELECT * FROM `register` WHERE `user_idems` = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../404.html?error=stmt");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $id);
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
function addpi($conn, $emailid, $tfn, $gender, $dob, $address, $sub, $city, $state, $zip)
{

    fetchinfo($conn, $emailid);
    $row = fetchinfo($conn, $emailid);
    $user_idems =  $row["user_idems"];

    $sql = "INSERT INTO `personal_info`( `user_idems`,`Gender`, `DOB`, `Address`, `suburb`, `state`, `PO`, `TFN`)
    VALUES (?,? ,? ,? ,?,?,?,?)";


    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../register.php?error=db");
        exit();
    }



    mysqli_stmt_bind_param($stmt, "ssssssss", $user_idems, $gender, $dob, $address, $sub, $state, $zip, $tfn,);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../profile.php?error=done");
}
function updatepi($conn, $emailid, $tfn, $gender, $dob, $address, $sub, $state, $zip)
{

    fetchinfo($conn, $emailid);
    $row = fetchinfo($conn, $emailid);
    $user_idems =  $row["user_idems"];

    $sql = "UPDATE `personal_info`
     SET `Gender`= ? ,`DOB`= ?,`Address`= ?,`suburb`= ?,`state`= ?,`PO`= ?,`TFN`= ?
     WHERE `user_idems` = $user_idems";


    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../register.php?error=db");
        exit();
    }



    mysqli_stmt_bind_param($stmt, "sssssss", $gender, $dob, $address, $sub, $state, $zip, $tfn,);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../profile.php?error=done");
}
function repassmatch($pass, $conpass)
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
function changepass($conn, $emailid, $newpass, $oldpass)
{

    $fetchpass = fetchinfo($conn, $emailid);
    $row = fetchinfo($conn, $emailid);
    $dbpass =  $row["Password"];
    $user_idems = $row["user_idems"];
   echo $user_idems;
   
    
    if (password_verify($oldpass, $dbpass)) {
        echo $user_idems;
      
        $sql = "UPDATE `register`
        SET `Password`= ?
        WHERE `user_idems` = $user_idems";


        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          
        }

        $hnpass = password_hash($newpass, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "s", $hnpass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../reset.php?error=done");
    }
    else{
        header("Location: ../reset.php?error=wrongpass");
    }
}

function frmatch($conn, $email){
    if(fetchinfo($conn, $email)== false){
        header("Location: ../forgot-password.php?error=noemail");  
    }
    else{
    $row = fetchinfo($conn, $email);
    $idems =  $row["user_idems"];
    $otp = rand(111111, 999999);
    echo $otp;
    $mailHtml = "Please reser your password for SRS with OTP $otp. Don't share your personal information with other such as email, password and OTP";
    mail($email, 'Password-Reset', $mailHtml);
    updateotp($conn, $idems, $otp);
    
    exit();
  
    }

}
function updateotp($conn, $idems, $otp){
    $sql = "UPDATE `register`
    SET `otp`= ?
    WHERE `user_idems` = $idems";


    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      
    }
    mysqli_stmt_bind_param($stmt, "s", $otp);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../forgot-password-otp.php?error=send&id=$idems");
}
function verifotp($conn, $otp, $idems)
{
    $row2 = fetchinfoid($conn, $idems);

    if (fetchinfoid($conn,$idems) == false) {

        header("Location: ../log-in.php?error=wrongloginem");
        exit();
    }

    $otpdb = $row2["otp"];
    
    if ($otpdb == $otp) {
        
        header("Location: ../changepass.php?id=$idems");
        exit();
    } else {
        header("Location: ../verifyemail.php?error=wrong");
    }
}
function changepsw($conn, $idems, $pass){

    $sql = "UPDATE `register`
        SET `Password`= ?
        WHERE `user_idems` = $idems";


        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          
        }

        $hnpass = password_hash($pass, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "s", $hnpass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../login.php?error=freset");

}