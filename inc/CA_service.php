<?php  

//define('PROJECT_DIR', str_replace('\\', '/', realpath(dirname(__FILE__).'\\..')));

require('../config/def.php');
require('../config/db.php');
session_start();

//var_dump($_POST);

if(isset($_POST['email']))  
{
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $password = mysqli_real_escape_string($conn, $_POST['password']);
     $utype = mysqli_real_escape_string($conn, $_POST['utype']);
     $name = mysqli_real_escape_string($conn, $_POST['name']);
     $phone = $_POST['phone'];
     $address = mysqli_real_escape_string($conn, $_POST['address']);

     $query = "SELECT * FROM Users WHERE email = '$email'";

     $stmt = $conn->prepare($query) ;
     $stmt->execute();
     $result = $stmt->get_result();
     $tuples = $result->fetch_all($resulttype = MYSQLI_ASSOC);

     if(!empty($tuples)){
          printf("Account Exists");  
     }  
     else{

        //Calcultion of m_id
        $result = $conn->prepare("SELECT u_id FROM Users");
        $result->execute();
        $uid_array = [];
        foreach ($result->get_result() as $row)
        {
            $uid_array[] = $row['u_id'];
        }
        sort($uid_array);

        $j = 1;
        foreach ($uid_array as $i) {
            if($j != $i){
                break;
            }
            $j++;
        }
        $u_id = $j;

        //Inserting user tuple to table
        $stmt = $conn->prepare("INSERT INTO Users VALUES('$u_id', '$name', '$utype', '$email', '$password', '$phone', '$address')");

        if($stmt->execute()){

            $_SESSION['login_state'] = true;
            $_SESSION['u_id'] = $u_id;
            $_SESSION['u_type'] = $utype;

            echo 'Creation success';
        }
     }
    //  else{

    //       die("DB error multiple users with same email ID found");
    //  }

     unset($_POST['email']);     
     //unset($_POST["action"]);
}  