<?php
    require('config/def.php');
    require('config/db.php');
    include('inc/header.php');

    if(!$_SESSION['login_state']){

        header('Location: '.ROOT_URL);
    }
    
    $u_id = $_SESSION['u_id'];
    $stmt = $conn->prepare("SELECT * FROM Bookings WHERE u_id = '$u_id' AND returned = 0 ");
    $stmt->execute();
    $result = $stmt->get_result();
    if($result){
        $bookings = $result->fetch_all($resulttype=MYSQLI_ASSOC);
    }
    
?>

<head>
    <meta charset="UTF-8">
    <title >Bookings</title>
    <style>
        table {
        margin: 0 auto;
        font-size: large;
        border: 1px solid black;
        margin-top:30px;
        margin-left:20px ;
        }
        h1 {
        text-align: center;
        color: #000000;
        font-size: xx-large;
        font-family: "Times New Roman", Times, serif;
        }
        td {
        background-color: aquamarine;
        border: 1px solid black;
        }
        th,
        td {
        font-weight: bold;
        border: 1px solid black;
        padding: 10px;
        text-align: center;
        }
        td {
        font-weight: lighter;
        }
    </style>
</head>
<body>
    <div class="container" style="justify-content: center; align-items:center">
    <div class="row">
        <div class="col-8" style="background-color: aquamarine; justify-content: center; align-items: center; display: flex;">
            Hello Customer! This is where you can see your information and booking details!
          </div>
          <div class="col-4">
            <?php 
                $result_user = $conn->prepare("SELECT u_name, email, phone_number FROM Users WHERE u_id = '$u_id'");
                $result_user->execute();
                $res = $result_user->get_result();
                if(!$res){

                    echo 'MySQLi error:- '.mysqli_error($conn);
                }
                
                $users = $res->fetch_all($resulttype=MYSQLI_ASSOC);

            ?>
                <?php foreach($users as $user) : ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        
                        <h5 class="card-title"><?php echo $user['u_name']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $user['email'];?></h6>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <h6 class="card-text"><?php echo $user['phone_number'];?></h6>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
    </div>
    <br>
    <h1>Bookings</h1>
    <table>
    <tr>
    <th>License</th>
    <th>Pickup Location</th>
    <th>Booking date</th>
    <th>Return date</th>
    <th>Amount</th>
    <th>Remove booking</th>
    </tr>
    <?php
    foreach($bookings as $rows)
    {
    ?>
        <tr>
        <td><?php echo $rows['license'];?></td>
        <td><?php echo $rows['pikup_location'];?></td>
        <td><?php echo $rows['booking_date'];?></td>
        <td><?php echo $rows['return_date'];?></td>
        <td><?php echo $rows['amount'];?></td>
        <td><a href="delete_booking.php?book_no=<?php echo $rows['book_no'];?>">Return Vehicle</a></td>
        </tr>
    <?php
    }

    ?>
    </table>
    <?php
    if(empty($bookings)) :?>
        <br>
        <div class="alert <?php echo 'alert-warning'; ?>">You have no bookings yet</div>
    <?php endif;

    ?>
    </div>
    <?php require('inc/footer.php');?>
</body>
</html>