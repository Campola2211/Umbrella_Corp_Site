<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Umbrella Corporation: Admin Access</title>
		<link rel="stylesheet" href="guest.css">
		<?php
 			include "credentials.php";
                        $servername = "localhost";
                        $db = "S19_350_Team_Pink";
                        $connection = mysqli_connect($servername, $userName, $passWord, $db);
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$sql = "";
				if(isset($_POST['table'])) {
								$table = $_POST['table'];
				}
				if(isset($_POST['column'])) {
								$col = $_POST['column'];
								$carr = explode(",", $col);
				}
				if(isset($_POST['data'])) {
								$data = $_POST['data'];
								$darr = explode(',', $data);
				}
				
				$print = 0;
				if(!empty($_POST['add'])) {
					$sql = "INSERT INTO " . $table . "(" . $col. ") VALUES (" . $data . ");";
				} else if (isset($_POST['delete'])) {
					$sql = "DELETE FROM " . $table . " WHERE " . $carr[0] . "=" . $darr[0];
					$lenArr = count($darr);
					for($i = 1; $i < $lenArr; $i++){
                                                                $sql = $sql . " AND " . $carr[$i] . "=" . $darr[$i];
                                                        }
				} else if (isset($_POST['update'])) {
					$sql = "UPDATE " . $table . " SET $carr[0] = $darr[0] WHERE $carr[1] = $darr[1]";
				} else if (isset($_POST['view'])) {
					if($data != NULL) {
							$lenArr = count($darr);
							$sql = "SELECT " . $col . " FROM " . $table . " WHERE " .$carr[0] . "=" .  $darr[0]; # . ";";
							for($i = 1; $i < $lenArr; $i++){
								$sql = $sql . " AND " . $carr[$i] . "=" . $darr[$i];
							}
					}
					else {
						 $sql = "SELECT " . $col . " FROM " . $table . ";";
					}
					$print = 1;
				}
			}
		?>
	</head>
	<body>
		<div style="float: left; padding-right: 20px">
			<img src="umbrella_logo.png" alt="Umbrella Corporation Logo" style="width:100px;height:100px;">
		</div>
		<div id="heading" style="padding-top: 10px">
			<h1>Welcome Back, Valued Employee</h1>
		</div>
		<div style="padding-top: 20px; padding-left: 170px">


			<form method="post">
				<label class="container">Add
					<input type="checkbox" name="add">
					<span class="checkmark"></span>
				</label>
				<label class="container">Delete
					<input type="checkbox" name="delete">
					<span class="checkmark"></span>
				</label>
				<label class="container">Update
					<input type="checkbox" name="update">
					<span class="checkmark"></span>
				</label>
				<label class="container">View
					<input type="checkbox" name="view">
					<span class="checkmark"></span>
				</label> <br>

	  		Table: <input type="text" name="table"><br>
	  		Column: <input type="text" name="column"><br>
				Data: <input type="text" name="data"><br>
				<input type="submit" value="Submit">
			</form>


			<?php
			if($print == 1) {
				include "printTable.php";
				$print = 0;
			}
			else {
				mysqli_query($connection, $sql);
			}
			?>

		</div>
	</body>
</html>

