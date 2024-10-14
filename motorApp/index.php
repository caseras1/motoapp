<?php

session_start();
require('./config.php');
require('./Modules/functies.php');

$pdo = ConnectDB();

if(!empty($_GET['PaginaNr'])) {
    $PaginaNr = $_GET['PaginaNr'];
} else {
    $PaginaNr = NULL;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Motorapp</title>
</head>
<body>
        <nav>
            <?php
                require('./Modules/menu.php')
            ?>
        </nav>

    <div class="mainWrapper">
        <div id="Banner">
            <main>
                

                <?php
                
                    switch($PaginaNr)
                    {
                        case 1:
                            require('./Modules/overOns.php');
                            break;
                        case 2:
                            require('./Modules/routes.php');
                            break;
                        case 3:
                            require('./Modules/store.php');
                            break;
                        case 4:
                            require('./Modules/evenementen.php');
                            break;
                        case 5:
                            require('./Modules/public_chat.php');
                            break;
                        case 6:
                            require('./Modules/registreren.php');
                            break;
                        case 7:
                            require('./Modules/profile.php');
                            break;
                        case 98:
                            require('./Modules/inloggen.php');
                            break;
                        default:
                            require('./Modules/home.php');
                            break;
                    }
                
                ?>

            </main>
        </div>
    </div>

</body>
</html>