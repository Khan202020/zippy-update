<?php include('header.php');?>
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

            <hr/>
            <div class="row">
                <div class="col-sm-12">
                    <label style="float:right;">&#169; 2021 Zippy Used Autos</label>
                </div>
            </div>
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
        </script>
    </body>
</html>