<?php
include "init.php";

$table="";
$id_column = "";
$module_list = "";
$username = $_SESSION['username'];
$access_level = $_SESSION['access_level'];
$award_name = "";

if($access_level == "student"){
    $table = "student";
    $id_column = "student_id";
}else{
    $table = "staff";
    $id_column = "staff_id";
}

$sql = "SELECT * FROM $table WHERE $id_column=(SELECT $id_column FROM user WHERE username='$username')";
//$sql = "SELECT ";

$results = $conn->query($sql);
if($results->num_rows > 0){
    $user_result = $results->fetch_assoc();
//    print_r($user_result);
    if($access_level == "student"){
        $sql = "SELECT award_name FROM award WHERE award_id = '".$user_result['award_id']."'";
        $results = $conn->query($sql);
        $results = ($results->fetch_assoc());
        $award_name = $results['award_name'];
    }else if($access_level == "lec"){
        $award_name = "Senior Lecturer";
    }
//    echo $award_name;
    if($access_level == "student"){
        $sql =
            "SELECT module.module_name, module_has_students.module_id 
            FROM module 
            INNER JOIN module_has_students 
            ON module.module_id = module_has_students.module_id
            WHERE module_has_students.student_id = '".$user_result["student_id"]."'";
        $results = $conn->query($sql);
        $i=0;
        if($results->num_rows > 0){
            while($row = $results->fetch_assoc()){
                $module_list[$i]["module_id"] = $row["module_id"];
                $module_list[$i]["module_name"] = $row["module_name"];
                $i++;
            }
        }else{
            print_r($results);
        }

    }else if($access_level == "lec"){
        $sql =
            "SELECT module.module_name, module_has_lecturer.module_id 
            FROM module 
            INNER JOIN module_has_lecturer
            ON module.module_id = module_has_lecturer.module_id
            WHERE module_has_lecturer.staff_id = '".$user_result["staff_id"]."'";
        $results = $conn->query($sql);
        $i=0;
        if($results->num_rows > 0){
            while($row = $results->fetch_assoc()){
                $module_list[$i]["module_id"] = $row["module_id"];
                $module_list[$i]["module_name"] = $row["module_name"];
                $i++;
            }
//            print_r($module_list);
//            foreach ($module_list as $module){
//                echo $module["module_name"]."<br>";
//            }
        }else{
            print_r($results);
        }
    }
}else{
    echo "error";
}

//print_r($module_list);
?>