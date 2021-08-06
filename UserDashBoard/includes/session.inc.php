<?php

session_start();
if(!empty($_SESSION["email"])){
$eid =  $_SESSION["u_id"];
$emailid = $_SESSION["email"];
$fname =  $_SESSION["fname"];
$lname =  $_SESSION["lname"];
if($_SESSION["status"] == "registered"){
    echo "<P> unverified email!</P>";
}}
else{
    header("Location: login.php?error=session");
}
?>