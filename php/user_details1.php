<?php
include "module_details.php";

function get_award_name($conn){
    $id = $_SESSION['id'];
    $access_level = $_SESSION['access_level'];
    if($access_level == 'student'){
        $sql = "SELECT award.award_name FROM award 
              INNER JOIN student 
              ON award.award_id = student.award_id 
              WHERE student.student_id = '$id';";
    }else{
        return 'Senior Lecturer';
    }
    $results = $conn->query($sql);
    $results = $results->fetch_assoc();
    return $results['award_name'];
}

function get_year($conn){
    $id = $_SESSION['id'];
    $access_level = $_SESSION['access_level'];
    if($access_level == 'student'){
        $sql = "SELECT year FROM student WHERE student_id = '$id'";
    }else{
        return 'Senior Lecturer';
    }
    $results = $conn->query($sql);
    $results = $results->fetch_assoc();
    return $results['year'];
}

function load_table($conn){
    $username = $_SESSION['username'];
    $access_level = $_SESSION['access_level'];
    if($access_level == "student"){
        $table = "student";
        $id_column = "student_id";
    }else{
        $table = "staff";
        $id_column = "staff_id";
    }
    $sql = "SELECT * FROM $table WHERE $id_column=(SELECT $id_column FROM user WHERE username='$username')";
}

function draw_table($conn){
    $access_level = $_SESSION['access_level'];
    $id = $_SESSION['id'];
    $sql = "";
    if($access_level == 'student'){
        $sql = "SELECT batch FROM student WHERE student_id = '$id'";
        $results = $conn->query($sql);
        $results = $results->fetch_assoc();
        $sql =
            "SELECT module.module_name, module_has_students.module_id, batch_module_lecturer.staff_id 
            FROM module 
            INNER JOIN module_has_students 
            ON module.module_id = module_has_students.module_id
            INNER JOIN batch_module_lecturer
            ON module.module_id = batch_module_lecturer.module_id
            WHERE module_has_students.student_id = '$id' AND batch_module_lecturer.batch_id = '".$results['batch']."';";
    }else{
        $sql =
            "SELECT module.module_name, module_has_lecturer.module_id 
            FROM module 
            INNER JOIN module_has_lecturer
            ON module.module_id = module_has_lecturer.module_id
            WHERE module_has_lecturer.staff_id = '$id'";
    }
    $results = $conn->query($sql);
    if($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
            if($access_level == 'student'){
                $module_id = $row['module_id'];
                $module_name = $row['module_name'];
                $staff_id = $row['staff_id'];
                $staff_name = get_lecturer_name($conn, $staff_id);
                echo "<tr><td>$module_id</td><td><a href='module.php?module_id=$module_id'>$module_name</a></td><td>$staff_name</td></tr>";
            }else{
                $module_id = $row['module_id'];
                $module_name = $row['module_name'];
                echo "<tr><td>$module_id</td><td><a href='module.php?module_id=$module_id'>$module_name</a></td></tr>";
            }
        }
    }else{

    }
}

?>