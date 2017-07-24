<?php

function load_students($conn){
    $sql = "SELECT student_id FROM student ORDER BY student_id ASC";
    $results = $conn->query($sql);
    while($row = $results->fetch_assoc()){
        echo "<option>".$row['student_id']."</option>";
    }
}

function load_id($type, $conn){
    $sql = "";
    if($type == "student"){
        $sql = "SELECT student_id FROM student WHERE student_id NOT IN (SELECT student_id FROM user WHERE student_id IS NOT NULL)";
    }else{
        $sql = "SELECT staff_id FROM staff WHERE staff_id NOT IN (SELECT staff_id FROM user WHERE staff_id IS NOT NULL)";
    }
    $results = $conn->query($sql);
    if($results->num_rows == 0){
        if($type == "student"){
            echo "<div><label for='student_id' class='textfield-label' style='width: auto; margin-right: 25px; display: inline-block'>Student ID</label></div>";
        }else{
            echo "<div><label for='student_id' class='textfield-label' style='width: auto; margin-right: 25px; display: inline-block'>Staff ID</label></div>";
        }
        echo "<select class='medium-size form-text-field' name='id' style='width: 50%; margin-right: 25px; display: inline-block;' required>";
        echo "<option>No new user</option>";
        echo "</select>";
        echo "<input type='submit' value='Add' class='login-submit' style='width: 34%;' disabled>";
    }else{
        if($type == "student"){
            echo "<div><label for='student_id' class='textfield-label' style='width: auto; margin-right: 25px; display: inline-block'>Student ID</label></div>";
        }else{
            echo "<div><label for='student_id' class='textfield-label' style='width: auto; margin-right: 25px; display: inline-block'>Staff ID</label></div>";
        }
        echo "<select class='medium-size form-text-field' name='id' style='width: 50%; margin-right: 25px; display: inline-block;' required>";
        if($type == "student"){
            while($row = $results->fetch_assoc()){
                echo "<option>".$row['student_id']."</option>";
            }
        }else{
            while($row = $results->fetch_assoc()){
                echo "<option>".$row['staff_id']."</option>";
            }
        }
        echo "</select>";
        echo "<input type='submit' value='Add' class='login-submit' style='width: 34%;'>";
    }
}

function load_user_name($type, $id, $conn){
    $sql = "";
    switch($type){
        case 'student': $sql = "SELECT student_name, batch FROM student WHERE student_id = '$id'"; break;
        case 'lec': $sql = "SELECT staff_name FROM staff WHERE staff_id = '$id'"; break;
        case 'root': $sql = "SELECT staff_name FROM staff WHERE staff_id = '$id'"; break;
    }
    $results = $conn->query($sql);
    $results = $results->fetch_assoc();
    switch($type){
        case 'student': return $results['student_name']." - ".$results['batch']; break;
        case 'lec': return $results['staff_name']; break;
        case 'root': return $results['staff_name']; break;
    }
    return "user not found";
}

?>