<?php

function load_material($id, $module_id, $conn){
    $access_level = $_SESSION['access_level'];
    echo "<table width='100%' border='0'>";

    if($access_level == "lec"){
        $sql = "SELECT * FROM lecture_notes WHERE module_id = '$module_id' AND staff_id = '$id'";
        $results = $conn->query($sql);
        echo "<tr style='border-bottom: 1px solid black;'><td>Lesson Number</td><td>Lesson Name</td><td>Material Type</td><td>Action</td></tr>";
        if($results -> num_rows > 0){
            while($row = $results->fetch_assoc()) {
                $lesson_number = $row['lesson_number'];
                $lesson_name = $row['lesson_name'];
                $type = $row['note_type'];
                $location = $row['location'];
                echo "<tr><td>$lesson_number</td><td><a href='$location'>$lesson_name</a></td><td>$type</td>";
                echo "<td>
                                                <a><i class='fa fa-trash' style='padding-right: 10px; color: red;'></i></a>
                                                <a><i class='fa fa-edit' style='color: blue'></i></a></td></tr>";
            }
            echo "<tr style='border-bottom: none'><td></td><td></td><td></td><td><a href='add_material.php?module_id=$module_id'><i class='fa fa-plus' style='color: green'></i></a></td></tr>";
        }else{
            echo "<tr><td colspan='5' style='text-align: center'>No material uploaded</td></tr>";
            echo "<tr style='border-bottom: none'><td></td><td></td><td></td><td><a href='add_material.php?module_id=$module_id'><i class='fa fa-plus' style='color: green'></i></a></td></tr>";
        }

    }else if($access_level == "student"){
        $sql = "SELECT batch FROM student WHERE student_id='$id'";
        $results = get_results_array($conn, $sql);
        $batch = $results['batch'];

        $sql = "SELECT staff_id FROM batch_module_lecturer WHERE module_id='$module_id' AND batch_id='$batch'";
        $results = get_results_array($conn, $sql);
        $staff_id = $results['staff_id'];

        $sql = "SELECT * FROM lecture_notes WHERE module_id='$module_id' AND staff_id='$staff_id'";
        $results = $conn->query($sql);
        echo "<tr style='border-bottom: 1px solid black;'><td>Lesson Number</td><td>Lesson Name</td><td>Material Type</td></tr>";
        if($results -> num_rows > 0){
            while($row = $results->fetch_assoc()) {
                $lesson_number = $row['lesson_number'];
                $lesson_name = $row['lesson_name'];
                $type = $row['note_type'];
                $location = $row['location'];
                echo "<tr><td>$lesson_number</td><td><a href='$location'>$lesson_name</a></td><td>$type</td>";
            }
        }else{
            echo "<tr><td colspan='5' style='text-align: center'>No material uploaded</td></tr>";
        }

    }
    echo "</table>";
}

function get_results_array($conn, $sql){
    $results = $conn->query($sql);
    $results = $results->fetch_assoc();
    return $results;
}

?>