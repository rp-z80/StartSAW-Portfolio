<?php
	if(isset(_SESSION['adminID'])) {
		if(isset($_POST['submitMake']))
		{
			include("../../connection.php");

			$email = trim($_POST['email']);

			$sql = "UPDATE users SET adminFlag = '1' WHERE email = '$email' ";

			if(!($stmt = $conn->prepare($sql)))
				echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

			if (!$stmt->execute())
				echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

			$conn->close();

			header("Location: ../adminArea.php");
		}

		else if(isset($_POST['submitRemove']))
		{
			include("../../connection.php");

			$email = trim($_POST['email']);

			$sql = "UPDATE users SET adminFlag = '0' WHERE email = '$email' ";

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