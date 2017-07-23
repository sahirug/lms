<?php
include "init.php";

function load_clubs($conn, $id){
    $sql = "SELECT club.club_name, club_has_members.role, club_has_members.club_id
                    FROM club INNER JOIN club_has_members 
                    ON club.club_id = club_has_members.club_id 
                    WHERE club_has_members.student_id = '$id' ORDER BY club_has_members.role DESC";
    $results = $conn->query($sql);
    $club_id = "";
    echo "<table><tr><td>Club Name</td><td>Role</td><td>Actions</td><td>Messages</td></tr>";
    if($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
            echo "<tr><td>".$row['club_name']."</td><td>".$row['role']."</td>";
            $club_id = $row['club_id'];
            if($row['role'] == 'President'){
                echo "<td><a href='club_page.php?function=send&club_id=$club_id'><i class='fa fa-send-o' style='color: purple; padding: 5px;'></i></a>
                            <a href='club_page.php?function=add&club_id=$club_id'><i class='fa fa-plus' style='color: green; padding: 5px;'></i></a>
                            <a href='club_page.php?function=remove&club_id=$club_id'><i class='fa fa-minus' style='color: red; padding: 5px;'></i></a>
                      </td>";
            }else{
                echo "<td>-</td>";
            }
//            echo "<td><a><i class='fa fa-envelope' style='color: blue; padding: 5px;'></i></a></td></tr>";
            check_messages($conn, $id, $club_id);
        }
    }else{
        echo "<tr><td colspan='2' style='text-align: center'>No clubs to show</td></tr>";
    }
    echo "</table>";
}

function check_messages($conn, $student_id, $club_id){
    $sql = "SELECT status FROM message_has_member WHERE (student_id = '$student_id' AND status = 'Unread') AND club_id = $club_id";
    $results = $conn->query($sql);
    if($results->num_rows > 0){
        echo "<td><a href='messages.php?club_id=$club_id'><i class='fa fa-envelope' style='color: blue; padding: 5px;'></i></a></td></tr>";
    }else{
        echo "<td><a href='messages.php?club_id=$club_id'><i class='fa fa-envelope-open' style='color: darkgrey; padding: 5px;'></i></a></td></tr>";
    }
}


?>