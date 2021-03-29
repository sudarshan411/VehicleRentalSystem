<?php
    require('config/def.php');
    require('config/db.php');
    
    include('inc/header.php');
    include('inc/modals.php');

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
    <br>
    <div class="container">
        <h1>Welcome to the Vehicle Rental System</h1>
        <a href= "<?php echo ROOT_URL ?>/add_vehicles.php" class="btn btn-primary">Add a vehicle</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <?php include('inc/log_scripts.php'); ?>

</body>
</html>

