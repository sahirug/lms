<?php
include "init.php";
session_start();

$id = $_SESSION['id'];
$access_level = $_SESSION['access_level'];
$sql = "";

if($access_level == 'student'){
    $sql = "UPDATE student SET telephone = '".$_POST['tel_no']."', email = '".$_POST['email']."' WHERE student_id = '$id';";
}else{
    $sql = "UPDATE staff SET telephone = '".$_POST['tel_no']."', email = '".$_POST['email']."' WHERE staff_id = '$id';";
}

$flag = $conn->query($sql);
if(!$flag) die("An error occurred: <br>".$conn->error);
header("Location: ../home.php");

?>