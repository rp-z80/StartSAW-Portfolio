
<?php
	
	if (isset($_POST['submit']))
	{
		include("../connection.php");

		$prevpage = $_SERVER['HTTP_REFERER'];

		$email = htmlspecialchars(trim($_POST['email']));
		$password = htmlspecialchars(trim($_POST['password']));

		$sql = "SELECT * FROM users WHERE email = '$email' ";

		if(!($stmt = $conn->prepare($sql)))
			echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

		if(!$stmt->execute())
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

		if(!($res = $stmt->get_result()))
			echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;

		$row = $res->fetch_assoc();

		$hash = $row['password'];

		if (password_verify($password, $hash))
		{
			session_start();

			$_SESSION['id'] = $row['id'];

			header("Location: $prevpage");
		}

		else
			header("Location: $prevpage");

	}
?>