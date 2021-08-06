<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_GET["id"])){
$idems = $_GET["id"];}
else{
    header("Location: forgot-password.php");
}

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SRS-EMS | Reset Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">OTP Verification!</h1>
                                    </div>
                                    <form class="user" action="includes/forgot.inc.php"  method="post">
                                        <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Password" name="id" value="<?php  echo $idems; ?> " hidden>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter OTP" name="otp">
                                        </div>

                                        <?php
   
        
    if(isset($_GET["error"])){

      if($_GET["error"] == "empty"){
        echo '<div class="alert alert-danger" role="alert">
       Please Enter OTP.
      </div>';
      }
      if($_GET["error"] == "send"){
        echo '<div class="alert alert-success" role="alert">
        We have just sent you en email with OTP. Please verify your Account.
      </div>
      <div class="alert alert-danger" role="alert">
        Please Check SPAM folder.
      </div>';
      }
      if($_GET["error"] == "wrong"){
        echo '<div class="alert alert-danger" role="alert">
        Incorrect OTP.
       </div>';
      }
      if($_GET["error"] == "ver"){
        echo '<P style= " color:green"> Your account has been activated successfully!</p>';
      }
      if($_GET["error"] == "exist"){
        echo '<P style= " color:red"> email address already exist!</p>';
      }
      if($_GET["error"] == "stmt"){
        echo '<P style= " color:red"> there is problem on backend. plase contact admin!</p>';
      }
      if($_GET["error"] == "db"){
        echo '<P style= " color:red"> there is problem with database connection. please contact admim!</p>';
      }
      if($_GET["error"] == "none"){
        echo '<P style= " color:green"> You are sucssefully registerd!</p>';
      }
    }

    ?>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="submitotp">Verify OTP</button>
                                            
                                        </a>
                                        <hr>
                                        
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>