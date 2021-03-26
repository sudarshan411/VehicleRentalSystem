<?php

    require("config/def.php");
    require("config/db.php");
    require('config/session.php');
    
    include('inc/header.php');

    echo $_SESSION['previous_page'];

    if($_SERVER['HTTP_REFERER'] !== "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']){

        $_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];
    }
    
    /*if(isset($_POST['submit'])){

        
        $login_fail = true;     //Flag to indicate incorrect login credentials

        //$email
        //unset
        
        //$error = array();
        if(empty($v_type) || $v_type == " "){
            $error[] = 'You forgot to enter the vehicle type!';
        }
    }
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="cars.css">  -->


<body>
    
    <div class="text-center">
        <!-- Button HTML (to Trigger Modal) -->
        <a href="#loginModal" class="trigger-btn" data-toggle="modal">Click to Open Login Modal</a>
    </div>

    <!-- Modal HTML -->
    <div id="loginModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <form action="<?php echo ROOT_URL; ?>/dummy.php" method="post">
                    <div class="modal-header">				
                        <h4 class="modal-title">Login</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">				
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Password</label>                            
                            <input type="password" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo ROOT_URL; ?>/create_account.php" class="link-primary">Create Account</a>
                        <input type="submit" class="btn btn-primary pull-right" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</html>