<!DOCTYPE html>
<html>
<head>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>
        function showError(incorrectValue) {
            switch (incorrectValue){
                case 'username':
                    document.getElementById("username").style.borderBottom = "1px solid red";
                    document.getElementById("err-user").style.display = "block";
                    break;
                case 'password':
                    document.getElementById("password").style.borderBottom = "1px solid red";
                    document.getElementById("err-pass").style.display = "block";
            }
        }

        function showAlert(name){
            alert(name);
        }
    </script>
    <title>Login</title>
</head>
<body>

<div class="card">
    <form action="login.php" method="post">
        <div class="imgcontainer">
            <img src="images/ply_logo.jpg" alt="logo" class="ply-logo">
        </div>

        <div class="container">

            <input type="text" placeholder="Enter Username" name="username" id="username" class="login-user" required value="<?php echo isset($_POST['username'])? $_POST['username']:''; ?>">
            <div class="error-messages" id="err-user"><span>Invalid username</span></div>

            <input type="password" placeholder="Enter Password" name="password" id="password" class="login-pass" required>
            <div class="error-messages" id="err-pass"><span>Invalid Password</span></div>

            <input type="submit" value="Login" class="login-submit"/>

            <input type="checkbox" checked="checked"> <span style="font-size: 14px">Remember me</span>

            <a href="#" style="float: right; font-size: 12px;">Forgot your password?</a>
        </div>

        <!--<div class="container" style="background-color:#f1f1f1">-->
        <!--<button type="button" class="cancelbtn">Cancel</button>-->
        <!--<span class="psw">Forgot <a href="#">password?</a></span>-->
        <!--</div>-->
    </form>

    <?php

    include 'php/init.php';
    if(isset($_POST['username']) && isset($_POST['password']) ) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE username='$username'";

        $results = $conn->query($sql);

        if($results->num_rows > 0){
            $sql = "SELECT * FROM user WHERE password='$password' AND username='$username'";
            $results = $conn->query($sql);
            if($results->num_rows > 0){
                $result = $results->fetch_assoc();
                $username = $result['username'];
                $password = $result['password'];
                $access_level = $result['access_level'];
                $id = "";
                if($access_level == "student"){
                    $id = $result['student_id'];
                }else{
                    $id = $result['staff_id'];
                }
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['access_level'] = $access_level;
                $_SESSION['id'] = $id;
                if($access_level == 'root'){
                    header("Location: dash.php");
                }else{
                    header("Location: home.php");
                }
            }else{
                echo "<script>showError('password');</script>";
            }

        }else{
            echo "<script>showError('username');</script>";
        }
    }else{
//        echo "<strong>Nothing set yet</strong>";
    }

    ?>

</div>

<!--<footer style="position:fixed; bottom:0; left:0; width: 100%; text-align: center; color: white; background-color: darkgrey; height: 25px;">PULMS 2017</footer>-->
</body>
</html>
