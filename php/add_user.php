<?php
include "init.php";

$username = $_POST['username'];
$password = $_POST['password'];
$id = $_POST['id'];
$type = $_POST['type'];
$sql = "";

if($type == "student"){
    $sql = "INSERT INTO user(student_id, staff_id, username, password, access_level) VALUES('$id',NULL,'$username','$password','$type')";
}else{
    $sql = "INSERT INTO user(student_id, staff_id, username, password, access_level) VALUES(NULL,'$id','$username','$password','$type')";
}

$flag = $conn->query($sql);
if (!$flag) die("Error: <br>$id<br>$sql<br>".$conn->error);

if($type == 'student'){
    $sql = "SELECT batch, faculty FROM student WHERE student_id = '$id'";
    $results = $conn->query($sql);
    $results = $results->fetch_assoc();
    $batch = $results['batch'];
    $faculty = $results['faculty'];
    switch($faculty){
        case 'F01': $sql = "SELECT module_id FROM batch_module_lecturer WHERE batch_id = '$batch' AND module_id LIKE 'B%'"; break;
        case 'F02': $sql = "SELECT module_id FROM batch_module_lecturer WHERE batch_id = '$batch' AND module_id LIKE 'C%'"; break;
    }

    $results = $conn->query($sql);
    while($row = $results->fetch_assoc()){
        $module_id = $row['module_id'];
        $sql = "INSERT INTO module_has_students(module_id, student_id) VALUES('$module_id', '$id')";
        $flag = $conn->query($sql);
        if(!$flag) die("Error: <br>$module_id<br>$id<br>".$conn->error);
    }
    echo "<script>alert('User $username has been saved!');window.location.replace('http://localhost/lms/select_user_type.php');</script>";
}else if($type = 'lec'){
    echo "<script>alert('User $username has been saved!');window.location.replace('http://localhost/lms/batch_select.php?id=$id');</script>";
}else{
    echo "<script>alert('User $username has been saved!');window.location.replace('http://localhost/lms/select_user_type.php');</script>";

}

?>