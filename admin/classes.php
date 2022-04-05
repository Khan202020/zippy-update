
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
                        url: 'getClassesData.php',
                        success: function (data) {
                            $('#dataFetched').html(data);
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
            <h4 style="color:orange;font-weight:800;">Vehicle Class List</h4>
            <div class="row">
                
                <div class="col-sm-12 verticle-20">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr> 
                        </thead>
                        <tbody id="dataFetched">
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-12">
                <h4 style="color:orange;font-weight:800;">Add Vehicle Class</h4>
                    <form action = "javascript:;"  method = "post" id="vehicleDataForm" name="vehicleDataForm">
                        <div class="form-group">
                           <label>Name:</label>
                           <input type="text" class="form-control" value="" name="name" id="name">

                            <div class="mid-col">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
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
                        url: 'addClass.php',
                        method: 'post',
                        data: formData,
                        success: function (res) {
                            if(res == "Success"){
                                alert("Class added successfully");
                            }else{
                                alert("Try again later");
                            }
                        }
                    });
                });
            });

            function removeClass(id){
                $.ajax({
                        url: 'removeClass.php',
                        method: 'post',
                        data: {'id': id},
                        success: function (res) {
                            if (res == "Success") {
                                alert("Class Removed");
                            }else{
                                alert("Try again later");
                            }
                        }
                    });
            }

        </script>
    </body>
</html>