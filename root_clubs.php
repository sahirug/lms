<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs</title>
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
                <strong>Add New Club</strong>
            </div>
            <div class="box-content">
                <div class="main-title">

                </div>
                <div class="box-data-content">
                    <div>
                        <form method="POST" action="php/crud_club.php" style="border: none; margin-top: 25px;" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="clubname" class="textfield-label">Club Name</label>
                                <input type="text" class="medium-size form-text-field" name="clubname" id="clubname"
                                       placeholder="Club Name" required/>
                            </div>

                            <div class="form-group">
                                <label class="textfield-label">President</label>
                                <select class="medium-size form-text-field" name="president">
                                    <?php
                                    include "php/init.php";
                                    include "php/load_students.php";
                                    load_students($conn);
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="textfield-label">Category</label>
                                <select class="medium-size form-text-field" name="category">
                                    <option>Sports</option>
                                    <option>Entertainment</option>
                                    <option>Community Service</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="login-submit" value="Add">
                            </div>

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