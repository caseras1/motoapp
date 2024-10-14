<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home </title>
    <link rel="stylesheet" href=",../style/main.css">
</head>
<body>
    <div class="image-container">
        <div class="blur"></div>
        <img src="./images/motormountain_2.jpg" class="featured-image" alt="Motorcycle">
        <div class="content">
            <!-- Correct the form action attribute -->
            <form action="./Modules/routes.php" method="POST">
                <h2>Start your adventure</h2>
                <br>
                <p>The beautiful roads of Europa</p>
                <br>
                <select name="region">
                    <option value="Europa">Europa</option>
                    <!-- Add more options here -->
                </select>
                <br>
                <br>
                <p>Length</p>
                <br>
                <select name="length_from">
                    <option value="0">from 0 km</option>
                    <!-- Add more options here -->
                </select>
                <br>
                <select name="length_to">
                    <option value="500">to 500 km</option>
                    <!-- Add more options -->
                </select>
                <br><br>
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
</body>
</html>
