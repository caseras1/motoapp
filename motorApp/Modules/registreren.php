<?php
//init Fields
$FirstName = $LastName = $Address = $ZipCode = $City = $PhoneNumber = $Email = $Username = $Password = $RetypePassword = NULL;

//init Error fields
$FnameErr = $LnameErr = $ZipErr = $CityErr = $TelErr = $MailErr = $UserErr = $PassErr = $RePassErr = NULL;

if(isset($_POST['Registreren'])) {
    $CheckOnErrors = false;

    $FirstName = $_POST['firstname'];
    $LastName = $_POST['lastname'];
    $Address = $_POST['address'];
    $ZipCode = $_POST['zipcode'];
    $City = $_POST['city'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Email = $_POST['email'];
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $RetypePassword = $_POST['RetypePassword'];

    //controleer het voornaam veld
    if(!is_Char_Only($FirstName)){
        $CheckOnErrors .= "Alleen letters toegestaan<br>";
    }
    
    if(!is_minlength($FirstName, 2)){
        $CheckOnErrors .= "Naam moet minstens 2 letters bevatten<br>";
    }

    //controleer het achternaam veld
    if(!is_Char_Only($LastName)){
        $CheckOnErrors .= "Alleen letters toegestaan<br>";
    }
    if(!is_minlength($LastName, 2)){
        $CheckOnErrors .= "Achternaam moet minstens 2 letters bevatten<br>";
    }

    //controleer het postcode veld    
    if(!is_NL_PostalCode($ZipCode)){
        $CheckOnErrors .= "Het moet een geldige postcode zijn<br>";
    }

    //controleer het plaats veld
    if(!is_Char_Only($City)){
        $CheckOnErrors .= "Alleen letters toegestaan<br>";
    }

    //controleer het telefoonnummer veld
    if(!is_NL_Telnr($PhoneNumber)){
        $CheckOnErrors .= "Het moet een geldig telefoonnummer zijn<br>";
    }

    //controleer het email veld
    if(!is_email($Email)){
        $CheckOnErrors .= "Het moet een bestaand emailadres zijn<br>";
    }

    //controleer het gebruikersnaam veld
    if(!is_Username_Unique($Username, $pdo)){
        $CheckOnErrors .= "Deze gebruikersnaam bestaat al<br>";
    }

    //controleer het wachtwoord veld
    if(!is_minlength($Password, 6)){
        $CheckOnErrors .= "Het wachtwoord moet minstens 6 tekens lang zijn<br>";
    }

    //controleer het herhaal wachtwoord veld
    if($Password !== $RetypePassword){
        $CheckOnErrors .= "Wachtwoorden komen niet overeen<br>";
    }

    // Einde controles

    if($CheckOnErrors != "") {
        require('./Forms/registrerenForm.php');        
        echo "<br>$CheckOnErrors";
    } else {
        // Formulier is succesvol gevalideerd

        //maak unieke salt
		$Salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        var_dump($Salt);

		//hash het paswoord met de Salt
		$Password = hash('sha512', $Password.$Salt);

        // Maak een prepared statement om gegevens in de database te registreren
        $parameters = array(
            ':firstname' => $FirstName,
            ':lastname' => $LastName,
            ':address' => $Address,
            ':zipcode' => $ZipCode,
            ':city' => $City,
            ':phonenumber' => $PhoneNumber,
            ':email' => $Email,
            ':username' => $Username,
            ':password' => $Password,
            ':salt' => $Salt,
            ':level' => 1
        );

        $sth = $pdo->prepare("INSERT INTO users(firstName, lastName, address, zipcode, city, phoneNumber, email, username, password, Salt, level) 
            VALUES (:firstname, :lastname, :address, :zipcode, :city, :phonenumber, :email, :username, :password, :salt, :level)");

        $sth->execute($parameters);

        echo "Succesvol geregistreerd!!";
        RedirectNaarPagina(5, 98);  // Redirect after successful registration
    }
} else {
    require('./Forms/registrerenForm.php');
}

?>
