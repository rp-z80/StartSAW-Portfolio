<?php
	if(isset($_SESSION['adminID'])) {
		include('../../connection.php');

		$target_dir = "../images/products/";
		$target_file = $target_dir . basename($_FILES['productImage']['name']);
		$uploadOk = 1;
		move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file);

		$productName = trim($_POST['productName']);
		$version = trim($_POST['version']);
		$description = trim($_POST['description']);
		$downloadLink = trim($_POST['downloadLink']);
		$iconPath = "images/products/" . basename($_FILES['productImage']['name']);

		$sql = "INSERT INTO products (name, version, description, link, icon) VALUES ('$productName', '$version', '$description', '$downloadLink', '$iconPath') ";

		if(!($stmt = $conn->prepare($sql)))
			echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

		if (!$stmt->execute())
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

		$conn->close();

		header('Location: ../adminArea.php');
	} else {
		echo "no";
	}
?>
