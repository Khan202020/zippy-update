<?php
    include("config.php");
    $sql = "DELETE FROM vehicles WHERE vehicle_id = ".  $_POST['id'];
    
    if ($conn->query($sql) === true) {
        echo "Success";
    }else{
        echo "Failed";
    }
?>