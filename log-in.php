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
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
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

    .formreg {
      width: 60%;
      margin: auto;
    }

    @media screen and (max-width: 700px) {

      .formreg {
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

  <form action="INCLUDES/login.inc.php" class="formreg" method="post">
    <div class="container">
      <h1 style="text-align: center;">log-in to your Account</h1>

      <hr>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

      <?php

      if (isset($_GET["error"])) {

        if ($_GET["error"] == "emptyinput") {
          echo '<P style= " color:red"> please fill all the fields!</p>';
        }
        if ($_GET["error"] == "wrongloginem") {
          echo '<P style= " color:red">Incorrect Details!</p>';
        }
        if ($_GET["error"] == "suc") {
          echo '<P style= " color:green"> Your Account has been Registered. Please Log-in!</p>';
        }
        if ($_GET["error"] == "ver") {
          echo '<P style= " color:green"> Your account has been activated successfully!</p>';
        }
        if ($_GET["error"] == "exist") {
          echo '<P style= " color:red"> email address already exist!</p>';
        }
        if ($_GET["error"] == "stmt") {
          echo '<P style= " color:red"> there is problem on backend. plase contact admin!</p>';
        }
        if ($_GET["error"] == "db") {
          echo '<P style= " color:red"> there is problem with database connection. please contact admim!</p>';
        }
        if ($_GET["error"] == "none") {
          echo '<P style= " color:green"> You are sucssefully registerd!</p>';
        }
      }

      ?>
      <button type="submit" class="registerbtn" name="submit">Log-in</button>
    </div>

    <div class="container signin">
      <div class="text-center">
        <a class="small" href="UserDashBoard/forgot-password.php">Forgot Password?</a>
      </div>
      <p>Don't have an account? <a href="register.php">Sign up</a>.</p>
    </div>
  </form>

</body>

</html>