
<?php
    session_start();
    include("config.php");
?>


<html>
    <head>
        <title>Zippy Used Cars</title>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mystyle.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script>
            $(function () {
                $(document).ready(function() {
                    $.ajax({
                        type: 'GET',
                        url: 'getFiltersData.php',
                        success: function (data) {
                            const obj = JSON.parse(data);
                            const makes = obj[0]['Makes'];
                            const types = obj[0]['Types'];
                            const classes = obj[0]['Classes'];

                            $.each( makes, function( key, value ) {
                                $('#makes').append($("<option></option>").attr("value", value['id']).text(value['makes']));
                            });

                            $.each( types, function( key, value ) {
                                $('#types').append($("<option></option>").attr("value", value['id']).text(value['types']));
                            });

                            $.each( classes, function( key, value ) {
                                $('#classes').append($("<option></option>").attr("value", value['id']).text(value['classes']));
                            });
                        }
                    });
                });
            });
        </script>
    </head>

    <body>
        <div class="container-fluid">
            <?php
            if(!isset($_GET)){
                if(!isset($_SESSION["userID"])){
                    echo "<br/><a href='register.php?action=register' style='float:right;'>Register</a>";
                }
            }else{
                if(isset($_GET['action']) &&  $_GET['action']== 'logout'){
                    echo "<br/><a href='register.php?action=register' style='float:right;'>Register</a>";
                }else{
                    if (!isset($_SESSION["userID"])) {
                        echo "<br/><a href='register.php?action=register' style='float:right;'>Register</a>";
                    } else {
                        echo "<br/><p style='float:right;'> Welcome " . $_SESSION['userID'] . "! ( <a href='logout.php?action=logout'>Sign Out</a> ) </p>";
                    }
                }
            } ?>     
            
            <h1>Zippy Used Autos</h1>
            <hr/>
