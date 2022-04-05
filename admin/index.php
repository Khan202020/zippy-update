
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
            <div class="row">
                <div class="col-sm-12">
                    <form action = "javascript:;"  method = "post" id="vehicleDataForm" name="vehicleDataForm">
                        <div class="form-group">
                            <!-- Selection for makes -->
                            <select class="form-control" name="makes" id="makes">
                                <option value="all">View All Makes</option>
                            </select>


                             <!-- Selection for types -->
                            <select class="form-control" name="types" id="types">
                                <option value="all">View All Types</option>
                            </select>

                             <!-- Selection for classes -->
                            <select class="form-control" name="classes" id="classes">
                                <option value="all">View All Classes</option>
                            </select>

                            <div class="mid-col">
                                <label>Sort by: </label>
                                
                                <input type="radio" value="Price" name="sortBy" checked="true">
                                <label>Price</label>

                                <input type="radio" value="Year" name="sortBy">
                                <label>Year</label>

                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-12 verticle-20">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Year</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Type</th>
                                <th>Class</th>
                                <th>Price</th>
                            </tr> 
                        </thead>
                        <tbody id="dataFetched">
                        </tbody>
                    </table>
                </div>
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
                        url: 'getData.php',
                        method: 'post',
                        data: formData,
                        success: function (res) {
                            $('#dataFetched').html(res);
                        }
                    });
                });
            });

            function removeVehicle(id){
                $.ajax({
                        url: 'removeVehicle.php',
                        method: 'post',
                        data: {'id': id},
                        success: function (res) {
                            if (res == "Success") {
                                alert("Vehicle Removed");
                            }else{
                                alert("Try again later");
                            }
                        }
                    });
            }

        </script>
    </body>
</html>