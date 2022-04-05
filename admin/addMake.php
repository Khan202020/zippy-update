<?php
include("config.php");

    $makes = "";
    
    if(isset($_POST)){
        $makes = $_POST['name'];
    }

    $sql = "INSERT INTO `makes` (`make`) VALUES ('".$makes."')";

    if ($conn->query($sql) === true) {
        echo "Success";
    }else{
        echo "Failed";
    }
?>