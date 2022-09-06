<!DOCTYPE html>
<html>

<head>

	<link rel="shortcut icon" href="images/logo/logo64.png" type="image/x-icon">

	<title> Profile </title>


<?php
	
	include("common/header.php");
?>

	<link rel="stylesheet" type="text/css" href="styles/style.css">

	<style>

	.errormsg
	{
		color: red;
	}

	.newsletterContainer
	{
		display: flex;
		flex-direction: row;
		justify-content: flex-start;
		margin-left: 15%;
		margin-bottom: 5%;
		text-align: center;
	}

	.switch 
	{
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
	}

	.switch input 
	{ 
		opacity: 0;
		width: 0;
		height: 0;
	}

	.slider 
	{
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
		border-radius: 34px;
	}

	.slider:before 
	{
		position: absolute;
		content: "";
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
		border-radius: 50%;
	}

	input:checked + .slider {
	  background-color: #2196F3;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(26px);
	  -ms-transform: translateX(26px);
	  transform: translateX(26px);
	}

	.updateMsg
	{
		font-family: PoppinsMedium;
		color: green;
		margin-bottom: 5%;
	}

	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="scripts/utility.js"></script>

	<script src="scripts/checkForm.js"></script>

<script>

	xhr = getXMLHttpRequestObject();

	xhr.onreadystatechange = function()
	{
		if((xhr.readyState == 4) && (xhr.status == 200))
		{
			var jsonObj = JSON.parse(xhr.responseText);

			document.getElementById("firstname").value = jsonObj.firstname;
			document.getElementById("lastname").value = jsonObj.lastname;
			document.getElementById("email").value = jsonObj.email;

			if(jsonObj.newsletter)
				document.getElementById("newsletterCheckbox").checked = true;

			else
				document.getElementById("newsletterCheckbox").checked = false;

		}

	}

	let url = encodeURI("show_profile.php")
	xhr.open('GET', url, true);
	xhr.send(null);

</script>

</head>


<body>
<main>

<?php
	
	if(isset($_SESSION['id']))
	{
?>

    <div class='container'>
		<form id='profileForm' action='update_profile.php' method='POST'> 

			<span class='text1'>
				PROFILE
			</span>


			<div class='wrap-input', style="color: white">
				<label class="input-label" for="firstname">Firstname: </label>
				<input type="text" id="firstname" name="firstname" value="" required="">
			</div>
		
			<div class="wrap-input", style="color: white">
				<label class="input-label" for="lastname">Lastname: </label>
				<input type="text" id="lastname" name="lastname" value="" required="">
			</div>

			<div class="wrap-input", style="color: white">
				<label class="input-label" for="email">Email: </label>
				<input type="email" id="email" name="email" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="" onchange="checkEmail(this.value)"><span class="errormsg" id="emailError"></span>
			</div>

			<div class="newsletterContainer", style="color: white">
				<label class="input-label" for="newsletterSub">Newsletter Subscription: </label>
				<label class="switch"><input type="checkbox" class="newsletterSub" name="newsletter" id="newsletterCheckbox"><span class="slider round"></span></label>
			</div>

			<div id="updateMsg" class="updateMsg"></div>

			<div class="button-container">
				<button class="login-button" type="submit" id="submit" name="submit">
					Update
				</button>
			</div>
		</form>
	</div>
</main>

<?php
	}

	else
	{		
?>

	<div class="container">

		<div class="text1">You must be logged in to view this page</div>

	</div>
</main>


<?php
	}

//aggiorno i dati e stampo a video il messaggio di successo con l'innerHTML	
	if(isset($_POST['submit']))
	{
		include("../connection.php");

		$id = $_SESSION['id'];
		$firstname = htmlspecialchars(trim($_POST['firstname']));
		$lastname = htmlspecialchars(trim($_POST['lastname']));
		$email = htmlspecialchars(trim($_POST['email']));

		if(isset($_POST['newsletter'])) 
			$newsletter = 1;

		else
			$newsletter = 0;

		if(!(empty($id) and empty($firstname) and empty($lastname) and empty($email))) {
			$sql = "UPDATE users SET firstname = ?, lastname = ?, email = ?, newsletter = ? WHERE id = ? ";
			$stmt = mysqli_stmt_init($conn);

			if(!mysqli_smtmt_prepare($stmt, $sql)) {
					echo "Error: " . $sql . "<br>" . $conn->error;
			} else {
				mysqli_stmt_bind_param($stmt, "sssii", $firstname, $lastname, $email, $newsletter, $id);
				mysqli_stmt_execute($stmt);
			}
		} else {
			echo "empty";
		}
		$conn->close();
?>
		<script>
			document.getElementById("updateMsg").innerHTML = "Data updated successfully!";
		</script>
<?php
	}

	include("common/footer.php");
?>

</body>
</html>