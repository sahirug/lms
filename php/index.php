<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		.error-message{
			border: 5px solid red;
			color: white;
			background-color: black;
		}
	</style>
</head>
<body>
<form action="http://localhost/ssg/index.php" method="POST">
	<input type="text" name="username" placeholder="Username">
	<input type="password" name="password" placeholder="password">
	<input type="submit" value="Submit">
</form>
<?php
	include 'init.php';
	if(isset($_POST['username']) && isset($_POST['password']) ) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

		$results = $conn->query($sql);

		if($results->num_rows > 0){
			$result = $results->fetch_assoc();
//			echo "<strong>Username ".$result['username']." and the password is ".$result['password']."</strong>";
			$username = $result['username'];
			$password = $result['password'];
			session_start();
			$_SESSION['username'] = $username;
			header("Location: home.php");
		}else{
			echo "<div class='error-message'>No such user</div>";
		}
	}else{
		echo "<strong>Nothing set yet</strong>";
	}
?>
</body>
</html>