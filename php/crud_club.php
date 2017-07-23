<?php
include "init.php";

$clubname = $_POST['clubname'];
$president = $_POST['president'];
$category = $_POST['category'];

$sql = "INSERT INTO club(club_name, president, category) VALUES('$clubname', '$president', '$category')";
$flag = $conn->query($sql);
if(!$flag) die("Error: <br>".$conn->error);
$sql = "SELECT club_id FROM club ORDER BY club_id DESC LIMIT 1";
$results = $conn->query($sql);
$results = $results->fetch_assoc();
$club_id = $results['club_id'];
$sql = "INSERT INTO club_has_members(club_id, student_id, role) VALUES ('$club_id','$president','President')";
$flag = $conn->query($sql);
if(!$flag) die("Error - club_has_members: <br>".$conn->error);
echo "<script>alert('Club $clubname has been added!'); window.location.replace('http://localhost/lms/root_clubs.php');</script>";

?>