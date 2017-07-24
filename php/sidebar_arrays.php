<?php

    $sidebar_array_students = array(
        "Modules" => ["Modules","fa fa-book", "home.php"],
        "Timetable" => ["Timetable","fa fa-calendar", "#"],
        "Clubs" => ["Clubs", "fa fa-users", "clubs.php"],
        "Settings" => ["Amend Personal Data", "fa fa-user", "settings.php"],
        "Logout" => ["Logout", "fa fa-sign-out", "php/logout.php"],
    );

    $sidebar_array_lecturers = array(
        "Modules" => ["Modules","fa fa-book", "home.php"],
//        "Assignments" => ["Upload Assignment", "fa fa-upload", "#"],
//        "Results" => ["Upload Results", "fa fa-university", "#"],
        "Settings" => ["Amend Personal Data", "fa fa-user", "settings.php"],
        "Logout" => ["Logout", "fa fa-sign-out", "php/logout.php"]

    );

    $sidebar_array_root = array(
        "Add" => ["Add User","fa fa-user-plus", "select_user_type.php"],
//        "Modules" => ["Modules","fa fa-book", "home.php"],
        "Clubs" => ["Clubs", "fa fa-users", "root_clubs.php"],
        "Settings" => ["Amend Personal Data", "fa fa-user", "settings.php"],
        "Logout" => ["Logout", "fa fa-sign-out", "php/logout.php"]

    );

?>