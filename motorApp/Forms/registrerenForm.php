<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./style/forms.css">
	<title>Document</title>
</head>
<body>

<h1>Registreren</h1>

<div class="container">

	<form name="RegistratieFormulier" action="" method="post">
		<label for="firstname">Voornaam:</label>
		<input type="text" id="firstname" name="firstname" value="<?php echo $FirstName; ?>"/><?php echo $FnameErr; ?>

		<label for="lastname">Achternaam:</label>
		<input type="text" id="lastname" name="lastname" value="<?php echo $LastName; ?>" /><?php echo $LnameErr; ?>
		
		<label for="address">Adres:</label>
		<input type="text" id="address" name="address" value="<?php echo $Address; ?>" />

		<label for="zipcode">Postcode:</label>
		<input type="text" id="zipcode" name="zipcode" value="<?php echo $ZipCode; ?>" /><?php echo $ZipErr; ?>
		
		<label for="city">Plaats:</label>
		<input type="text" id="city" name="city" value="<?php echo $City; ?>" /><?php echo $CityErr;?>

		<label for="phonenumber">Telefoon nr.:</label>
		<input type="text" id="phonenumber" name="PhoneNumber" value="<?php echo $PhoneNumber; ?>" /><?php echo $TelErr; ?>

		<label for="email">E-mail:</label>
		<input type="text" id="email" name="email" value="<?php echo $Email; ?>" /><?php echo $MailErr; ?>

		<label for="username">Gebruikersnaam:</label>
		<input type="text" id="username" name="username" value="<?php echo $Username; ?>" /><?php echo $UserErr; ?>
		
		<label for="password">Wachtwoord:</label>
		<input type="password" id="password" name="password" /><?php echo $PassErr; ?>
		
		<label for="RetypePassword">Herhaal Wachtwoord:</label>
		<input type="password" id="RetypePassword" name="RetypePassword" /><?php echo $RePassErr; ?>
		
		<input type="submit" name="Registreren" value="Registreer!" />
	</form>
</div>
	
</body>
</html>