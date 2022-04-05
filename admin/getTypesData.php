<?php
    include("config.php");


    $sql = "SELECT * FROM types";
    $result = $conn->query($sql);
    $response = "";

    if ($result->num_rows > 0) {
        $addStr = 'this.attributes["id"].value';
        while($row = $result->fetch_assoc()) {
            $response .= "<tr><td>".$row['type']."</td><td><button id=".$row['id']." class='btn btn-danger' onclick='removeType(".$addStr.");'> Remove </button></td></tr>";
        }
    }

   
    $conn->close();
    echo $response;
?>