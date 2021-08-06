<?php
include "includes/session.inc.php";
include "sidebarDB.php";
include "headerDB.php";

require_once "../INCLUDES/dbh.inc.php";
require_once "includes/functions.php";

checkpersonalinfo($eid, $conn);

if (checkpersonalinfo($eid, $conn) == false) {
    $tfn = "";
$gender = "";
$dob = "";
$address = "";
$sub = "";
$state = "";
$zip = "";
    echo '
<a type="button" class="btn-icon-split"  data-toggle="modal" style="color:red; margin-left:45%" data-target="#myModal">
    Complete Profile >>
</a>';
}
else{
    checkpersonalinfo($eid, $conn);
$rowpi = checkpersonalinfo($eid, $conn);
$tfn = $rowpi["TFN"];
$gender = $rowpi["Gender"];
$dob = $rowpi["DOB"];
$address = $rowpi["Address"];
$sub = $rowpi["suburb"];
$state = $rowpi["state"];
$zip = $rowpi["PO"];
}

if(isset($_GET["error"])){

    if($_GET["error"] == "empty"){
      echo '<div class="alert alert-danger" role="alert">
      Please fill out all the fields to update the Password!
    </div>';
    }
    if($_GET["error"] == "done"){
        echo '<div class="alert alert-success" role="alert">
        Information Updated!
      </div>';
      }
    }
?>
<?php

require_once "includes/functions.php";
require_once "../INCLUDES/dbh.inc.php";



?>
 <?php

require_once "includes/functions.php";
require_once "../INCLUDES/dbh.inc.php";

fetchinfo($conn, $emailid);
$row = fetchinfo($conn, $emailid);
$mob =  $row["mobile"];


?>

<hr>

