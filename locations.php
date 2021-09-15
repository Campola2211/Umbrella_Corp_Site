<!DOCTYPE html>
<html>
        <head>
                <meta charset="UTF-8">
                <title>Umbrella Corporation: Locations</title>
		<link rel="stylesheet" href="guest.css">
        </head>
        <body>
                <div style="float: left; padding-right: 20px">
                        <img src="umbrella_logo.png" alt="Umbrella Corporation Logo" style="width:100px;height:100px;">
                </div>
                <div id = "heading" style="padding-top: 10px">
                        <h1>Umbrella Corporation Locations</h1>
                </div>
                <div style="padding-top: 20px; padding-left: 10px">
                </div>
                <div>
                        <form action="#" method="post">
                        <p> Country:
                        <select name = "Country">
                                <option disabled selected value>N/A</option>
                                <option value="United States">United States</option>
                                <option value="France">France</option>
                                <option value="South Pacific">South Pacific</option>
                                <option value="Russia">Russia</option>
                        </select> 
                         City:
                         <select name = "City">
                                <option disabled selected value>N/A</option>
                                <option value="Raccoon City">Raccoon City</option>
                                <option value="Calbian Cove">Calbian Cove</option>
                                <option value="Paris">Paris</option>
                                <option value="Matsed">Matsed</option>
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
                	$order2 = $_POST['City'];
                	$order = $_POST['Country'];
                	if(isset($order)){
                        	$order = " where country = '$order'";
                        	$sql_select = "SELECT * FROM WorkSites" . $order;
                     
                        	echo"<br>";
                        if(isset($order2)){
                                $sql_select = "$sql_select and city = '$order2'";
                        }
                }
                else{	
			if(isset($order2)){
				$sql_select = "SELECT * FROM WorkSites where city = '$order2'";
			}
			else{
                        	$sql_select = "SELECT * FROM WorkSites";
			}
                }
                $result = mysqli_query($connection, $sql_select);
                $numRows = mysqli_num_rows($result);
                echo "<h3>WorkSites</h3>";
                echo "<table style=\"width:25%\">";
                echo "<tr><th>Site Name</th><th>City</th><th>State</th><th>Country</th></tr>";
                // Display rows
                if ($numRows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["siteName"] . "</td>";
                                echo "<td>" . $row["city"] . "</td>";
                                echo "<td>" . $row["state"] . "</td>";
                                echo "<td>" . $row["country"] . "</td>";
                				echo "</tr>";
                        }
                }
        }
?>
        </body>
</html>

