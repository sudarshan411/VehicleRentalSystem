

<?php
require('config/def.php');
require('config/db.php');

if(isset($_GET['mid'])) {
$delete_id = $_GET['mid'];

$result = $conn->prepare("DELETE FROM Model WHERE m_id = '$delete_id'");
if(!$result){
    echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
 }

if($result->execute()) {
header('Location: admin_dashboard.php');
} else {
echo '<br>MySQLi error: '.mysqli_error($conn);
}
}
mysqli_close($conn);
?>