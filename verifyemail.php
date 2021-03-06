<?php

session_start();
if(!empty($_SESSION["email"])){
$email =  $_SESSION["email"];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
 
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}
.formreg{
    width: 60%;
    margin: auto;
}
@media screen and (max-width: 700px) {

    .formreg{
        width: 100%
    }
    
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="INCLUDES/verify.inc.php" class="formreg" method="post">
  <div class="container">
    <h1 style="text-align: center;">Verify E-mail</h1>
    
    <hr>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="<?php echo $email; ?>" name="email" id="email" value="<?php echo $email; ?>" readonly>
        <label for="email"><b>Enter OTP</b></label>
    <input type="text" placeholder="123456" name="otp" id="email" required>

    
    <p>we've just sent a one time password to verify your email(<?php echo $email;  ?>). if you can't find the email please check the Spam folder. </p>
    <?php

    if(isset($_GET["error"])){

      
      if($_GET["error"] == "db"){
        echo '<P style= " color:red"> there is problem with database connection. please contact admim!</p>';
      }
      if($_GET["error"] == "none"){
        echo '<P style= " color:green"> you are sucssefully registerd!</p>';
      }
    }

    ?>
       <button type="submit" class="registerbtn" name="verify">Verify</button>
  </div>
  
  <div class="container signin">
    <p>Don't have an account? <a href="register.php">Sign up</a>.</p>
  </div>
</form>

</body>
</html>