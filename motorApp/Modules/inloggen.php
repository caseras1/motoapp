<?php
// Function to log in the user
function login($username, $password, $pdo) 
{
    // Prepare the SQL query to check if the username exists
    $parameters = array(':username' => $username);
    $sth = $pdo->prepare('SELECT user_id, username, password, Salt, level FROM users WHERE username = :username LIMIT 1');
    $sth->execute($parameters); // Execute the query

    // Check if the username exists in the database
    if ($sth->rowCount() == 1) 
    {
        // Fetch user data from the query result
        $row = $sth->fetch();

        // password hashen
        $password = hash('sha512', $password . $row['Salt']);

        // Use password_verify to check the password
        if ($row['password' == $password]) 
        {
            $user_browser = $_SERVER['HTTP_USER_AGENT'];

            // Set session variables for the logged-in user
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $row['level'];
            $_SESSION['login_string'] = hash('sha512', $row['password'] . $user_browser);
            
            return TRUE; // Successful login
        } 
        else 
        {
            return FALSE; // Password mismatch
        }
    } 
    else 
    {
        return FALSE; // Username not found
    }
}

// Begin page logic
$Error = NULL;

// Check if the login form has been submitted
if (isset($_POST['Inloggen'])) 
{
    // Get the posted username and password
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    // Call the login function and handle the result
    if (login($Username, $Password, $pdo)) 
    {
        echo "U bent succesvol ingelogd";
        RedirectNaarPagina(5); // Dit blijft jouw bestaande redirect functie
    } 
    else 
    {
        // Set an error message if login failed
        $Error = "De inlognaam of het wachtwoord is onjuist.";
        require('./Forms/inloggenForm.php');
    }
} 
else 
{
    // If the form has not been submitted, show the login form
    require('./Forms/inloggenForm.php');
}

?>


