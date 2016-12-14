<?php include'../../include/functions.php';?>
<?php session_start(); check_session();?>
<?php include'../../include/db_conn.php';?>
<?php include'../../include/header.php';?>
<?php include'../../include/search_modal.php';?>

<div class="wrapper">
    <div class="sidebar" data-color="black" data-image="../../assets/img/sidebar-4.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

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
                <li>
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
                <li class="active">
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
                    <a class="navbar-brand" href="#"><i class=""></i> Billing</a>
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
                    
                </div>
            </div>
        </div>


<?php include '../../include/footer.php';?>      
