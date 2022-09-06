<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel="shortcut icon" href="images/logo/logo64.png" type="image/x-icon">
		<title> Home </title>
	</head>

	<style>

		.indexContainer
		{
			display: flex;
			flex-direction: row;
			justify-content: space-around;
			flex-wrap: wrap;
		}

		.textContainer
		{
			text-align: center;
			display: flex;
			flex-direction: column;
			justify-content: center;
			max-width: 40%;
			margin-right: 5%;
		}

	</style>

	<body>	
	
		<?php
			include("common/header.php");
		?>

		<main>
			<div class="indexContainer">			
				<div class="textContainer">
					<div class="text2">Music made easy</div>
					<br>
					<img src="images/logoscritta.png" alt="logo of harsh noises software">
					<!--<h1>Harsh Noises</h1>-->
					<br>
					<div class="text3">The best music production softwares around.<br> Free.<br> Made by artists for artists.</div>
				</div>
				<img src="images/logohomepage.png" width=50% height=50% alt="Laptop pc running a DAW" align="center">
			</div>
		</main>

		<?php
			include("common/footer.php");
		?>

	</body>

</html>
