<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel="shortcut icon" href="images/logo/logo64.png" type="image/x-icon">
		<title> Contact us </title>

		<?php
			include("common/header.php");
		?>
	</head>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<style>

.contactContainer
{
	display: flex;
	flex-direction: row;
	justify-content: space-between;
	border-radius: 25px;
	padding: 2%;
	background: rgb(0, 0, 0, 0.9);
}

.messageContainer
{
	margin-right: 15%;
	width: 600px;
	text-align: center;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-self: flex-start;
}

.infoContainer
{	
	width: 40%;
	text-align: center;
}

.textInfo
{
	font-family: PoppinsMedium;
	display: block;
	padding: 8px;
	text-align: left;
	padding: 14px 16px;
	text-decoration: none;
	color: white;
}

</style>

	<body>
		<main>

			<div class="contactContainer">

				<div class="messageContainer">

					<div class="text1">Get In Touch</div>

						<form action="phpmailer/sendfeedback.php" method=POST>

							<div class="wrap-input">
								<input type="text" id="name" placeholder="Your firstname" name="name">
							</div>

							<div class="wrap-input">
								<input type="text" id="email" placeholder="Your email address" name="email">
							</div>

							<div class="wrap-input">
								<input type="text" id="subject" placeholder="Your subject of this message" name="subject">
							</div>

							<textarea name="message" id="message" cols="30" rows="10" placeholder="Write us something"></textarea>

							<div class="button-container">
								<button name="submit" class="login-button" type="submit">SEND</button>
							</div>

						</form>
				</div>

				<span class="infoContainer">

					<div class="text1">Contact Information</div>

					<ul>
						<li class="textInfo"><i class="fas fa-map-marker-alt fa-2x fa-pull-left"></i> 198 West 21th Street, <br> Suite 721 Poggibonsi SI</li>
						<li class="textInfo"><i class="fas fa-phone fa-2x fa-pull-left"></i>+ 1235 2355 98</li>
						<li class="textInfo"><i class="far fa-envelope fa-2x fa-pull-left"></i> info@harshnoises.com</li>
					</ul>
					
				</span>
			</div>
		</main>

	<?php
		include("common/footer.php");
	?>

	</body>
</html>
