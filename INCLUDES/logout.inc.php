<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["fname"]);
unset($_SESSION["lname"]);
unset($_SESSION["u_id"]);
unset($_SESSION["u_id"]);

session_destroy();

header("Location: ../index.php");
