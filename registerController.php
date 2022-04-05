<?php
    if(isset($_POST['userID'])){
        if ( ! session_id() ) @ session_start();
        if ( ! isset($_SESSION['userID'])){
            $_SESSION['userID'] = $_POST['userID']; 
        } 
          
    }
?>