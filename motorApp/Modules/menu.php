<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <link rel="stylesheet" href="./style/menu.css">
    <link rel="stylesheet" href="./style/main.css">

    <title>Menu</title>
</head>
<body>


<div id="menuWrapper">
        <nav>
            <ul>
                <li><a href="?PaginaNr=0">Home</a></li>
                <li><a href="?PaginaNr=1">Over Ons</a></li>
                <li><a href="?PaginaNr=2">Routes</a></li>
                <li><a href="?PaginaNr=3">Store</a></li>
                <li><a href="?PaginaNr=4">Events</a></li>
                <li><a href="?PaginaNr=5">Public Chat</a></li>
                <li><a href="?PaginaNr=6">Registreren</a></li>
                <li><a href="?PaginaNr=98">Inloggen</a></li>
            </ul>
        </nav>
    </div>

<script>
    
    document.addEventListener("DOMContentLoaded", function() {
    var routesMenu = document.getElementById("routesMenu");
    var dropdown = routesMenu.querySelector("ul");

    routesMenu.addEventListener("mouseenter", function() {
        dropdown.style.display = "block";
    });

    routesMenu.addEventListener("mouseleave", function() {
        dropdown.style.display = "none";
    });
});


</script>

</body>
</html>

<?php

$Level = 0; // default level 0
$MenuInUitloggen = '<li><a href="index.php?PaginaNr=98">Inloggen</a></li>'; // default menuknop inloggen

if(LoginCheck($pdo))
{
	//gebruiker is ingelogd, level wordt veranderd in Level uit Sessie
	$Level = $_SESSION['level'];

	//knop inloggen wordt veranderd in knop uitloggen
	$MenuInUitloggen = '<li><a href="index.php?PaginaNr=99">Uitloggen</a></li>';
}

/*  
	Opdracht PM09 STAP 3: menu op basis van gebruikers levels 
	Omschrijving: Maak een prepared statement waarbij je de menu items opvraagd die de gebruiker op basis van zij/haar level mag zien. Zorg er vervolgens voor dat deze netjes op het scerm worden getoond.
*/

//bouw query
$parameters = array(':Level'=>$Level);
$sth = $pdo->prepare('select * from menu where Level <= :Level');

$sth->execute($parameters);

/*  
	Opdracht PM09 STAP 4 : menu op basis van gebruikers levels 
	Omschrijving: Verwijder tot slot de basiscode die we gemaakt hebben in opdracht 2.03 hieronder
*/

//menu opbouwen en op scherm tonen
echo '<ul id="menu">';
echo '	<li><a href="index.php">Home</a></li>';//Standaard Homepage

while($row = $sth->fetch())
{
	//menu items uit DB
	echo '	<li><a href="index.php?PaginaNr='.$row['PaginaNr'].'">'.$row['Tekst'].'</a></li>';
}

//knop in of uitloggen obv de hierboven gezette var MenuInUitloggen
echo $MenuInUitloggen;

echo '</ul>';

?>