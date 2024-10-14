<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/forms.css">
    <title>Login Form</title>
</head>
<body>
    <h1>Inloggen</h1>
    <div class="container_login">
        <?php echo '<br />'.$Error.'<br />';?>

        <form name="InlogFormulier" action="" method="post">
            <label for="username">Inlognaam:</label>
            <input type="text" id="username" name="username" required autocomplete="username" />

            <br />

            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" required autocomplete="current-password" />

            <br />

            <input type="submit" name="Inloggen" value="Log in!" />
        </form>

        <br />
        Heeft u nog geen account? Registreer dan <a href="index.php?PaginaNr=6">hier</a>.
    </div>
</body>
</html>
