<?php  

//define('PROJECT_DIR', str_replace('\\', '/', realpath(dirname(__FILE__).'\\..')));

require('../config/def.php');
require('../config/db.php');
//require('../config/session.php');

//var_dump($_POST);

if(isset($_POST['email']))  
{
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $password = mysqli_real_escape_string($conn, $_POST['password']);

     $query = "SELECT * FROM Users WHERE email = '$email'";

     $stmt = $conn->prepare($query) ;
     $stmt->execute();
     $result = $stmt->get_result();
     $tuples = $result->fetch_all($resulttype = MYSQLI_ASSOC);

     if(empty($tuples)){

          printf("No account");  
     }  
     else if(count($tuples, 0) == 1){

          if($tuples[0]['passw'] == $password){

               $_SESSION['login_state'] = true;
               $_SESSION['user_email'] = $email;
               echo 'Login success';
          }
          else{

               echo 'Wrong password';
          }
     }
     else{

          die("DB error multiple users with same email ID found");
     }

     unset($_POST['email']);     
     unset($_POST["action"]);
}  

if(isset($_POST["action"]))  
{  
     $_SESSION['login_state'] = false;  
     
     unset($_SESSION["email"]);  
     unset($_POST["action"]);
}
