<?php
if(session_status() == PHP_SESSION_NONE ) : ?>
<script> alert("Starting session"); </script>
<?php
    //echo 'Starting session';
    session_start();
    $_SESSION['login_state'] = false;
    //$_SESSION['login_request'] = false;
    //$_SESSION['logout_request'] = false;

    endif;
?>