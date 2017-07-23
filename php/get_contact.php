<?php

function get_contact($conn, $col_name){
    $id = $_SESSION['id'];
    $sql = "";
    if($_SESSION['access_level'] == 'student'){
        $sql = "SELECT $col_name FROM student WHERE student_id = '$id'";
    }else{
        $sql = "SELECT $col_name FROM staff WHERE staff_id = '$id'";
    }
    $results = $conn->query($sql);
    if($results->num_rows === 0) return 'error';
    $results = $results->fetch_assoc();
    switch ($col_name){
        case 'email': return $results['email']; break;
        case 'telephone' : return $results['telephone']; break;
        default: return 1;
    }
}

?>