<?php

    require('config/def.php');
    require('config/db.php');
    
    include('inc/header.php');
    //include('inc/modals.php');

    //Close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>

    <!-- Modal HTML -->
    <div id="loginModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">				
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">				
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Password</label>                            
                        <input type="password" name="password" id="password" class="form-control" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo ROOT_URL; ?>/create_account.php" class="link-primary">Create Account</a>
                    <button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="container">
        <h1>Welcome to the Vehicle Rental System</h1>
        <a href= "<?php echo ROOT_URL ?>/add_vehicles.php" class="btn btn-primary">Add a vehicle</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script>  
    $(document).ready(function(){  
        $('#login_button').click(function(){  
            var email = $('#email').val();  
            var password = $('#password').val();
            if(email != '' && password != '')  
            {
                $.ajax({  
                    url:"inc/log_service.php",  
                    method:"POST",  
                    data: {email:email, password:password},  
                    success:function(response)  
                    {   
                        if(response == "No")  
                        {  
                            alert("Wrong Data");
                        }  
                        else  
                        {  
                            $('#loginModal').hide();  
                            location.reload();  
                        }
                        alert(response.val == "No");
                        //alert(jQuery.type('No'));
                    } 
                });  
            }  
            else  
            {  
                    alert("Both Fields are required");  
            }  
        });  
        $('#logout').click(function(){  
            var action = "logout";  
            $.ajax({  
                    url:"inc/log_service.php",  
                    method:"POST",  
                    data:{action:action},  
                    success:function()  
                    {  
                        location.reload();  
                    }  
            });  
        });  
    });  
 </script> 
</body>
</html>

