<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body onresize="myFunction()" id="home">

<div class="wrapper">

    <div class="header">

        <div class="logo">
            <div class="logo-text">
                <strong>PLYMOUTH</strong>
            </div>
            <div class="logo-text">
                <strong>UNIVERSITY</strong>
            </div>
        </div>

        <div class="top">
            <div class="menu-icon-div">
                <a href="#" onclick="openNav()" class="menu-link"><img src="images/menu1.png" class="menu-icon"></a>
            </div>
            <span class="user-name">
                <?php echo isset($_SESSION['username'])?$_SESSION['username']:'no user'; ?>
            </span>



        </div>

    </div>





    <div class="left" id="mySideNav">
        <div class="sidebar-list">
            <ul>
                <li class="sidebar-item">
                    <a href="#" class="link">
                        <i class="fa fa-home"></i> <span style="padding: 10px;">Home</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="link">
                        <i class="fa fa-book"></i> <span style="padding: 10px;">My Courses</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="link">
                        <i class="fa fa-download"></i> <span style="padding: 10px;">New Assignments</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="link">
                        <i class="fa fa-upload"></i> <span style="padding: 10px;">Amend Personal Data</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main" id="content">
        <div class="box" id="box-one">
            <div class="box-header"><strong>BSc(Hons) Computer Security</strong></div>
            <div class="box-content">
                <div class="main-title">Enrolled Courses</div>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="script.js"></script> -->

</body>
</html>