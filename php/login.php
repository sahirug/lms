<?php
    include 'init.php';
    if(isset($_POST['username']) && isset($_POST['password']) ) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

        $results = $conn->query($sql);

        if($results->num_rows > 0){
            $result = $results->fetch_assoc();
    //			echo "<strong>Username ".$result['username']." and the password is ".$result['password']."</strong>";
            $username = $result['username'];
            $password = $result['password'];
            session_start();
            $_SESSION['username'] = $username;
            header("Location: home.php");
        }else{
            echo "<div class='error-message'>No such user</div>";
        }
    }else{
        echo "<strong>Nothing set yet</strong>";
    }
?>