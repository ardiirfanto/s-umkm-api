<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors',1);

if(!$_SESSION['token']){
    header("Location:web/login");
} else {
    header("Location:web/home");
}
