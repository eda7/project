<?php include'../../include/functions.php';?>
<?php session_start(); check_session();?>
<?php include'../../include/db_conn.php';?>
<?php include'../../include/header.php';?>
<?php include'../../include/search_modal.php';?>
<?php include'../../include/header.php';?>
<?php include'../../include/search_modal.php';?>
<?php 
    $patient_type=$_GET['type'];
    $view=$_GET['view'];
    $id=$_GET['id'];

    $_SESSION['view']=view_patient($patient_type,$view,$id,$conn);
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
                            <a href="#plistmodal" data-toggle="modal">Patient List </a>&#8226;
                            <a href="#outpatient" data-toggle="modal"> Outpatient Department(OPD) </a>&#8226;
                            <a href="#inpatient" data-toggle="modal"> In-Patient Department(IPD) </a>
                            <div class="pull-right">
                            <a class="btn btn-default btn-fill btn-sm" href="patient_mg.php"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
                            <a class="btn btn-default btn-fill btn-sm" href="edit_patient.php?id=<?php echo $_SESSION['view']['P_ID']?>&edit=true"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <a class="btn btn-default btn-fill btn-sm" href="patient_mg.php"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                            </div>
                            <hr>
                    </div>
                    <div class="row">      
                        <div class="col-md-9">
                            <div  class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="active"><a href="#personal_info" data-toggle="tab">Personal Information</a></li>
                                    <li role="presentation"><a href="#contact_info" data-toggle="tab">Contact Information</a></li>
                                    <li role="presentation"><a href="#other_info" data-toggle="tab">Other Information</a></li>
                                    <li role="presentation"><a href="#attachment" data-toggle="tab">Attachment</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane mp active" id="personal_info">
                                        <br><br>
                                        <p><small>Patient ID:</small> <?php echo $_SESSION['view']['P_ID'];?></p>
                                        <p><small>Patient Name:</small> <?php echo $_SESSION['view']['First_name'].' '.$_SESSION['view']['Middle_name'].' '.$_SESSION['view']['Last_name'];?></p>
                                        <p><small>Gender:</small> <?php echo $_SESSION['view']['Gender'];?></p>
                                        <p><small>Date of Birth:</small> <?php echo $_SESSION['view']['DOB'];?></p>
                                        <p><small>Age:</small> <?php echo $age=date('Y-m-d')-$_SESSION['view']['DOB'];?></p>
                                        <p><small>Place of Birth:</small> <?php echo $_SESSION['view']['Place_of_birth'];?></p>
                                        <p><small>Civil Status:</small> <?php echo $_SESSION['view']['Marital_status'];?></p>
                                        <p><small>Religion:</small> <?php echo $_SESSION['view']['Religion'];?></p>
                                        <p><small>Blood Group:</small> <?php echo $_SESSION['view']['Blood_group'];?></p>
                                    </div>
                                    <div class="tab-pane mp" id="contact_info">
                                        <br><br>
                                        <p><small>House no:</small>  <?php echo $_SESSION['view']['House_number']; ?></p>
                                        <p><small>City/Town:</small>  <?php echo $_SESSION['view']['City']; ?></p>
                                        <p><small>Mobile No:</small>  <?php echo $_SESSION['view']['Phone_num1']; ?></p>
                                        <p><small>Home Phone:</small>  <?php echo $_SESSION['view']['Phone_num2']; ?></p>
                                        <p><small>Work no:</small>  <?php echo $_SESSION['view']['Phone_num3']; ?></p>
                                        <p><small>Address:</small>  <?php echo $_SESSION['view']['Address']; ?></p>
                                        <p><small>Email:</small>  <?php echo $_SESSION['view']['Email']; ?></p>
                                    </div>
                                    <div class="tab-pane mp" id="other_info">
                                        <br><br>
                                        <p><small>Insurance Type:</small>  <?php echo $_SESSION['view']['Insurance_Scheme']; ?></p>
                                        <p><small>Insurance no:</small>  <?php echo $_SESSION['view']['Insurance_ID_number']; ?><p>
                                    </div>
                                    <div class="tab-pane mp" id="attachment"></div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <img style="width: 180px; height: 180px; margin-top: 100px; margin-left: auto;" src="<?php patient_pic($_SESSION['view']['Gender']);?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include '../../include/footer.php';?>      
