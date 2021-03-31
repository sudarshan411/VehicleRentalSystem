<script>  

    $(document).ready(function(){  
        $("a[class$='book_now']").click(function(){
            var license = $(this).attr('id');
            
            <?php if( !isset($_SESSION['login_state']) || !$_SESSION['login_state']) : ?>

                alert("Please login to rent a vehicle");

            <?php elseif($_SESSION['u_type'] == "admin") : ?>

                alert("Only customers can book vehicles");

            <?php else : ?>

                alert("Redirecting to bookings page");
                $.ajax({
                    url: "<?php echo ROOT_URL.'inc/book_service.php';?>",
                    method: "POST",
                    data : {
                        license : license
                    },
                    success: function() {
                        <?php
                            $_SESSION['booking_request'] = true;
                        ?>
                        window.location.href = "<?php echo ROOT_URL.'inc/book_service.php';?>";
                    }
                })

                //$.redirect =function (url, values, method, target);
                
            <?php endif ?>
        }); 
    });
 </script> 