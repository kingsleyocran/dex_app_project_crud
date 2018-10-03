<?php 

require_once 'db_connect.php';

if($_POST) {
    // remove all session variables
    session_unset(); 

    // destroy the session 
    session_destroy(); 

    header('location: /DexApp/login.php');



}


?>