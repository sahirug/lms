<?php
include "init.php";

function module_name($module_id, $conn){
    $sql = "SELECT * FROM module WHERE module_id='$module_id'";
    $results = $conn->query($sql);
    $results = ($results->fetch_assoc());
    return $results['module_name'];
}

//echo module_name($_GET['module_id'], $conn);

?>
