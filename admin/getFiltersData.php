<?php
    include("config.php");

    $resultArray = array();
    $makeArr = array();
    $typeArr = array();
    $classArr = array();

    $sql = "SELECT * FROM makes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($makeArr, array('id'=> $row['id'], 'makes' => $row['make']));
        }
    }

    $sql = "SELECT * FROM types";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($typeArr, array('id'=> $row['id'], 'types' => $row['type']));
        }
    }


    $sql = "SELECT * FROM classes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($classArr, array('id'=> $row['id'], 'classes' => $row['class']));
        }
    }

    array_push($resultArray, array("Makes"=> $makeArr, "Types" => $typeArr, "Classes" => $classArr));

    echo json_encode($resultArray);
    $conn->close();
?>