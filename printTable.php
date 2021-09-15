<?php
   $result = mysqli_query($connection, $sql);
   $numRows = mysqli_num_rows($result);
   echo "<h3>" . $table . "</h3>";
   echo "<table style=\"width:25%\">";
   $arr = explode(",", $col);
   $lenArr = count($arr);
   echo "<tr>";
   for($i = 0; $i < $lenArr; $i++) {
	echo "<th>" . $arr[$i] . "</th>";
   }
   echo "</tr>";
			 			// Display rows
   if ($numRows > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
	   echo "<tr>";
	   for($i = 0; $i < $lenArr; $i++) {
		echo "<td>" . $row[$arr[$i]] . "</td>";
	   }
	   echo "</tr>";
	}
  }
?>
