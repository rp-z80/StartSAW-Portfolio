	function checkUser(username)
	{
		xhr = getXMLHttpRequestObject();

		xhr.onreadystatechange = function () 
		{
			let el = document.getElementById("userError");

			if ((xhr.readyState == 4) & (xhr.status == 200))
			{
				el.innerHTML = xhr.responseText;

				if(xhr.responseText == "Username already taken")
				{	
					document.getElementById("submit").disabled = true;
				}
				
				else
				{
					document.getElementById("submit").disabled = false;
					checkEmail(document.getElementById("email").value);			//chiama checkEmail perchè se user è giusto e non controlla anche mail abilita il bottone anche se la mail è sbagiata
				}
			}
				
		}

		let querystring = "?username=" + username;
		let url = encodeURI("scripts/checkUser.php" + querystring);
		xhr.open('GET', url, true);
	    xhr.send(null);
	}


	function checkEmail(email)
	{
		xhr = getXMLHttpRequestObject();

		xhr.onreadystatechange = function () 
		{
			let el = document.getElementById("emailError");

			if ((xhr.readyState == 4) & (xhr.status == 200))
			{
				el.innerHTML = xhr.responseText;

				if(xhr.responseText == "Email already registered")
				{
					//document.getElementById("submit").disabled = true;
					document.getElementById("email").setCustomValidity("Email already registered");
				}

				else
				{
					document.getElementById("email").setCustomValidity("");
					//checkUser(document.getElementById("username").value);
				}
			}
		}


		let querystring = "?email=" + email;
		let url = encodeURI("scripts/checkEmail.php" + querystring);
		xhr.open('GET', url, true);
	    xhr.send(null);
	}


	function validatePasswords(password, confirmPassword)
	{
		if (password != confirmPassword)
			document.getElementById("cpassword").setCustomValidity("Passwords don't match");

		else
			document.getElementById("cpassword").setCustomValidity('');
	}