<!DOCTYPE html>
<html>

<head>


	<title> Admin Area </title>

	<link rel="shortcut icon" href="images/logo/logo64.png" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="styles/style.css">

<?php

	include("common/header.php");
?>

	<style>

		.globalBox
		{
			align-self: center;
			display: flex;
			flex-direction: column;
			justify-content: center;
			width: 100%;
		}

		.usersTable
		{
			color: white;
			height: 20%;
			display: flex;
			justify-content: center;
		}

		table
		{	
			width: 50%;
			padding-top: 5%;
		}

		table.center
		{
			margin-right: auto;
			margin-left: auto;
		}

		th, td
		{

			align-items: center;
			border: 1px solid white;
		}

	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="scripts/utility.js"></script>

	<script>

		clicked = true;

		function showUsers()
		{
			xhr = getXMLHttpRequestObject();

			xhr.onreadystatechange = function()
			{
				if((xhr.readyState == 4) && (xhr.status == 200))
				{
					if(clicked)
					{	
						document.getElementById("usersTable").innerHTML = xhr.responseText;
						document.getElementById("showUsersButton").innerHTML = "HIDE ALL USERS";
						clicked = false;
					}

					else
					{
						document.getElementById("usersTable").innerHTML = " ";
						document.getElementById("showUsersButton").innerHTML = "SHOW ALL USERS";
						clicked = true;
					}

				}

				else
					document.getElementById("usersTable").innerHTML = " ";
			}

			let url = encodeURI("scripts/showAllUsers.php");

			xhr.open('GET', url, true);
			xhr.send(null);
		}


		function newsletterRedirect()
		{
			location.href = "sendMailForm";
		}

	</script>

</head>

<?php

if(isset($_SESSION['adminID']))
{

?>

<body>
	<main>

	<div class="globalBox">

		<div class="container">
			<form id='banForm' action='scripts/banUser.php' method='POST'> 

				<span class='text1'>BAN or UNBAN USER</span>

				<div class="wrap-input">
					<input type="email" id="email" name="email" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="" placeholder="Email">
				</div>

				<div class="button-container">
					<button class="login-button" type="submit" id="submit" name="submitBan">BAN</button>
					<button class="login-button" type="submit" id="submit" name="submitUnban">UNBAN</button>
				</div>

			</form>
		</div>


		<div class="container">
			<form id='adminForm' action='scripts/makeAdmin.php' method='POST'> 

				<span class='text1'>MAKE or REMOVE ADMIN</span>

				<div class="wrap-input">
					<input type="email" id="email" name="email" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="" placeholder="Email">
				</div>

				<div class="button-container">
					<button class="login-button" type="submit" id="submit" name="submitMake">MAKE</button>
					<button class="login-button" type="submit" id="submit" name="submitRemove">REMOVE</button>
				</div>
			</form>
		</div>


		<div class="container">
			<form id='adminForm' action='scripts/uploadProduct.php' method='POST' enctype="multipart/form-data"> 

				<span class='text1'>UPLOAD a PRODUCT</span>

				<div class="wrap-input">
					<input type="text" id="productName" name="productName" value="" required="" placeholder="Product Name">
				</div>

				<div class="wrap-input">
					<input type="text" id="version" name="version" value="" required="" placeholder="Version">
				</div>

				<textarea name="description" id="description" cols="30" rows="10" placeholder="Description..."></textarea>

				<div class="wrap-input">
					<input type="text" id="downloadLink" name="downloadLink" value="" required="" placeholder="Download Link">
				</div>

				<div class="wrap-input">
					<label class="input-label" for="productImage" style="color: white">Upload an image: </label>
					<input type="file" name="productImage" id="productImage">
				</div>

				<div class="button-container">
					<button class="login-button" type="submit" id="upload" name="upload">UPLOAD</button>
				</div>
			</form>
		</div>


		<div class="container">
			<form id='adminForm' action='scripts/setSupport.php' method='POST'> 

				<span class='text1'>SET/UNSET SUPPORT</span>

				<div class="wrap-input">
					<input type="text" id="productName" name="productName" value="" required="" placeholder="Product Name">
				</div>

				<div class="wrap-input">
					<input type="text" id="version" name="version" value="" required="" placeholder="Version">
				</div>

				<div class="button-container">
					<button class="login-button" type="submit" id="set" name="setSupport">SET</button>
					<button class="login-button" type="submit" id="set" name="unsetSupport">UNSET</button>
				</div>
			</form>
		</div>


		<div class="container">
			<div class="button-container">
				<button class="login-button" type="submit" id="showUsersButton" name="submit" onclick="showUsers()">SHOW ALL USERS</button>
			</div>

			<div id="usersTable" class="usersTable"></div>
		</div>


		<div class="container">
			<div class="button-container">
				<button class="login-button" id="newsletterButton" onclick="newsletterRedirect()">NEWSLETTER</button>
			</div>
		</div>
	</div>

</main>


<?php

	}

	else
	{
?>
	<main>
		<div class="container">

			<div class="text1">You don't have permissions to view this page</div>

		</div>

	</main>

<?php
	}

	include("common/footer.php");
?>

</body>
</html>