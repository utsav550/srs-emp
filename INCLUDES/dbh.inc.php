<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "SRS-EMS";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die("connnection faild:" . mysqli_connect_errno());
}

