<?php include('header.php');
        if(!isset($_SESSION['userID'])){
            echo "<div class='row'>
                <div class='col-sm-12'>
                    <form action = 'javascript:;'  method = 'post' id='vehicleDataForm' name='vehicleDataForm'>
                        <div class='form-group'>
                            <label>Please enter your first name:</label>
                            <input type='text' class='form-control' value='' name='userID'>
                            <input type='submit' class='btn btn-primary' value='Submit'>
                        </div>
                    </form>
                </div>
                <hr/>
                <div class='row'>
                    <div class='col-sm-12'>
                        <label style='float:right;'>&#169; 2021 Zippy Used Autos</label>
                    </div>
                </div>
                
                <script>
                    $(function () {
                        $('form').on('submit', function (e) {  
                            e.preventDefault(); 
                            var formData = $(this).serialize();
                            $.ajax({
                                url: 'registerController.php',
                                method: 'post',
                                data: formData,
                                success: function (res) {
                                    window.location.href = 'register.php?action=register';
                                },
                                error: function (res) {
                                    window.location.href = 'index.php?action=register';
                                }
                            });
                        });
                    });
                </script>
            ";
        }else{
            echo "
                <div class='row'>
                    <div class='col-sm-12'>
                        <h2> Thank you for registering, ". $_SESSION['userID'] ." ! </h2><br/><p><a href='index.php'>click here to view our vehicle list</p>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <label style='float:right;'>&#169; 2021 Zippy Used Autos</label>
                    </div>
                </div>  
            ";
        }
    

?>
    </body>
</html>