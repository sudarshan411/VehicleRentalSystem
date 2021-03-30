<?php
require('config/def.php');
require('config/db.php');
//$u_id = $_SESSION['u_id'];
$queryi = "SELECT * FROM Bookings WHERE u_id = 1 AND returned = 0 ";
$result = $conn->query($queryi);
$conn->close();
?>
<?php include('inc/header.php');?>

<head>
<meta charset="UTF-8">
<title>Bookings</title>
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
<section class="container" style="justify-content: center; align-items:center">
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
while($rows=$result->fetch_assoc())
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
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>