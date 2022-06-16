<?php

include_once "../config.php";
session_start();
    
        if($_SESSION['username']){
            $conn = db();
            session_unset();
            session_destroy();

            echo "<script>alert('You have successfully logged out');
                    window.location = '../forms/login.html'; </script>";
        }
        






?>