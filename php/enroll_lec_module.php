<?php
include "init.php";

$id = $_POST['id'];
$batch = $_POST['batch'];
$sql = "SELECT faculty FROM staff WHERE staff_id = '$id'";
$results = $conn->query($sql);
$results = $results->fetch_assoc();
$faculty = $results['faculty'];
$sql = "SELECT module.module_id FROM module
            INNER JOIN batch_module_lecturer
            ON module.module_id = batch_module_lecturer.module_id
            WHERE module.faculty_id = '$faculty' AND batch_module_lecturer.batch_id = '$batch'";
$results = $conn->query($sql);
//print_r($results);
echo $id."<br>".$faculty."<br>".$batch."<br>";
while($row = $results->fetch_assoc()){
    $module_id = $row['module_id'];
    $sql = "INSERT INTO module_has_lecturer(module_id, staff_id) VALUES ('$module_id','$id')";
    $flag = $conn->query($sql);
    if(!$flag) die("$sql<br>".$conn->error);
    $sql = "INSERT INTO batch_module_lecturer(batch_id, module_id, staff_id) VALUES('$batch', '$module_id', '$id')";
    $flag = $conn->query($sql);
    if(!$flag) die("$sql<br>".$conn->error);
}
echo "all done";
header("Location: ../select_user_type.php");

?>