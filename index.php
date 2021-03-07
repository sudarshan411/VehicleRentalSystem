<?php

    require('config/def.php');
    require('config/db.php');

    //Close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <a href= "<?php echo ROOT_URL ?>/booking.php">Rent a vehicle</a>
    <br>
    <a href= "<?php echo ROOT_URL ?>/add_vehicles.php">Add a vehicle</a>
    
</body>
</html>