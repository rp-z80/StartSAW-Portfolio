<?php

	session_start();

	include("../../connection.php");

	$email = $_GET['email'];

	if ($email !== "")
	{
		$emailSql1 = "SELECT email FROM users WHERE email = '$email' ";

		if(!($emailStmt1 = $conn->prepare($emailSql1)))
			echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

		if (!$emailStmt1->execute())
			echo "Execute failed: (" . $emailStmt1->errno . ") " . $emailStmt1->error;

		if (!($emailRes1 = $emailStmt1->get_result()))
			echo "Getting result set failed: (" . $emailStmt1->errno . ") " . $emailStmt1->error;

		$numRows = $emailRes1->num_rows;

		if ($numRows > 0)
		{
			/*
			Se la query da risultato bisogna controllare se l'email' è uguale a quella dell'utente loggato
			perchè nel form della pagina profile un utente potrebbe voler cambiare soltanto l'username quindi bisogna
			abilitare il pulsante anche se l'email rimane invariata
			*/

			if(isset($_SESSION['id']))
			{
				$id = $_SESSION['id'];

				$emailRow1 = $emailRes1->fetch_assoc();

				$emailSql2 = "SELECT email FROM users WHERE id = '$id' ";

				if(!($emailStmt2 = $conn->prepare($emailSql2)))
					echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

				if (!$emailStmt2->execute())
					echo "Execute failed: (" . $emailStmt2->errno . ") " . $emailStmt2->error;

				if (!($emailRes2 = $emailStmt2->get_result()))
					echo "Getting result set failed: (" . $emailStmt2->errno . ") " . $emailStmt2->error;

				$emailRow2 = $emailRes2->fetch_assoc();

				if($emailRow1['email'] == $emailRow2['email'])
					echo " ";
			
				else
					echo "Email already registered";
			}

			else
				echo "Email already registered";
		}

		else
			echo " ";
	}

		$conn->close();
?>