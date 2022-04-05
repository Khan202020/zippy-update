<?php
    include("config.php");
    $sql = "DELETE FROM makes WHERE id = ".  $_POST['id'];
    $sql1 = "DELETE FROM vehicles WHERE make_id = ".  $_POST['id'];
    
    if ($conn->query($sql) === true && $conn->query($sql1) === true) {
        echo "Success";
    }else{
        echo "Failed";
    }
?>