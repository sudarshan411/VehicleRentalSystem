<?php

    require('config/def.php');
    require('config/db.php');

    require('inc/header.php');
    echo "Reached";

    if(isset($_POST['license'])){

        $license = htmlentities($_POST['license']);
        echo $license;
    }

?>