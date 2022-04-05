<?php
include("config.php");

    $makes = "";
    $types = "";
    $classes = "";
    $sortBy = "";


    $sql = "SELECT vehicles.*, makes.make, types.type, classes.class FROM vehicles INNER JOIN makes ON vehicles.make_id = makes.id INNER JOIN types ON vehicles.type_id = types.id INNER JOIN classes ON vehicles.class_id = classes.id";
    $whSQL = "";

    if(isset($_POST)){
        $makes = $_POST['makes'];
        $types = $_POST['types'];
        $classes = $_POST['classes'];

        if($makes != "all"){
            $whSQL .= "make_id = '".$makes."'";
        }

        if($types != "all"){
            if ($whSQL != "") {
                $whSQL .= " AND type_id = '".$types."'";
            }else{
                $whSQL .= "type_id = '".$types."'";
            }
        }

        if($classes != "all"){
            if ($whSQL != "") {
                $whSQL .= " AND class_id = '".$classes."'";
            }else{
                $whSQL .= "class_id = '".$classes."'";
            }
        }

        if (isset($_POST['sortBy'])) {
            $sortBy = strtolower($_POST['sortBy']);
        }else{
            $sortBy = "price";
        }
    }

    if($whSQL != ""){
        $sql = $sql." WHERE ".$whSQL." ORDER BY ".$sortBy." DESC";
    }else{
        $sql = $sql .=" ORDER BY ".$sortBy." DESC";
    }


    $result = $conn->query($sql);

    $response = "";
    if ($result->num_rows > 0) {
        $addStr = 'this.attributes["id"].value';
        while($row = $result->fetch_assoc()) {

            $response.="<tr>
                <td>".$row['year']."</td>
                <td>".$row['make']."</td>
                <td>".$row['model']."</td>
                <td>".$row['type']."</td>
                <td>".$row['class']."</td>
                <td> $".number_format((float)$row['price'], 2, '.', '')."</td>
                <td><button id=".$row['vehicle_id']." class='btn btn-danger' onclick='removeVehicle(".$addStr.");'> Remove </button></td>
            </tr>";
        }
    }

    echo ($response);
?>