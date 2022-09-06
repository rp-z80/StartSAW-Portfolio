<?php

	session_start();

	include("../../connection.php");

	$username = $_GET['username'];

	if ($username !== "")
	{
		$sql = "SELECT username FROM users WHERE username = '$username' ";

		if(!($stmt = $conn->prepare($sql)))
			echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

		if (!$stmt->execute())
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

		if (!($res = $stmt->get_result()))
			echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;

		$numRows = $res->num_rows;


		if ($numRows > 0)
		{
			/*
			Se la query da risultato bisogna controllare se l'username è uguale a quello dell'utente loggato
			perchè nel form della pagina profile un utente potrebbe voler cambiare soltanto la mail quindi bisogna
			abilitare il pulsante anche se l'username rimane invariato
			*/
			
			if(isset($_SESSION['id']))
			{
				$id = $_SESSION['id'];

				$row = $res->fetch_assoc();

				$sql2 = "SELECT username FROM users WHERE id = '$id' ";

				if(!($stmt2 = $conn->prepare($sql2)))
					echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

				if (!$stmt2->execute())
					echo "Execute failed: (" . $stmt2->errno . ") " . $stmt2->error;

				if (!($res2 = $stmt2->get_result()))
					echo "Getting result set failed: (" . $stmt2->errno . ") " . $stmt2->error;

				$row2 = $res2->fetch_assoc();

				if($row['username'] == $row2['username'])
					echo " ";

				else 
					echo "Username already taken";
			}

			else
				echo "Username already taken";
		}

		else
			echo " ";
	}

		$conn->close();
?>