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
    <div style="background-image: url('https://bestride.com/wp-content/uploads/2015/11/Buyer%e2%80%99s-Guide-10-Steps-to-Buying-a-Used-Car.jpg');
             background-size: cover; height:630px; padding-top: 15px; text-align: center; ">

        <img src="https://c8.alamy.com/comp/KWC0MM/car-rental-blue-design-for-your-application-or-logo-with-silhouette-KWC0MM.jpg" style="height:150px; border-radius: 50%; border: 10px solid #FEDE00;">
        <h1 style="font-size:90px; color: Yellow; margin:10px; font-family: 'Copperplate Gothic Bold', 'Copperplate Gothic Light', Copperplate, Balthazar;">Welcome To DrivePro Vehicle Rental Agency</h1>
        <p style="font-size:27px; color: Yellow;"><em>Your One stop Destination to rent Vehicles on the go at your convenience</em></p>

    </div>

    <?php require('inc/footer.php');?>

</body>
</html>