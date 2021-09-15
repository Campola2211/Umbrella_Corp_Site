<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Umbrella Corporation: Products</title>
		<link rel="stylesheet" href="guest.css">
	</head>
	<body>
		<div style="float: left; padding-right: 20px">
			<img src="umbrella_logo.png" alt="Umbrella Corporation Logo" style="width:100px;height:100px;">
		</div>
		<div id = "heading" style="padding-top: 10px">
			<h1>Umbrella Corporation Products</h1>
		</div>
		<div style="padding-top: 20px; padding-left: 10px">
		</div>
		<div>
			<form action="#" method="post">
			<p> Virus:
                        <select name = "Virus">
                                <option disabled selected value>N/A</option>
                                <option value="T-virus">T Virus</option>
                                <option value="G-virus">G Virus</option>
                                <option value="T-Abyss">T-Abyss</option>
                                <option value="Uroboros">Uroboros</option>
                        </select> 
			 B.O.W.s:
			 <select name = "BOWs">
				<option disabled selected value>N/A</option>
  				<option value="Hunter">Hunter</option>
  				<option value="Wall Blister">Wall Blister</option>
				<option value="G creation">G-Creation</option>
                                <option value="Revanent">Revanent</option>
				<option value="T-103">T-103</option>
			</select> </p>
			<input type = "submit" name = "Submit" value ="Submit"/>
			</form>
		</div>
<?php
		
		include "credentials.php";
		$servername = "localhost";
		$db = "S19_350_Team_Pink";
		$connection = mysqli_connect($servername, $userName, $passWord, $db);
        
		// Create connection
		if (!$connection) {
			echo "MySQL database connection failed.";
		} else {
			#echo "MySQL database connection success!";
		
		#echo "<br>";
		#echo "<br>";
	#	if(isset($_POST['Submit']){
		$order2 = $_POST['BOWs'];
		$order = $_POST['Virus'];
		if(isset($order)){
			
			$order = " where v.virusName = '$order'";
			$sql_select = "SELECT name, virusName, description, group_concat(companyName, '') company FROM BOWs b LEFT JOIN Virus v ON v.virusID = b.virusID LEFT JOIN Endorsements e ON v.virusID = e.virusID LEFT JOIN Collaborators c ON c.collaboratorID = e.collaboratorID" . $order;
			#echo $sql_select;
			echo "<br>";
			if(isset($order2)){
				$sql_select = "$sql_select and b.name = '$order2'"; 	
			}
			$sql_select ="$sql_select group by name, virusName, description";
		}
			
	#	}
		else{
			if(isset($order2)){
				$sql_select = "SELECT name, virusName, description, group_concat(companyName, '') company FROM BOWs b LEFT JOIN Virus v ON v.virusID = b.virusID LEFT JOIN Endorsements e ON v.virusID = e.virusID LEFT JOIN Collaborators c ON c.collaboratorID = e.collaboratorID where b.name =  '$order2' group by name, virusName, description";
			}
			else{
			$sql_select = "select name, virusName, description,  group_concat(companyName, '') company FROM BOWs b LEFT JOIN Virus v ON v.virusID = b.virusID LEFT JOIN Endorsements e ON v.virusID = e.virusID LEFT JOIN Collaborators c ON c.collaboratorID = e.collaboratorID group by name, virusName, Description";
		}
		}
		$result = mysqli_query($connection, $sql_select);
		$numRows = mysqli_num_rows($result);
	
		echo "<h3>Bio-Organic Weapons</h3>";
	
		echo "<table style=\"width:25%\">";
	echo "<tr><th>Name</th><th>Virus</th><th>Description</th><th>Endorsed by</th></tr>";
		// Display rows
		if ($numRows > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["name"] . "</td>";
				echo "<td>" . $row["virusName"] . "</td>";
				echo "<td>" . $row["description"] . "</td>";
				echo "<td>" . $row["company"] . "</td>";
                		echo "</tr>";
			}
		}
        }
?>
	</body>
</html>

