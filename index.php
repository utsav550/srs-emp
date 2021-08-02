<?php

session_start();
if(!empty($_SESSION["email"])){
echo $_SESSION["email"];
echo $_SESSION["fname"];
if($_SESSION["status"] == "registered"){
    echo "<P> unverified email!</P>";
}}
?>
<!DOCTYPE html>
<a href="register.php"> register</a>
<a href="log-in.php"> LOGIN</a>
<a href="INCLUDES/logout.inc.php"> log-out</a>
</html>