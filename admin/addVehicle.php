
<?php
    include("config.php");

?>


<html>
    <head>
        <title>Zippy Admin</title>
        
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/mystyle.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

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
            <h1>Zippy Admin</h1>
            <hr/>
            <h4 style="color:orange; font-weight:800;">Add Vehicle</h4>
            <div class="row">
                <form action = "javascript:;"  method = "post" id="addVehicleForm" name="addVehicleForm">
                    <div class="col-sm-12">
                        
                        <div class="form-group">
                            <label>Make:</label>
                            <select class="form-control" name="makes" id="makes" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Type:</label>
                            <select class="form-control" name="types" id="types" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Class:</label>
                            <select class="form-control" name="classes" id="classes" required> 
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Year:</label>
                            <input class="form-control" type="text" value="" name="year" id="year" required>
                        </div>

                        <div class="form-group">
                            <label>Model:</label>
                            <input class="form-control" type="text" value="" name="model" id="model" required>
                        </div>

                        <div class="form-group">
                            <label>Price:</label>
                            <input class="form-control" type="text" value="" name="price" id="price" required>
                        </div>

                       
                    </div>
                    <div class="col-sm-12 mid-btn">
                        <input type="submit" value="Add Vehicle" class="btn btn-primary btn-margin">
                    </div>
                    
                </form>
            </div>
            <?php include("footer.php");?>
        </div>



        <script>
            $(function () {
                $('form').on('submit', function (e) {  
                    e.preventDefault(); 
                    var formData = $(this).serialize();
                    console.log(formData);
                    $.ajax({
                        url: 'addVehicleQuery.php',
                        method: 'post',
                        data: formData,
                        success: function (res) {
                            if(res == "Success"){
                                alert("Vehicle added successfully");
                            }else{
                                alert("Try again later");
                            }
                            
                        }
                    });
                });
            });
        </script>
    </body>
</html>