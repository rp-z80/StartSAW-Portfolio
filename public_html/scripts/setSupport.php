<?php
	if(isset($_SESSION['adminID'])) {
		if(isset($_POST['setSupport']))
		{
			include("../../connection.php");

			$productName = trim($_POST['productName']);
			$version = trim($_POST['version']);

			$sql = "UPDATE products SET supported = '1' WHERE name = '$productName' AND version = '$version' ";

			if(!($stmt = $conn->prepare($sql)))
				echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

			if (!$stmt->execute())
				echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

			$conn->close();

			header("Location: ../adminArea.php");
		}

		else if(isset($_POST['unsetSupport']))
		{
			include("../../connection.php");

			$productName = trim($_POST['productName']);
			$version = trim($_POST['version']);

			$sql = "UPDATE products SET supported = '0' WHERE name = '$productName' AND version = '$version' ";

			if(!($stmt = $conn->prepare($sql)))
				echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

			if (!$stmt->execute())
				echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

			$conn->close();

			header("Location: ../adminArea.php");
		}
	} else {
		echo "no";
	}
?>