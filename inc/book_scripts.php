<script>  

    function redirectPost(url, data) {
        var form = document.createElement('form');
        document.body.appendChild(form);
        form.method = 'post';
        form.action = url;
        for (var name in data) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = data[name];
            form.appendChild(input);
        }
        form.submit();
        alert("Still here");
    }

    $(document).ready(function(){  
        $("a[class$='book_now']").click(function(){
            var license = $(this).attr('id');
            
            <?php if( !isset($_SESSION['login_state']) || !$_SESSION['login_state']) : ?>
                alert("Please login to rent a vehicle");
            <?php else : ?>
                alert("Redirecting to bookings page");
                <?php
                    
                ?>
                
            <?php endif ?>
        }); 
    });  
 </script> 