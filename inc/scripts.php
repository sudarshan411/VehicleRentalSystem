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
                        if(response == "No account"){

                            alert("No account exists with given email ID. Please create one");
                        }
                        else if(response == "Wrong password"){

                            alert("Incorrect password. Try again.");
                        }  
                        else if(response == "Login success"){

                            alert("Login success. Login state= "+<?php echo ($_SESSION['login_state'])?'true':'false';?> + ", Set post action = "+)<?php echo $_POST['action']; ?>;
                            $('#loginModal').hide();  
                            location.reload();  
                        }
                        else{

                            //alert(jQuery.type(response));
                            alert(response);
                        }
                        //alert(response.val == "No");
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
                        alert("Login state= "+<?php echo ($_SESSION['login_state'])?'true':'false';?>);
                    }  
            });  
        });  
    });  
 </script> 