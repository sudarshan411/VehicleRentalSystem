<?php

require('config/def.php');
require('config/db.php');



if(isset($_GET['book_no'])) {

$delete_book = $_GET['book_no'];
$result = $conn->prepare("UPDATE Bookings SET returned=1 WHERE book_no = '$delete_book'");
if(!$result){
    echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
}
$result->execute();

$result1 = $conn->prepare("UPDATE Vehicles SET taken = 0 WHERE license IN
(SELECT license FROM Bookings WHERE book_no = '$delete_book')");

$result1->execute();
if($result && $result1) {

header('Location: customer_dashboard.php');
} else {
echo '<br>MySQLi error: '.mysqli_error($conn);
}
}

mysqli_close($conn);

?>