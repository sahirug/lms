<?php

function load_students($conn){
    $sql = "SELECT student_id FROM student ORDER BY student_id ASC";
    $results = $conn->query($sql);
    while($row = $results->fetch_assoc()){
        echo "<option>".$row['student_id']."</option>";
    }
}

?>