<style>

	.footerBar
	{
		list-style: none;
  		background: rgba(0, 0, 0, 0.9);
		margin: 0;
		padding: 0;
		overflow: visible;
		width: 100%;
		left:0;
		bottom:0;
		display: flex;
		justify-content: space-between;

	}

	.footerList
	{
		display: inline;
		float: center;
	}

	.footerInfo
	{
		font-family: PoppinsMedium;
		display: block;
		float: center;
		padding: 14px 16px;
		color: white;
		width: 33.3%;
		align-self: flex-start;
		text-align: left;
	}

	.footerSocial
	{
		align-self: center;
		font-family: PoppinsMedium;
		display: block;
		float: center;
		padding: 14px 16px;
		color: white;
		display: flex;
		flex-direction: row;
		justify-content: space-around;
		width: 33.3%;
	}

	.adminAreaLink
	{
		padding: 14px 16px;
		float: center;
		text-align: right;
		width: 33.3%;
	}

	.footerLink
	{

		font-family: PoppinsMedium;
		display: block;
/*		padding: 2px 16px; */
		text-decoration: none;
		color: white;
		transition: 0.3s;
	}

	.footerLink:hover
	{
		color: grey;
		text-decoration: underline;
	}

</style>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<footer>
	<ul class="footerBar">
		<div class="footerInfo">&copy 2021 Harsh Noises Software Srl</div>
		<div class="footerSocial">
			<a class="footerLink" href=""><i class="fab fa-facebook-f fa-2x"></i></a>
			<a class="footerLink" href=""><i class="fab fa-youtube fa-2x"></i></a>
			<a class="footerLink" href=""><i class="fab fa-twitter fa-2x"></i></a>
			<a class="footerLink" href=""><i class="fab fa-instagram fa-2x"></i></a>
		</div>
		<div class="adminAreaLink">

<?php

	include("../connection.php");
	
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
		$sql = "SELECT adminFlag FROM users WHERE id='$id' ";

		if(!($stmt = $conn->prepare($sql)))
			echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;

		if (!$stmt->execute())
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

		if (!($res = $stmt->get_result()))
			echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;

		$row = $res->fetch_assoc();


		if($row['adminFlag'] == 1)
		{
			$_SESSION['adminID'] = $_SESSION['id'];
			echo '<a class="footerLink" href="adminArea.php">Admin Area</div></a>';
		}
?>
	</div>
	</ul>


<?php

	}

?>
</footer>