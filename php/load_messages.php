<?php

function load_all_messages($conn, $club_id, $student_id){
//    $sql = "SELECT * FROM message_has_member WHERE student_id = '$student_id' AND club_id = $club_id";
    $sql = "SELECT message.message_id, message.message_title, message_has_member.status FROM
                    message INNER JOIN message_has_member ON
                    message.message_id = message_has_member.message_id
                    WHERE message_has_member.student_id = '$student_id' AND
                    message_has_member.club_id = $club_id ORDER BY message_has_member.status DESC";
    $results = $conn->query($sql);
    echo "<table>";
    echo "<tr><td>Message ID</td><td>Message Title</td></tr>";
    if($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
            $message_id = $row['message_id'];
            $message_title = $row['message_title'];
            if($row['status'] == 'Unread'){
                echo "<tr style='background-color: lightgreen'><td>$message_id</td><td><a href='view_message.php?club_id=$club_id&message_id=$message_id'>$message_title</a></td></tr>";
            }else{
                echo "<tr><td>$message_id</td><td><a href='view_message.php?club_id=$club_id&message_id=$message_id'>$message_title</a></td></tr>";
            }
        }

    }else{
        echo "<tr><td colspan='2' style='text-align: center'>No messages</td></tr>";
    }
    echo "</table>";
}

function get_title($conn, $message_id){
    $sql = "SELECT message_title FROM message WHERE message_id = $message_id";
    $results = $conn->query($sql);
    $results = $results->fetch_assoc();
    $sql = "UPDATE message_has_member SET status = 'Read' WHERE message_id = $message_id AND student_id = '".$_SESSION['id']."'";
    $flag = $conn->query($sql);
    if(!$flag) die("Could not update: <br>".$conn->error);
    return $results['message_title'];
}

function get_message_body($message_id, $conn){
    $sql = "SELECT message_body FROM message WHERE message_id = $message_id";
    $results = $conn->query($sql);
    $results = $results->fetch_assoc();
    echo "<div class='message-body'><p style='text-align: left;'>".$results['message_body']."</p></div>";
}

?>