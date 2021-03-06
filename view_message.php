<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        include "php/init.php";
        include "php/load_messages.php";

        echo get_title($conn, $_GET['message_id']);

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
//                    include "php/init.php";
//                    include "php/load_messages.php";

                    echo get_title($conn, $_GET['message_id']);

                    ?>
                </strong>
            </div>
            <div class="box-content">
                <div class="main-title">
                </div>
                <div class="box-data">
                    <?php
                    get_message_body($_GET['message_id'], $conn);


                    ?>
                    <div style="text-align: left">
                        <a href="<?php echo "messages.php?club_id=".$_GET['club_id']?>" style="text-align: left"><i class="fa fa-backward" style="padding: 5px;"></i>Return to all messages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>