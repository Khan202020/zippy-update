<?php
include("config.php");

    $types = "";
    
    if(isset($_POST)){
        $types = $_POST['name'];
    }

    $sql = "INSERT INTO `types` (`type`) VALUES ('".$types."')";

    if ($conn->query($sql) === true) {
        echo "Success";
    }else{
        echo "Failed";
    }
?>