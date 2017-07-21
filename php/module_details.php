<?php
include "init.php";

function module_name($module_id, $conn){
    $sql = "SELECT * FROM module WHERE module_id='$module_id'";
    $results = $conn->query($sql);
    $results = ($results->fetch_assoc());
    return $results['module_name'];
}

function get_lecturer_name($conn, $staff_id){
    $sql = "SELECT staff_name FROM staff WHERE staff_id = '$staff_id'";
    $results = $conn->query($sql);
    $results = $results->fetch_assoc();
    return $results['staff_name'];
}

?>
