<?php
include "includes/session.inc.php";
include "sidebarDB.php";
include "headerDB.php";


?>
<div class="modal-header">
    <h5 style="text-align: center;">Reset Password</h5>

   

</div>

<div style="width: 70%; margin:auto">
<?php


if(isset($_GET["error"])){

    if($_GET["error"] == "empty"){
      echo '<div class="alert alert-danger" role="alert">
      Please fill out all the fields to update the Information!
    </div>';
    }
    if($_GET["error"] == "macthpass"){
        echo '<div class="alert alert-danger" role="alert">
        New Password and Confirm Password Does not match!
      </div>';
      }
      if($_GET["error"] == "wrongpass"){
        echo '<div class="alert alert-danger" role="alert">
        Please Enter Correct Password For Your Account!
      </div>';
      }
      
    if($_GET["error"] == "done"){
        echo '<div class="alert alert-success" role="alert">
        Information Updated!
      </div>';
      }
    }

?>
    <form action="includes/reset.inc.php" method="POST">
    <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Old Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" name="oldpass" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" name="newpass" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" name="connewpass" placeholder="Password">
    </div>
  </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="reset">Save changes</button>
        </div>
</div>
</form>


<?php
include "footer.php";
?>