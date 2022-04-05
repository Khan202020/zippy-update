<?php
    // $servername = "s465z7sj4pwhp7fn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    // $username = "o1j2kuvlr36u1qbj";
    // $password = "vijrdis04xp94xje";
    // $dbname = "uzkpv5dhzbyyet3p";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zippyusedautos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>