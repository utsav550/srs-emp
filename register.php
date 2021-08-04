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

<form action="INCLUDES/register.inc.php" class="formreg" method="post">
  <div class="container">
    <h1 style="text-align: center;">Register Your Account</h1>
    <p style="text-align: center;">Please fill in this form to create an account.</p>
    <hr>

    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="fname" id="fname" required>

    <label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lname" id="lname" required>

    <label for="lname"><b>Mobile</b></label>
    <input type="text" placeholder="Enter Mobile" name="mobile" id="mob" required>


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>

    <?php

    if(isset($_GET["error"])){

      if($_GET["error"] == "emptyinput"){
        echo '<P style= " color:red"> Please fill all the fields!</p>';
      }
      if($_GET["error"] == "invalidemail"){
        echo '<P style= " color:red"> Please enter valid email!</p>';
      }
      if($_GET["error"] == "macthpass"){
        echo '<P style= " color:red"> Use Same Password for Both Fields!</p>';
      }
      if($_GET["error"] == "invalidmobile"){
        echo '<P style= " color:red"> Use Valid Mobile Number!</p>';
      }
      
      if($_GET["error"] == "exist"){
        echo '<P style= " color:red"> Email address already exist!</p>';
      }
      if($_GET["error"] == "stmt"){
        echo '<P style= " color:red"> There is problem on backend. plase contact admin!</p>';
      }
      if($_GET["error"] == "db"){
        echo '<P style= " color:red"> there is problem with database connection. please contact admim!</p>';
      }
      if($_GET["error"] == "none"){
        echo '<P style= " color:green"> you are sucssefully registerd!</p>';
      }
    }

    ?>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" name="register">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="log-in.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
