<?php
    include("config.php");


    $sql = "SELECT * FROM classes";
    $result = $conn->query($sql);
    $response = "";

    if ($result->num_rows > 0) {
        $addStr = 'this.attributes["id"].value';
        while($row = $result->fetch_assoc()) {
            $response .= "<tr><td>".$row['class']."</td><td><button id=".$row['id']." class='btn btn-danger' onclick='removeClass(".$addStr.");'> Remove </button></td></tr>";
        }
    }

   
    $conn->close();
    echo $response;
?>