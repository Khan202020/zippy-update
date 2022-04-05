<?php
    include("config.php");


    $sql = "SELECT * FROM makes";
    $result = $conn->query($sql);
    $response = "";

    if ($result->num_rows > 0) {
        $addStr = 'this.attributes["id"].value';
        while($row = $result->fetch_assoc()) {
            $response .= "<tr><td>".$row['make']."</td><td><button id=".$row['id']." class='btn btn-danger' onclick='removeMake(".$addStr.");'> Remove </button></td></tr>";
        }
    }

   
    $conn->close();
    echo $response;
?>