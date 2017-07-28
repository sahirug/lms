<?php
session_start();
if(isset($_SESSION['username'])){
    if($_SESSION['access_level'] == 'root'){
        header("Location: root_clubs.php");
    }else{
        header("Location: home.php");
    }
}else{
    header("Location: login.php");
}

?>