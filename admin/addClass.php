<?php
include("config.php");

    $classes = "";
    
    if(isset($_POST)){
        $classes = $_POST['name'];
    }

    $sql = "INSERT INTO `classes` (`class`) VALUES ('".$classes."')";

    if ($conn->query($sql) === true) {
        echo "Success";
    }else{
        echo "Failed";
    }
?>