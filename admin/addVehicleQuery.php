<?php
include("config.php");

    $makes = "";
    $types = "";
    $classes = "";
    $year = "";
    $model = "";
    $price = "";


    
    if(isset($_POST)){
        $makes = $_POST['makes'];
        $types = $_POST['types'];
        $classes = $_POST['classes'];
        $year = $_POST['year'];
        $model = $_POST['model'];
        $price = $_POST['price']; 
    }

   

    $sql = "INSERT INTO `vehicles` (`year`, `model`, `price`, `make_id`, `type_id`, `class_id`) VALUES ('".$year."', '".$model."', ".$price.", ".$makes.", ".$types.", ".$classes.")";

    if ($conn->query($sql) === true) {
        echo "Success";
    }else{
        echo "Failed";
    }
?>