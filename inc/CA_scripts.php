<script>  
    $(document).ready(function(){  
        $('#CA_button').click(function(){  
            
            var email = $('#CA_email').val();  
            var password = $('#CA_password').val();
            var name = $('#CA_u_name').val();  
            var utype = $('#CA_u_type').val();
            var phone = $('#CA_phone_no').val();  
            var address = $('#CA_address').val();  
            if(email != '' && password != '' && name != '' && utype != '' && phone != '' && address != '')  
            {
                $.ajax({  
                    url:"inc/CA_service.php",  
                    method:"POST",  
                    data: {email:email, password:password, name:name, utype:utype, phone:phone, address:address},  
                    success:function(response)  
                    {   
                        if(response == "Account Exists"){

                            alert("Account with given email ID already exists");
                        }
                        else if(response == "Creation success"){

                            alert("Account created. Login success");
                            $('#loginModal').hide();
                            $('#CA_Modal').hide();  
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
                    alert("All Fields are required");  
            }  
            
        }); 
    });  
 </script> 