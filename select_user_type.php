<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select User Type</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body id="body" onresize="myFunction()">

<div class="wrapper" id="wrapper">

    <div class="header">

        <div class="logo">
            <div class="logo-text">
                <a href="http://localhost/main/home.php" style="color: white; text-decoration: none;"><strong>PLYMOUTH</strong></a>
            </div>
            <div class="logo-text">
                <a href="http://localhost/main/home.php" style="color: white; text-decoration: none;"><strong>UNIVERSITY</strong></a>
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
                }else if(isset($_SESSION['access_level']) && $_SESSION['access_level'] == "root" ){
                    foreach ($sidebar_array_root as $sidebar_item) {
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
                    Select User Type
                </strong>
                <div class="year">

                </div>
            </div>
            <div class="box-content">
                <div class="main-title">
                    Add Material
                </div>
                <div class="box-data-content">
                    <div>
                        <form method="GET" action="select_user_type.php" style="border: none; margin-top: 25px;">

                            <div class="form-group">
                                <div>
                                    <label class="textfield-label" style='width: auto; margin-right: 25px; display: inline-block'>User Type</label>
                                    <select class='medium-size form-text-field' name='user_type' style='width: 50%; margin-right: 25px; display: inline-block;' required>
                                        <?php
                                        if(isset($_GET['user_type'])){
                                            switch ($_GET['user_type']){
                                                case 'student': echo "<option>student</option><option>lec</option><option>root</option>";break;
                                                case 'lec': echo "<option>lec</option><option>student</option><option>root</option>";break;
                                                case 'root': echo "<option>root</option><option>student</option><option>lec</option>";break;
                                            }
                                        }else{
                                            echo "<option>student</option><option>lec</option><option>root</option>";
                                        }

                                        ?>
                                    </select>
                                    <input type='submit' value='Show ID' class='login-submit' style='width: 34%;'>
                                </div>
                            </div>

                        </form>
                        <form action="add_user.php" method="POST" style="border: none; margin-top: 25px;">
                            <?php
    
                            if (isset($_GET['user_type'])){
                                include "php/init.php";
                                include "php/load_students.php";
                                $type = $_GET['user_type'];
                                load_id($type, $conn);
                                echo "<input type='hidden' value='$type' name='type'>";
                            }
    
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="script.js"></script> -->
</body>
</html>