<?php

	include("../../connection.php");

	$email = $_GET['email'];

	$sql = "SELECT banFlag FROM users WHERE email = '$email' ";

	if(!($stmt = $conn->prepare($sql)))
		echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

	if (!$stmt->execute())
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

	if (!($res = $stmt->get_result()))
		echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;

	$row = $res->fetch_assoc();

	$numRows = $res->num_rows;

	if($numRows == "0")
	{
		echo "Login fail";
	}

	else if(($row["banFlag"] == "1"))
	{
		echo "Login fail";
	}

	else echo "";

	$conn->close();
?>