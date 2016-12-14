<?php include'../../include/functions.php';?>
<?php session_start(); check_session();?>
<?php include'../../include/db_conn.php';?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id=$_POST['id'];
        $title=$_POST['title'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $mname=$_POST['mname'];
        $dob=$_POST['dob'];
        $pob=$_POST['pob'];
        $gender=$_POST['Gender'];
        $status=$_POST['Civil_status'];
        $religion=$_POST['religion'];
        $bloodtype=$_POST['bloodtype'];
        $house_no=$_POST['h_number'];
        $city=$_POST['city'];
        $mobile_no=$_POST['mobile'];
        $home_no=$_POST['home_number'];
        $work_no=$_POST['work_number'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $i_scheme=$_POST['ischeme'];
        $i_no=$_POST['i_no'];

u_patient($title,$fname,$lname,$mname,$dob,$pob,$gender,$status,$religion,$bloodtype,$house_no,$city,$mobile_no,$home_no,$work_no,$address,$email,$i_scheme,$i_no,$conn);
}
?>
<?php include'../../include/header.php';?>
<?php include'../../include/search_modal.php';?>
<?php 
    $id=$_GET['id'];
    $edit=$_GET['edit'];

    $_SESSION['edit']=edit_patient($id,$edit,$conn);
?>
<div class="wrapper">
    <div class="sidebar" data-color="black" data-image="../../assets/img/sidebar-4.jpg">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Smart H.
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="index">
                        <i class="pe-7s-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="patient_mg">
                        <i class="pe-7s-folder"></i>
                        <p>Patient Management</p>
                    </a>
                </li>
                <li>
                    <a href="emr_sheet">
                        <i class="pe-7s-file"></i>
                        <p>EMR Sheet</p>
                    </a>
                </li>
                <li>
                    <a href="room_mg">
                        <i class="pe-7s-note2"></i>
                        <p>Room Managment</p>
                    </a>
                </li>
                <li>
                    <a href="doctor">
                        <i class="pe-7s-eyedropper"></i>
                        <p>Doctor Module</p>
                    </a>
                </li>
                <li>
                    <a href="nurse">
                        <i class="pe-7s-bandaid"></i>
                        <p>Nurse Module</p>
                    </a>
                </li>
                <li>
                    <a href="user_mg">
                        <i class="pe-7s-user"></i>
                        <p>User Management</p>
                    </a>
                </li>
                <li>
                    <a href="admin">
                        <i class="pe-7s-key"></i>
                        <p>Administrator</p>
                    </a>
                </li>
                <li>
                    <a href="reports">
                        <i class="pe-7s-albums"></i>
                        <p>Report Generation</p>
                    </a>
                </li>
                <li>
                    <a href="billing">
                        <i class="pe-7s-calculator"></i>
                        <p>Billing</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class=""></i> Patient Management</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-globe"></i>
                                    <b class="caret"></b>
                                    <?php //<span class="notification"></span>?>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="" data-toggle="modal" data-target="#searchmodal">
                                <i class="glyphicon glyphicon-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php user_session();?>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="user_profile">User Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="../../include/logout.php">Logout</a></li>
                              </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <a href="#plistmodal" data-toggle="modal">Patient List </a>&#8226;
                        <a href="#outpatient" data-toggle="modal"> Outpatient Department(OPD) </a>&#8226;
                        <a href="#inpatient" data-toggle="modal"> In-Patient Department(IPD) </a>
                        <hr>
                        <div  class="tabbable">
                            <ul class="nav nav-tabs">
                                <li role="presentation" class="active"><a href="#personal_info" data-toggle="tab">Personal Information</a></li>
                                <li role="presentation"><a href="#contact_info" data-toggle="tab">Contact Information</a></li>
                                <li role="presentation"><a href="#other_info" data-toggle="tab">Other Information</a></li>
                                <div class="pull-right">
                                <button class="btn btn-default btn-fill btn-sm" onclick="refresh();">Cancel</button>
                                <button class="btn btn-default btn-fill btn-sm" type="submit"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
                                </div>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane mp active" id="personal_info">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Patient ID</label> 
                                            <input type="number" class="form-control" name="id" placeholder="Auto-generated" value="<?php echo $_SESSION['edit']['P_ID'];?>"> 
                                        </div>

                                        <div class="col-md-2">
                                            <label>Smart ID <b style="color: red">*</b></label> 
                                            <input type="text" class="form-control" name="smartid" disabled value="<?php echo $_SESSION['edit']['smart_ID'];?>"> 
                                        </div>

                                        <div class="col-md-2">
                                            <label>Title <b style="color: red">*</b></label>
                                            <select class="form-control" name="title" required>
                                                <option value="" disabled selected style="display: none;">Title</option>
                                                <option value="Dr." name="title" >Dr.</option> 
                                                <option value="Mr." name="title" >Mr.</option> 
                                                <option value="Mrs." name="title" >Mrs.</option> 
                                                <option value="Ms." name="title" >Ms.</option> 
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label>First Name <b style="color: red">*</b></label>
                                            <input name="fname" type="text" class="form-control" placeholder="First Name" value="<?php echo $_SESSION['edit']['First_name'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label>Last Name <b style="color: red">*</b></label>
                                            <input name="lname" type="text" class="form-control" placeholder="Last Name" value="<?php echo $_SESSION['edit']['Last_name'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label>Middle Name</label>
                                            <input name="mname" type="text" class="form-control" placeholder="Middle Name" value="<?php echo $_SESSION['edit']['Middle_name'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label>Date of Birth <b style="color: red">*</b></label>
                                            <input name="dob" type="date" class="form-control" placeholder="Date of Birth" value="<?php echo $_SESSION['edit']['DOB'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                            <label>Place of Birth <b style="color: red">*</b></label>
                                            <input name="pob" type="text" class="form-control" placeholder="Place of Birth" value="<?php echo $_SESSION['edit']['Place_of_birth'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Gender <b style="color: red">*</b></label>
                                                <select class="form-control" name="Gender" required>
                                                    <option value="" disabled selected style="display: none;">Gender</option>
                                                    <option name="Gender" value="Male">Male</option>
                                                    <option name="Gender" value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Civil Status</label>
                                                <select class="form-control" name="Civil_status" required>
                                                    <option value="" disabled selected style="display: none;">Civil Status</option>
                                                    <option value="Single" name="Civil_status">Single</option>
                                                    <option value="Married" name="Civil_status">Married</option>
                                                    <option value="Divorced" name="Civil_status">Divorced</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="from-group">
                                                <label>Religion</label>
                                                <select class="form-control" name="religion">
                                                    <option value="" disabled selected style="display: none;">Religion</option>
                                                    <option value="Buddhism" name="religion">Buddhism</option>
                                                    <option value="Christianity" name="religion">Christianity</option>
                                                    <option value="Confucianism" name="religion">Confucianism</option>
                                                    <option value="Hinduism" name="religion">Hinduism</option>
                                                    <option value="Islam" name="religion">Islam</option>
                                                    <option value="Jainism" name="religion">Jainism</option>
                                                    <option value="Judaism" name="religion">Judaism</option>
                                                    <option value="Shinto" name="religion">Shinto</option>
                                                    <option value="Sikhism" name="religion">Sikhism</option>
                                                    <option value="Taoism" name="religion">Taoism</option>
                                                    <option value="Zoroastrianism" name="religion">Zoroastrianism</option>
                                                    <option value="other" name="religion">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Blood Group</label>
                                                <select class="form-control" name="bloodtype">
                                                    <option value="" disabled selected style="display: none;">Type</option>
                                                    <option value="O+" name="bloodtype">O+</option>
                                                    <option value="O-" name="bloodtype">O–</option>
                                                    <option value="A+" name="bloodtype">A+</option>
                                                    <option value="A-" name="bloodtype">A–</option>
                                                    <option value="B+" name="bloodtype">B+</option>
                                                    <option value="B-" name="bloodtype">B–</option>
                                                    <option value="AB+" name="bloodtype">AB+</option>
                                                    <option value="AB-" name="bloodtype">AB–</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane mp" id="contact_info">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>House No</label>
                                                <input name="h_number" type="text" class="form-control" placeholder="House Number" value="<?php echo $_SESSION['edit']['House_number'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City/Town <b style="color: red">*</b></label>
                                                <select class="form-control" required name="city">
                                                    <option value="" disabled selected style="display: none;">City/Town</option>
                                                    <option value="Accra" name="city">Accra</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label>Phone No (Mobile) <b style="color: red">*</b></label>
                                            <input name="mobile" type="number" class="form-control" placeholder="Mobile number" min="10" value="<?php echo $_SESSION['edit']['Phone_num1'];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label>Phone No (Home)</label>
                                            <input name="home_number" type="number" class="form-control" placeholder="Home telephone" value="<?php echo $_SESSION['edit']['Phone_num2'];?>" min="10">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label>Phone No (Work)</label>
                                            <input name="work_number" type="number" class="form-control" placeholder="Work telephone" value="<?php echo $_SESSION['edit']['Phone_num3'];?>" min="10">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                            <label>Address</label>
                                            <input name="address" type="text" class="form-control" placeholder="Postal Address" value="<?php echo $_SESSION['edit']['Address'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" placeholder="Email Address" value="<?php echo $_SESSION['edit']['Email'];?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane mp" id="other_info">
                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Insurance Scheme <b style="color: red">*</b></label>
                                                <select class="form-control" name="ischeme">
                                                    <option value="" disabled selected style="display: none;">Scheme</option>
                                                    <option value="" onselect="">None</option>
                                                    <option value="NHIS" name="ischeme">NHIS</option>
                                                    <option value="SSNIT" name="ischeme">SSNIT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Insurance No</label>
                                                <input name="i_no" type="text" class="form-control" placeholder="Insurance ID" value="<?php echo $_SESSION['edit']['Insurance_ID_number'];?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </form>
                </div>
                </div>
            </div>
        </div>


<?php include '../../include/footer.php';?>      
