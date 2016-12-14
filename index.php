<?php include'../../include/header.php';?>

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="../../assets/img/sidebar-5.jpg">

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
                <li class="active">
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
                    <a href="nurse">
                        <i class="pe-7s-bandaid"></i>
                        <p>Nurse Module</p>
                    </a>
                </li>
                <li>
                    <a href="reports">
                        <i class="pe-7s-albums"></i>
                        <p>Report Generation</p>
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
                    <a class="navbar-brand" href="#"><i class=""></i> Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <?php //<span class="notification"></span>?>
                              </a>
                              <ul class="dropdown-menu">
                               <?php ?>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo @$_SESSION['username'];?>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="user_profile">User Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Logout</a></li>
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
