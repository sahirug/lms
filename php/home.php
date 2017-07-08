<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<?php

    echo $_SESSION['username']."<br>";
//    echo $_REQUEST['password']."<br>";

?>
</body>
</html>