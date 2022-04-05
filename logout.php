<?php
 include('header.php');
if(isset($_GET['action'])){
    if($_GET['action'] == 'logout'){
       
    
        echo "
        <div class='row'>
            <div class='col-sm-12'>
                <h2> Thank you for signing out, ". $_SESSION['userID'] ." ! </h2><br/><p><a href='index.php'>click here to view our vehicle list</p>
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-12'>
                <label style='float:right;'>&#169; 2021 Zippy Used Autos</label>
            </div>
        </div>  
        ";
        unset($_SESSION['userID']);
        session_destroy();
    }
}
    
?>