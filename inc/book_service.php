<?php
    require('../config/def.php');
    require('../config/db.php');

    session_start();
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<?php

    if (isset($_POST['license']) && $_SESSION['u_type'] == "customer") : {
    
    echo "POST is successful";
    $_SESSION['requested_license'] = htmlentities($_POST['license']);
    }
    
    elseif(isset($_SESSION['booking_request']) && $_SESSION['booking_request'] && isset($_SESSION['login_state']) && $_SESSION['login_state'] && isset($_SESSION['requested_license']) && $_SESSION['u_type'] == "customer") : { 
       
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

        if(isset($_POST['submit'])){

            //$booking_date = DateTime::createFromFormat('m-d-Y', $_POST['return_date']);
            $booking_date = date_create($_POST['booking_date']);
            $return_date = date_create($_POST['return_date']);
            $days = date_diff($booking_date, $return_date, $absolute=false);
            $days = (int)$days->format("%r%a");

            if($days < 0){

                //Display error
                $error = 'Return date should be after or the same as booking date';
            }
            else{
                $amount = $vehicle['base'] + (($days >= 1)? (($days-1) * $vehicle['rate']) : 0);
                //echo 'Amount = '.$amount.', days= '.$days;

                $query = "SELECT COUNT(*) FROM BOOKINGS";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();

                $book_no = $result->fetch_all($resulttype=MYSQLI_NUM)[0][0];
                $license = $vehicle['license'];
                $u_id = $_SESSION['u_id'];
                $pickup_location = $_POST['pickup_location'];
                $book_date_string = mysqli_real_escape_string($conn, $_POST['booking_date']);
                $ret_date_string = mysqli_real_escape_string($conn, $_POST['return_date']);
                //echo $ret_date_string;

                $query = "INSERT INTO Bookings VALUE('$book_no', '$license', '$u_id', '$pickup_location', STR_TO_DATE('$book_date_string', '%Y-%m-%d'), STR_TO_DATE('$ret_date_string', '%Y-%m-%d'), '$amount', 0)";
                $stmt = $conn->prepare($query);
                if(!$stmt->execute()){
                    $error = 'Insert tuple error.';
                }
                else{

                    $query = "UPDATE Vehicles SET taken = 1 WHERE license = '$license'";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();

                    echo '<script>alert("Booking successful. Paid amount= '.$amount.' Redirecting to CATALOGUE"); window.location.href="'.ROOT_URL.'catalogue.php";</script>';
                }
            }
            

            //$_SESSION['booking_request'] = false;
            //unset($_SESSION['requested_license']);
        }

        //To display dynamic prize modification
        include('dynamic_prize.php');
?>

    
    <div class="container">
        <h1>Book Vehicle</h1>
        <div class="row">
            <div class="col" style="background-color: lightcyan">
                License: <?php echo $vehicle['license'];?>
            </div>
            <div class="col" style="background-color: lightgoldenrodyellow">
                Model: <?php echo $vehicle['model'];?>
            </div>
            <div class="col" style="background-color: lavender">
                Model Year: <?php echo $vehicle['model_year'];?>
            </div>
            <div class="col" style="background-color: lightgoldenrodyellow">
                Base Price: <?php echo $vehicle['base'];?>
            </div>
            <div class="col" style="background-color: lightcyan">
                Rate: <?php echo $vehicle['rate'];?>
            </div>
        </div>
        <?php if(!empty($error)): ?>
            <br>
    		<div class="alert <?php echo 'alert-danger'; ?>"><?php echo $error; ?></div>
    	<?php endif; ?>
        <form method="POST" name="booking_form" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                    <label for="pickup_location">Pickup Location</label>
                    <input type="text" name="pickup_location" id="pickup_location" class="form-control" aria-describedby="help1">
                    <small id="help1" class="form-text text-muted">Enter the location where you want the car delivered</small> 
            </div>
            <div class="row ">
                <div class="col-6 form-group">
                    <label for="booking_date">Booking Date</label>
                    <input type="date" name="booking_date" id="booking_date" class="form-control" aria-describedby="help2">
                    <small id="help2" class="form-text text-muted">Start date of rent</small> 
                </div>
                <div class="col-6 form-group">
                    <label for="return_date">Return Date</label>
                    <input type="date" name="return_date" id="return_date" class="form-control" aria-describedby="help3">
                    <small id="help3" class="form-text text-muted">End date of rent</small> 
                </div>
            </div>
            <!-- <div class="form-group">
                <label for="amount-display">Total Amount</label>
                <input type="number" id= "amount" class="form-control" placeholder= 0.00 readonly>
            </div> -->
            <div>
                <input type = "submit" name="submit" class="btn btn-warning float-right" value="Confirm Booking">
            </div>
        </form>
    </div>

<?php         
    }
    else : ?>
    <br>
    <div class= "container">
        <p>Not possible access booking directly. Select a vehicle from catalogue page!</p>
        <a href="<?php echo ROOT_URL; ?>catalogue.php" class="btn btn-primary">Catalogue Page</a>
    </div>

<?php endif ?>