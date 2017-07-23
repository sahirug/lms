<?php
//session_start();
include "init.php";
if(isset($_POST['function'])){
    if($_POST['function'] == 'add') add_member($_POST['student_id'], $_POST['club_id'], $conn);
    if($_POST['function'] == 'remove') remove_member($_POST['student_id'], $_POST['club_id'], $conn);
    if($_POST['function'] == 'send') send_message($_POST['club_id'], $_POST['message_title'], $_POST['message_body'], $conn);
}

function get_club_name($conn, $club_id){
    $sql = "SELECT club_name FROM club WHERE club_id = $club_id";
    $results = $conn->query($sql);
    $results = $results->fetch_assoc();
    return $results['club_name'];
}

function select_function($function, $club_id, $conn){
    switch ($function){
        case 'send': send_message_page(); break;
        case 'add': add_member_page($club_id, $conn); break;
        case 'remove': remove_member_page($club_id, $conn); break;
    }
}

function send_message_page(){
    echo "<div><label for='message_title' class='textfield-label' style='width: auto; margin-right: 25px; display: inline-block'>Message Title</label></div>";
    echo "<input type='text' maxlength='100' name='message_title' id='message_title' class='form-text-field' style='width: 90%' required>";

    echo "<div style='margin-top: 10px;'><label for='message_body' class='textfield-label' style='width: auto; margin-right: 25px; display: inline-block'>Message</label></div>";
    echo "<textarea class='form-text-field' maxlength='500' style='font-family: Neuzeit; width: 90%; margin-top: 5px;' rows='5' name='message_body' id='message_body' required></textarea>";

    echo "<input type='submit' class='login-submit' value='Send' style='background-color: #3C8DBC; width: 92%;'>";
}

function send_message($club_id, $message_title, $message_body, $conn){
    session_start();
    $sql = "INSERT INTO message(club_id, message_title, message_body) VALUES ('$club_id','$message_title','$message_body');";
    $flag = $conn->query($sql);
    if(!$flag) die($conn->error);
    $sql = "SELECT message_id FROM message ORDER BY message_id DESC LIMIT 1";
    $results = $conn->query($sql);
    $results = $results->fetch_assoc();
    $message_id = $results['message_id'];
    echo $message_id."<br>";
    $sql = "SELECT student_id FROM club_has_members WHERE club_id = '$club_id'";
    $results = $conn->query($sql);
    while($row = $results->fetch_assoc()){
        $student_id = $row['student_id'];
        if($student_id !== $_SESSION['id']){
            echo $student_id;
            $sql = "INSERT INTO message_has_member(message_id, student_id, club_id, status) VALUES('$message_id', '$student_id', '$club_id', 'Unread')";
            $flag = $conn->query($sql);
            if(!$flag){
                die("Error: ".$conn->error."<br> student id: $student_id");
            }
        }
    }
    header("Location: ../clubs.php");
}

function add_member_page($club_id, $conn){
    $sql = "select DISTINCT student.student_id FROM student 
              INNER JOIN club_has_members ON student.student_id = club_has_members.student_id 
              WHERE student.student_id NOT IN
                    (SELECT student_id FROM club_has_members WHERE club_id = $club_id) ORDER BY student.student_id";
    $results = $conn->query($sql);
    echo "<div><label for='student_id' class='textfield-label' style='width: auto; margin-right: 25px; display: inline-block'>Student ID</label></div>";
    echo "<select class='medium-size form-text-field' name='student_id' id='student_id' style='width: 50%; margin-right: 25px; display: inline-block;' required>";
    while($row = $results->fetch_assoc()){
        echo "<option>".$row['student_id']."</option>";
    }
    echo "</select>";
    echo "<input type='submit' value='Add' class='login-submit' style='width: 34%;'>";
}

function add_member($student_id, $club_id, $conn){
    $sql = "INSERT INTO club_has_members(club_id, student_id, role) VALUES('$club_id','$student_id', 'Member');";
    $flag = $conn->query($sql);
    if($flag){
        echo "<script>alert('member added!'); window.location.replace('http://localhost/lms/clubs.php');</script>";
    }else{
        echo "<script>alert('Error: $conn->error');";
    }

}

function remove_member_page($club_id, $conn){
    $sql = "SELECT DISTINCT student.student_id FROM student 
                INNER JOIN club_has_members on student.student_id = club_has_members.student_id 
                WHERE student.student_id IN 
                    (select student_id from club_has_members where club_id = $club_id) ORDER BY `student`.`student_id` ASC";
    $results = $conn->query($sql);
    echo "<div><label for='student_id' class='textfield-label' style='width: auto; margin-right: 25px; display: inline-block'>Student ID</label></div>";
    echo "<select class='medium-size form-text-field' name='student_id' id='student_id' style='width: 50%; margin-right: 25px; display: inline-block;' required>";
    while($row = $results->fetch_assoc()){
        if($row['student_id'] !== $_SESSION['id']) echo "<option>".$row['student_id']."</option>";
    }
    echo "</select>";
    echo "<input type='submit' value='Remove' class='login-submit' style='width: 34%; background-color: red;'>";
}

function remove_member($student_id, $club_id, $conn){
    $sql = "DELETE FROM club_has_members WHERE student_id = '$student_id' AND club_id = '$club_id'; ";
    $flag = $conn->query($sql);
    if($flag){
        echo "<script>alert('member $student_id removed!'); window.location.replace('http://localhost/lms/clubs.php');</script>";
    }else{
        echo "<script>alert('Error: $conn->error');";
    }
}

?>