<!DOCTYPE html>
<html>
	<head> 
		<meta charset="UTF-8">
		<title>Umbrella Corporation: Login</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<div style="float: left; padding-right: 20px">
			<img src="umbrella_logo.png" alt="Umbrella Corporation Logo" style="width:100px;height:100px;">
		</div>
		<div id = "heading" style="padding-top: 10px">
			<h1>Umbrella Corporation Login</h1>
		</div>
		<h3>Our Business is Life Itself</h3>
		<div style="padding-top: 20px; padding-left: 170px">
			<form action="" method="post">
				<label>Username:</label> <input type="text" name="username"><br><br>
				<label>Password:</label> <input type="password" name="password"><br><br>
				<input type="submit" value="Submit">
			</form>
			<form action="./welcome.html">
				<input type="submit" value="Sign in as Guest">
			</form>
			<br>
			<br>

		<?php
                                #include("inc/config.php"); //replace this with the $mysqli_connect statement
                                include "credentials.php";
                                $servername = "localhost";
                                $db = "S19_350_Team_Pink";
                                $connection = mysqli_connect($servername, $userName, $passWord, $db);
                                if($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $myusername = mysqli_real_escape_string($connection, $_POST['username']);
                                        $mypassword = mysqli_real_escape_string($connection, $_POST['password']);
                                        $sql = "SELECT name FROM teams WHERE name = '$myusername' AND password = '$mypassword'";
					$result = mysqli_query($connection, $sql);
                			$count = mysqli_num_rows($result);
                                        if($count == 1) {
                                                header("location: admin.php");
                                        } else {
                                                $error = "Your login name or password is invalid";
                                                echo "$error";
                                        }
                                }
                ?>
		</div>
	</body>
</html>

