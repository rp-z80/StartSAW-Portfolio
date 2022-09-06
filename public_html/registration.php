<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" type="text/css" href="styles/style.css">

	<link rel="shortcut icon" href="images/logo/logo64.png" type="image/x-icon">

	<title> Registration Form </title>

	<script src="scripts/utility.js"></script>

	<script src="scripts/checkForm.js"></script>

</head>

<style>

</style>

<?php
	
	if (isset($_POST['submit']))
	{
		session_start();

		include("../connection.php");
		
	    $firstname = htmlspecialchars(trim($_POST['firstname']));
	    $lastname = htmlspecialchars(trim($_POST['lastname']));
	    $email = htmlspecialchars(trim($_POST['email']));
	    $password = htmlspecialchars(trim($_POST['pass']));
		$password = password_hash($password, PASSWORD_DEFAULT);
		
		if($_POST['newsletter']) {
			$newsletter = 1;
		} else {
			$newsletter = 0;
		}
		if(!(empty($firstname) and empty($lastname) and empty($email) and empty($password))) {
			$sql = "INSERT INTO users (firstname, lastname, email, password, newsletter, banFlag, adminFlag) 
						VALUES (?, ?, ?, ?, ?, ?, ?) ";
			$stmt = mysqli_stmt_init($conn);
			
			if(!mysqli_smtmt_prepare($stmt, $sql)) {
				echo "Error: " . $sql . "<br>" . $conn->error;
			} else {
				mysqli_stmt_bind_param($stmt, "ssssiii", $firstname, $lastname, $email, $password, $newsletter, 0, 0);
				mysqli_stmt_execute($stmt);
				//$result = mysli_stmt_get_result();
			}
		// if ($conn->query($sql) === TRUE)
		//     echo "";
		// else
		//     echo "Error: " . $sql . "<br>" . $conn->error;


			$sql2 = "SELECT id FROM users WHERE email = ? ";
			$stmt2 = mysqli_stmt_init($conn);

			if(!mysqli_stmt_prepare($stmt2, $sql2)) {
				echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
			} else {
				mysqli_stmt_bin_param($stmt2, "s", $email);
				mysqli_stmt_execute($stmt2);
			}

			if (!($res = $stmt2->get_result()))
				echo "Getting result set failed: (" . $stmt2->errno . ") " . $stmt2->error;

			$row = $res->fetch_assoc();

			$_SESSION['id'] = $row['id'];

			$conn->close();

			header("Location: index.php");
		} else {
			echo "empty";
		}
	}

	else
	{
		
	include("common/header.php");

?>
		

<body>
	<main>

	<div class="container">

		<form id="registrationForm" action="registration.php" method="POST">

			<span class="text1">
				REGISTER
			</span>

			<div class="wrap-input">
				<input type="text" id="firstname" name="firstname" placeholder="Firstname" required="">
			</div>
			
			<div class="wrap-input">
				<input type="text" id="lastname" name="lastname" placeholder="Lastname" required="">
			</div>
			
			<div class="wrap-input">
				<input type="email" id="email" name="email" placeholder="E-Mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="" onchange="checkEmail(this.value)"><span class="errormsg" id="emailError"></span>
			</div>

			<div class="wrap-input">
				<input type="password" id="password" name="pass" placeholder="Password" required="">
			</div>

			<div class="wrap-input">
				<input type="password" id="cpassword" name="confirm" placeholder="Confirm Password" required="" onchange="validatePasswords(password.value, this.value)">
			</div>

			<div class="box">
				<input type="checkbox" class="newsletterSub" name="newsletter" value=1>
				<label for="newsletterSub" class="text0">Do you want to receive updates to our work? Subscribe to our newsletter!</label>
			</div>

			<div class="button-container">
				<button class="login-button" type="submit" id="submit" name="submit">
					REGISTER
				</button>
			</div>

		</form>
	</div>
</main>

<?php	

	}

	include("common/footer.php");
?>

</body>
</html>