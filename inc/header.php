<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="cars.css">
    <title>Vehicle Rental System</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="<?php echo ROOT_URL ?>">VRS</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navLinks">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">CATALOGUE</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">ABOUT US</a>
                </li>
                <li class="nav-item">
                <?php //echo "Loging state= ".($_SESSION['login_state']?'true':'false'); ?>
                <?php if(!isset($_SESSION['login_state']) || !$_SESSION['login_state']) : ?>
                    <li><a href="" class="nav-link" data-target="#loginModal" data-toggle="modal">LOG IN</a></li>
                <?php else : ?>
                    <li><a href="" class="nav-link" id="logout">LOG OUT</a></li>
                <?php endif; ?>
                </li>
            </ul>
        </div>
    </nav>