<?php

if(session_status() === PHP_SESSION_NONE ){

    session_start();
    $_SESSION['login_state'] = false;
    $_SESSION['login_request'] = false;
}