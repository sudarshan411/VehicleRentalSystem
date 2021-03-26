<?php  

define('PROJECT_DIR', str_replace('\\', '/', realpath(dirname(__FILE__).'\\..')));

require('../config/def.php');
require('../config/db.php');

if(isset($_POST["email"]))  
{
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $password = mysqli_real_escape_string($conn, $_POST['password']);

     $query = "SELECT * FROM Users WHERE email = '$email'";

     $stmt = $conn->prepare($query) ;
     $stmt->execute();
     $result = $stmt->get_result();

     if(mysqli_num_rows($result) == 0)  
     {  
            
          echo 'Yes';  
     }  
     else if($result->fetch_all())
     {  
          $_SESSION['email'] = $_POST['email'];
          echo 'No';  
     }
}  
if(isset($_POST["action"]))  
{  
     unset($_SESSION["email"]);  
}  
