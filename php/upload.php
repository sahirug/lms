<?php
session_start();
include "init.php";

$filenumber = $_POST['filenumber'];
$filename = $_POST['filename'];
$filetype = $_POST['filetype'];
$module_id =  $_POST['module_id'];
$staff_id = $_SESSION['id'];
$ext = $_FILES['myfile']['type'];
switch ($ext){
    case 'application/vnd.ms-excel': $ext = "xls"; break;
    case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document': $ext = "docx"; break;
    case 'application/pdf': $ext = "pdf"; break;
    case 'application/vnd.openxmlformats-officedocument.presentationml.presentation': $ext = "pptx"; break;
}
$location = "../files/".$module_id."_".$staff_id."_".$filename.".".$ext;
$location1 = "files/".$module_id."_".$staff_id."_".$filename.".".$ext;
//echo $location;

$sql = "INSERT INTO lecture_notes(module_id, staff_id, lesson_number, lesson_name, note_type, location) 
                        VALUES ('$module_id','$staff_id','$filenumber','$filename','$filetype', '$location1')";

$conn->query($sql);

if(move_uploaded_file($_FILES['myfile']['tmp_name'], $location)){
    echo "<script>alert('material uploaded!'); window.location.replace('http://localhost/lms/home.php');</script>";
}
else echo "<br>error"

?>