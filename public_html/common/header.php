
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

	.navigationBar
	{
		list-style: none;
/*		background-color: #333; */

  		background: rgba(0, 0, 0, 0.9);
		margin: 0;
		padding: 0;
		overflow: visible;
		position: fixed;
		width: 100%;
	}

	.navigationList
	{
		display: inline;
		float: left;
	}

	.navigationLink
	{
		font-family: PoppinsMedium;
		display: block;
		padding: 8px;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		color: white;
		transition: 0.3s
	}

	.navigationLinkLogo
	{
		display: block;
		padding: 4px;
		text-align: center;
		color: white;
		transition: 0.3s
	}

	.navigationLink:active 
	{
		color: white;
	}

	.navigationLink:hover, .navigationLinkLogo:hover
	{
		background-color: grey;
	}
	
	.dropdownLink
	{
		font-family: PoppinsMedium;
		display: block;
		padding: 8px;
		float: center;
		padding: 14px 16px;
		text-decoration: none;
		color: white;
		transition: 0.3s;
	}

	.dropdownLink:active
	{
		color: white;
	}

	.dropdownLink:hover
	{
		color: grey;
		text-decoration: underline;
	}

	.dropdown 
	{
		font-family: PoppinsMedium;
  		float: left;
  		overflow: hidden;
	}


	.dropdown .dropbtn 
	{
		font-family: PoppinsMedium;
		padding: 14px 16px;
		cursor: pointer;
		font-size: 16px;  
		border: none;
		outline: none;
		color: white;
		/*padding: 14px 16px;*/
		background-color: inherit;
		font-family: inherit;
		margin: 0;
		transition: 0.3s;
	}

	.dropbtn:hover
	{
		background-color: grey;	
	}

	.dropdown-content 
	{
		display: none;
		position: absolute;
		background-color: rgba(0, 0, 0, 0.9);
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 2;

  		border-bottom-left-radius: 25px;
  		border-bottom-right-radius: 25px;
	}

	.dropdown-content a 
	{
		float: none;
		color: white;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
		text-align: center;
	}
/*
	.dropdown-content a:hover 
	{
		background-color: #ddd;
	}
*/
	.show 
	{
		display: block;
	}



</style>

<header>
<?php	
		session_start();

		if(!isset($_SESSION['id']))
		{
?>
		<ul class="navigationBar">
			<li class="navigationList"><a class="navigationLinkLogo" href="index.php"><img src="images/logo/logo64.png" width=59% alt="Logo"></a></li>
			<li class="navigationList"><a class="navigationLink" href="about.php">About</a></li>
			<li class="navigationList"><a class="navigationLink" href="products.php">Products</a></li>
			<li class="navigationList"><a class="navigationLink" href="contact_us.php">Contact us</a></li>
			<li class="navigationList" style="float:right">
				<div class="dropdown">
  					<button class="dropbtn" onclick="myFunction()">Log in / Sign up
    					<i class="fa fa-caret-down"></i>
  					</button>
  					<div class="dropdown-content" id="myDropdown">

						<form id="form" action="login.php" method="POST">

							<div class="wrap-input">
								<input type="text" id="loginEmail" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="" onchange="checkLoginEmail(this.value)"><div id="errormsg" style="color: red"></div>
							</div>

							<div class="wrap-input">
								<input type="password" id="loginPassword" name="password" placeholder="Password" required="">
							</div>

							<div class="button-container">
								<button class="login-button" type="submit" id="login" name="submit">
									LOGIN
								</button>
							</div>
							
							<a class="dropdownLink" href="registration.php">No account? Sign up!</a>
						</form>

 					 </div>
  				</div>
  			</li>
		</ul>
<?php
		} else {
?>
		<ul class="navigationBar">
			<li class="navigationList"><a class="navigationLinkLogo" href="index.php"><img src="images/logo/logo64.png" width=59% alt="Logo"></a></li>
			<li class="navigationList"><a class="navigationLink" href="about.php">About</a></li>
			<li class="navigationList"><a class="navigationLink" href="products.php">Products</a></li>
			<li class="navigationList"><a class="navigationLink" href="contact_us.php">Contact us</a></li>
			<li class="navigationList" style="float:right"><a class="navigationLink" href="logout.php">Logout</a></li>
			<li class="navigationList" style="float:right"><a class="navigationLink" href="update_profile.php">Profile</a></li>

		</ul>
<?php
		}
?>

<script src="scripts/utility.js"></script>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() 
{
  document.getElementById("myDropdown").classList.toggle("show");
}


function checkLoginEmail(email)
{

	xhr = getXMLHttpRequestObject();

	xhr.onreadystatechange = function()
	{
		if((xhr.readyState == 4) && (xhr.status == 200))
		{
			if(xhr.responseText == "Login fail")
				document.getElementById("loginEmail").setCustomValidity("Invaild email");

			else
				document.getElementById("loginEmail").setCustomValidity("");
		}
	}

	let querystring = "?email=" + email;
	let url = encodeURI("scripts/checkBan.php" + querystring)
	xhr.open ('GET', url, true);
	xhr.send(null);
}

</script>

</header>
