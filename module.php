<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        include "php/init.php";
        include "php/module_details.php";
        echo module_name($_GET['module_id'], $conn);
        //                        if ($_SESSION['access_level'] == "student"){
        //                            echo $award_name;
        //                        }

        ?>
    </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body id="body" onresize="myFunction()">

<div class="wrapper" id="wrapper">

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
<!--                <div class="sidebar-profile">-->
<!--                    
//                    include "php/user_details.php";
//
//                    if($access_level == "student"){
//                        echo "<div class='sidebar-profile-item'>".$user_result['student_name']."</div>";
//                        echo
//                            "<div class='sidebar-profile-item'>".$user_result['batch']."</div>";
//                        echo "<div class='sidebar-profile-item sidebar-profile-last-item'>Logout<i class='fa fa-sign-out' style='float: right'></i></div>";
//                    }else if($access_level == "lec"){
//                        echo "<div class='sidebar-profile-item'>".$user_result['staff_name']."</div>";
////                        echo
////                            "<div class='sidebar-profile-item'>".$user_result['batch']."</div>";
//                    }
//
//                    ?>
<!--                </div>-->
                <?php
                include "php/sidebar_arrays.php";
                if(isset($_SESSION['access_level']) && $_SESSION['access_level'] == "student" ){
                    foreach ($sidebar_array_students as $sidebar_item) {
                        echo "<li class='sidebar-item'>";
                        echo "<a href='$sidebar_item[2]' class='link'>";
                        echo "<i class='$sidebar_item[1]'></i><span style='padding: 10px'>$sidebar_item[0]</span>";
                        echo "</a>";
                        echo "</li>";
                    }
                }else if(isset($_SESSION['access_level']) && $_SESSION['access_level'] == "lec" ){
                    foreach ($sidebar_array_lecturers as $sidebar_item) {
                        echo "<li class='sidebar-item'>";
                        echo "<a href='$sidebar_item[2]' class='link'>";
                        echo "<i class='$sidebar_item[1]'></i><span style='padding: 10px'>$sidebar_item[0]</span>";
                        echo "</a>";
                        echo "</li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>

        <div class="main" id="content">
            <div class="box" id="box-one">
                <div class="box-header">
                    <strong>
                        <?php
//                        include "php/init.php";
//                        include "php/module_details.php";
                        echo module_name($_GET['module_id'], $conn);
//                        if ($_SESSION['access_level'] == "student"){
//                            echo $award_name;
//                        }

                        ?>
                    </strong>
                    <div class="year">
                        <?php
                        include "php/user_details.php";
                        if($access_level == "student"){
                            echo "<small>Year ".$user_result['year']."</small>";
                        }else{
                        }


                        ?>
                    </div>
                </div>
                <div class="box-content">
                    <div class="main-title">
                        My Modules
                    </div>
                    <div class="box-data">
                            <?php
                            include "php/init.php";
                            include "php/fetch_notes.php";

                            load_material($_SESSION['id'], $_GET['module_id'], $conn);
                            
                            ?>

                    </div>
                </div>
            </div>
        </div>
</div>
<!-- <script type="text/javascript" src="script.js"></script> -->

</body>
</html>