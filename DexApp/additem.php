<?php 
require_once 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>DexApp - Add Item</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a class="js-arrow" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="additem.php">
                                <i class="fas fa-chart-bar"></i>Add Item</a>
                        </li>
                        <li>
                            <a href="tableslist.php">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="updatelist.php">
                                <i class="far fa-check-square"></i>Update List</a>
                        </li>
                        <li>
                            <a href="deletelist.php">
                                <i class="fas fa-calendar-alt"></i>Delete</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">                                                     
                        <li>
                            <a class="js-arrow" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="additem.php">
                                <i class="fas fa-chart-bar"></i>Add Item</a>
                        </li>
                        <li>
                            <a href="tableslist.php">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="updatelist.php">
                                <i class="far fa-check-square"></i>Update List</a>
                        </li>
                        <li>
                            <a href="deletelist.php">
                            <i class="fas fa-calendar-alt"></i>Delete</a>
                        </li>
                    </ul>
             
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                                        <div class="header-button">
                                            <div class="account-wrap">
                                            <div class="account-item clearfix js-item-menu">
                                                <div class="image">
                                                    <img src="images/icon/avatar-01.jpg" alt=" " />
                                                </div>
                                                <?php if(isset($_SESSION['username'])): ?>
                                                    <div class="content">
                                                        <a class="js-acc-btn" href="#">
                                                            <?php echo($_SESSION['username']); ?> 
                                                        </a>
                                                    </div>
                                                <?php endif ?>
                                                <div class="account-dropdown js-dropdown">
                                                    <div class="info clearfix">
                                                        <div class="image">
                                                            <a href="#">
                                                                <img src="images/icon/avatar-01.jpg" alt="" />
                                                            </a>
                                                        </div>
                                                        <?php if(isset($_SESSION['username'])): ?>
                                                            <div class="content">
                                                                <h5 class="name">
                                                                    
                                                                        <?php 
                                                                            echo($_SESSION['username']);
                                                
                                                                        ?> 
                                                                    
                                                                </h5>
                                                                <span class="email">
                                                                    <?php 
                                                                        echo($_SESSION['email']);
                                                                    ?> 
                                                                </span>
                                                            </div>
                                                        <?php endif ?>
                                                    </div>
                                                    <form action="additem.php" method="post">
                                                        <div class="account-dropdown__footer">
                                                            <button type="submit" class="btn btn-primary btn-sm" name="logout" >
                                                                <i class="zmdi zmdi-power"></i>Logout
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content"> 
                    <div class="IDAdder">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Add</strong> Student
                                </div>
                                <div class="card-body card-block">
                                    <form action="additem.php" method="post" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_idnumber" class=" form-control-label">ID Number</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf_idnumber" name="hf_idnumber" placeholder="Enter ID Number" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_fname" class=" form-control-label">First Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf_email" name="hf_fname" placeholder="Enter First Name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_lname" class=" form-control-label">Last Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf_lname" name="hf_lname" placeholder="Enter Last Name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_oname" class=" form-control-label">Other Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf_oname" name="hf_oname" placeholder="Enter Other Name" class="form-control">
                                            </div>
                                        </div>
                                       
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_email" class=" form-control-label">Email</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf_email" name="hf_email" placeholder="Enter Email" class="form-control">
                                            </div>
                                        </div>
                                                                                
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_prog" class=" form-control-label">Programme</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf_prog" name="hf_prog" placeholder="Enter Programme" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_level" class=" form-control-label">Level</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf_level" name="hf_level" placeholder="Enter Level" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_hall" class=" form-control-label">Hall of Residence</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf_hall" name="hf_hall" placeholder="Enter Hall of Residence" class="form-control">
                                            </div>
                                        </div>

                                        
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_paddress" class=" form-control-label">Personal Address</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf_paddress" name="hf_paddress" placeholder="Enter Address" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_tel" class=" form-control-label">Telephone</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="tel" id="hf_tel" name="hf_tel" placeholder="Enter Telephone Number" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_dob" class=" form-control-label">Date of Birth</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="date" id="hf_dob" name="hf_dob" placeholder="Enter Date of Birth" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_pname" class=" form-control-label">Parent/Guardian Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf_pname" name="hf_pname" placeholder="Enter Parent/Guardian Name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_ptel" class=" form-control-label">Parent/Guardian Tel. No.</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="tel" id="hf_ptel" name="hf_ptel" placeholder="Enter Parent/Guardian Tel. Number" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_ppaddress" class=" form-control-label">Parent/Guardian Address</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf_ppaddress" name="hf_ppaddress" placeholder="Enter Parent/Guardian Address" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf_pob" class=" form-control-label">Post Office Box Address</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf_pob" name="hf_pob" placeholder="Enter Post Office Box Addres" class="form-control">
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm" name="additem" >
                                                <i class="fa fa-dot-circle-o"></i> Add student
                                            </button>
                                        </div>
                                        <div class = "Success1">
                                            <div>
                                                <p>
                                                    <?php if(isset($_SESSION['success'])): ?> 
                                                        <?php echo($_SESSION['success']); ?> 
                                                    <?php endif ?> 
                                                </p>
                                            </div>
                                        </div>                                
                                    </form>
                                </div>
                                
                            </div>
                        </div>




                
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
