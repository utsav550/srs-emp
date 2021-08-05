<?php


function checkpersonalinfo($eid, $conn){
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

function fetchinfo($conn, $emailid){
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

function addpi($conn,$emailid, $tfn, $gender, $dob, $address, $sub, $city, $state, $zip){

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

  

    mysqli_stmt_bind_param($stmt, "ssssssss",$user_idems, $gender, $dob, $address, $sub, $state, $zip, $tfn,);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../profile.php?error=done");

}
function updatepi($conn,$emailid, $tfn, $gender, $dob, $address, $sub, $state, $zip){

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

