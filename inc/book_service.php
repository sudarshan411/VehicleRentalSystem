<?php
    require('../config/def.php');
    require('../config/db.php');

    session_start();
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<?php

    if (isset($_POST['license'])) : {
    
    echo "POST is successful";
    $_SESSION['requested_license'] = htmlentities($_POST['license']);
    }
    
    elseif(isset($_SESSION['booking_request']) && $_SESSION['booking_request'] && isset($_SESSION['login_state']) && $_SESSION['login_state'] && isset($_SESSION['requested_license'])) : { 

        $license = $_SESSION['requested_license'];
        $query = "SELECT * FROM Vehicles JOIN Model USING (m_id) WHERE license = '$license'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $tuples = $result->fetch_all($resulttype=MYSQLI_ASSOC);
        $vehicle = $tuples[0];

        if(empty($tuples)){

            echo 'Vehicle with supplied license not available';
        }

        //To display dynamic prize modification
        include('dynamic_prize.php');
?>

    <p>Booking in progress: <?php echo $vehicle['rate']; ?></p>
    <p>User id: <?php echo $_SESSION['u_id']; ?></p>
    <p>User type: <?php echo $_SESSION['u_type']; ?></p>
    
    <div class="container">
        <h1>Book Vehicle</h1>

        <form method="POST" name="booking_form" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                    <label for="pikup_location">Pickup Location</label>
                    <input type="text" name="pickup_location" id="pickup_location" class="form-control" aria-describedby="help1">
                    <small id="help1" class="form-text text-muted">Enter the location where you want the car delivered</small> 
            </div>
            <div class="row ">
                <div class="col-6 form-group">
                    <label for="booking_date">Booing Date</label>
                    <input type="date" name="booking_date" id="booking_date" class="form-control" aria-describedby="help2">
                    <small id="help2" class="form-text text-muted">Start date of rent</small> 
                </div>
                <div class="col-6 form-group">
                    <label for="return_date">Model Year</label>
                    <input type="date" name="return_date" id="return_date" class="form-control" aria-describedby="help3">
                    <small id="help3" class="form-text text-muted">End date of rent</small> 
                </div>
            </div>
            <div class="form-group">
                <label for="amount-display">Total Amount</label>
                <input type="number" id= "amount" class="form-control" placeholder= 0.00 readonly>
                <input name="data" id= "data" type="email">
            </div>
            <div>
                <input type = "submit" name="submit" class="btn btn-warning float-right" value="Confirm Booking">
            </div>
        </form>
    </div>

<?php 
        $_SESSION['booking_request'] = false;
        unset($_SESSION['requested_license']);
    }
    
    else : 
?>

    <br>
    <div class= "container">
        <p>Not possible access booking directly. Select a vehicle from catalogue page!</p>
        <a href="<?php echo ROOT_URL; ?>catalogue.php" class="btn btn-primary">Catalogue Page</a>
    </div>

<?php endif ?>