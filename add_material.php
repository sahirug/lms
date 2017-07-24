<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lecture Notes</title>
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
                        include "php/init.php";
                        include "php/module_details.php";
                        echo "Add Lecture Material for - ".module_name($_GET['module_id'], $conn);
//                        if ($_SESSION['access_level'] == "student"){
//                            echo $award_name;
//                        }

                        ?>
                    </strong>
                    <div class="year">
                        <?php
                        if($access_level == "student"){
                            echo "<small>Year ".$user_result['year']."</small>";
                        }else{
                        }


                        ?>
                    </div>
                </div>
                <div class="box-content">
                    <div class="main-title">
                        Add Material
                    </div>
                    <div class="box-data-content">
                        <div>
                            <form method="POST" action="php/upload.php" style="border: none; margin-top: 25px;" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="filenumber" class="textfield-label">Topic Number</label>
                                    <input type="text" class="small form-text-field" name="filenumber" id="filenumber"
                                           placeholder="Lesson or Chapter Number" required/>
                                </div>

                                <div>
                                    <label for="filename" class="textfield-label">Topic Name</label>
                                    <input type="text" class="medium-size form-text-field topic-name" name="filename" id="filename"
                                            placeholder="Lesson or Chapter Name" required/>
                                </div>

                                <div class="form-group">
                                    <label for="filetype" class="textfield-label">Type</label>
                                    <select class="medium-size form-text-field" name="filetype">
                                        <option>Tute</option>
                                        <option>Presentation</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="fileselect" class="textfield-label">Type</label>
                                    <input type="file" id="fileselect" class="medium-size form-text-field" name="myfile"
                                           accept=".pdf, .docx, .xls, .pptx" required>
                                </div>

                                <input type="hidden" name="module_id" value="<?php echo $_GET['module_id']?>">

                                <div class="form-group">
                                    <input type="submit" class="login-submit" value="Upload">
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