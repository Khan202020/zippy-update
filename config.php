<?php
     $servername = "wb39lt71kvkgdmw0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
     $username = "db3uuz111yrirx8p";
     $password = "wmp8xj9kuuwm1hr3";
     $dbname = "loft3z7lofvrolsr";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
