<?php

	include("../connection.php");

	session_start();

	$id = $_SESSION['id'];

	$return_arr = array();

	if(!($stmt = $conn->prepare("SELECT * FROM users WHERE id = '$id' ")))
		echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

	if (!$stmt->execute())
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

	if (!($res = $stmt->get_result()))
		echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;

	$row = $res->fetch_assoc();

	echo htmlspecialchars_decode(json_encode($row));

?>