<div class="container">
    <div class="main-body">



        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4> <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="text-transform: uppercase;  font-weight: bold;"><?php echo $fname, "&nbsp", $lname; ?></span></h4>
                                <p class="text-secondary mb-1">Full Stack Developer</p>
                                <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                <button class="btn btn-primary">Follow</button>
                                <button class="btn btn-outline-primary">Message</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                </svg>Website</h6>
                            <span class="text-secondary">https://bootdey.com</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                </svg>Github</h6>
                            <span class="text-secondary">bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                </svg>Twitter</h6>
                            <span class="text-secondary">@bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>Instagram</h6>
                            <span class="text-secondary">bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>Facebook</h6>
                            <span class="text-secondary">bootdey</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" style="text-transform: uppercase;">
                                <?php  echo $fname , "&nbsp" ,$lname; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" >
                            <?php  echo $emailid; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <?php  echo $mob; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">TFN</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" style="text-transform: uppercase;">
                            <?php  echo $tfn; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">DOB</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" style="text-transform: uppercase;">
                            <?php  echo $dob; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Gender</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" style="text-transform: uppercase;">
                            <?php  echo $gender; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" style="text-transform: uppercase;">
                            <?php  echo $address, ", &nbsp", $sub, ", &nbsp", $state, ", &nbsp", $zip; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                if (checkpersonalinfo($eid, $conn) == true) {
                                    echo '
                        <a type="button" class="btn btn-info"  data-toggle="modal"  data-target="#myModaledit">
                        Edit >>
                        </a>';
                                } else {
                                    echo '
                            <a type="button" class="btn-icon-split"  data-toggle="modal" style="color:red;" data-target="#myModal">
                                Complete Profile >>
                            </a>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                <small>Web Design</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Website Markup</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>One Page</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Mobile Template</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Backend API</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                <small>Web Design</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Website Markup</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>One Page</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Mobile Template</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Backend API</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
</div>
<!---------------------------------------------------------------// Perosnal info modal //------------------------------------------------------------------------------------------------>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <?php

    require_once "includes/functions.php";
    require_once "../INCLUDES/dbh.inc.php";

    fetchinfo($conn, $emailid);
    $row = fetchinfo($conn, $emailid);
    $mob =  $row["mobile"];


    ?>
    <div class="modal-dialog modal-dialog-centered" role="document">
    
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Personal Information</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-danger" role="alert">
  please fill out all the fields to update the Information!
</div>
            <div style="width: 90%; margin:auto">
                <form action="includes/pinfo.php"  method="POST">
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" style="text-transform :uppercase" ; placeholder="<?php echo $fname;   ?>" readonly>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control" style="text-transform :uppercase" ; placeholder="<?php echo $lname;   ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control" placeholder="<?php echo $emailid;   ?>"  name="emailid" value="<?php echo $emailid;?>" readonly>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input type="text" class="form-control" style="text-transform :uppercase"; placeholder="<?php echo $mob;   ?>" readonly>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TFN</label>
                        <input type="text" class="form-control" name="tfn">

                    </div>
                    <label for="exampleInputEmail1">Select Gender</label>
                    <div class="form-check form-check-inline">

                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Date of Birth  <span style="color:red"> Please use YYYY-MM-DD formate!</span></label>
                        <input type="text" name="dob" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address">

                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1">Suburb</label>
                            <input type="text" class="form-control" name="sub">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">City</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1">State</label>
                            <input type="text" class="form-control" name="state">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">Zip</label>
                            <input type="text" class="form-control" name="zip">
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="pinfosubmit">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!---------------------------------------------------------------// Perosnal info modal edit //------------------------------------------------------------------------------------------------>
<div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <?php

    require_once "includes/functions.php";
    require_once "../INCLUDES/dbh.inc.php";
    checkpersonalinfo($eid, $conn);
    $rowpi = checkpersonalinfo($eid, $conn);
    $tfn = $rowpi["TFN"];
    $gender = $rowpi["Gender"];
    $dob = $rowpi["DOB"];
    $address = $rowpi["Address"];
    $sub = $rowpi["suburb"];
    $state = $rowpi["state"];
    $zip = $rowpi["PO"];


    ?>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Personal Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="width: 90%; margin:auto">
            <div class="alert alert-danger" role="alert">
  please fill out all the fields to update the Information!
</div>
                <form action="includes/piupdate.php"  method="POST">
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" style="text-transform :uppercase" ; placeholder="<?php echo $fname;   ?>" readonly>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control" style="text-transform :uppercase" ; placeholder="<?php echo $lname;   ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control" placeholder="<?php echo $emailid;   ?>"  name="emailid" value="<?php echo $emailid;?>" readonly>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input type="text" class="form-control" style="text-transform :uppercase"; placeholder="<?php echo $mob;?>" readonly>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TFN</label>
                        <input type="text" class="form-control" name="tfn" placeholder="<?php echo $tfn;?>">

                    </div>
                    <label for="exampleInputEmail1">Select Gender</label>
                    <?php
                    if($gender == "male"){
                        echo'
                        <div class="form-check form-check-inline">

                        <input class="form-check-input" type="radio" name="gender"  id="inlineRadio1" value="male" checked>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        ';
                    }
                    else{
                        echo'
                        <div class="form-check form-check-inline">

                        <input class="form-check-input" type="radio" name="gender"  id="inlineRadio1" value="male">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender"  id="inlineRadio2" value="female" checked>
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        ';
                    }
?>
                    
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Date of Birth  <span style="color:red"> Please use YYYY-MM-DD formate!</span></label>
                        <input type="text" name="dob" class="form-control" placeholder="<?php echo $dob;?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="<?php echo $address;?>">

                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1">Suburb</label>
                            <input type="text" class="form-control" name="sub" placeholder="<?php echo $sub;?>">
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1">State</label>
                            <input type="text" class="form-control" name="state" placeholder="<?php echo $state;?>">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">Zip</label>
                            <input type="text" class="form-control" name="zip" placeholder="<?php echo $zip;?>">
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="piupdate">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php

include "footer.php";


?>