<?php
	if(isset($_SESSION['adminID'])) {
		include("../../connection.php");

		$sql = "SELECT * FROM users ORDER BY email";

		$results = $conn->query($sql);

		if ($results->num_rows > 0)
		{
			echo "<table><tr><th>Firstname</th><th>Lastname</th><th>Email</th><th>Newsletter</th><th>Ban</th><th>Admin</th></tr>";

			while($row = $results->fetch_assoc())
			{
				echo "<tr><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["newsletter"] . "</td><td>" . $row["banFlag"] . "</td><td>" . $row["adminFlag"] . "</td></tr>";
			}

			echo "</table>";
		}
		
		else
			echo "No results";

		$conn->close();
	} else {
		echo "no";
	}

?>

