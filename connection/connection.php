<?php 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
header("Acces-Contorl-Allow-Origin");/// to call API and clear the error from web-page
   

    // Database Configuration //
    $main_server = "localhost";
    $server_username = "root";
    $server_password = "";

    // Create Connection //
    $conn = mysqli_connect($main_server, $server_username, $server_password) or die("connection error");
    mysqli_select_db($conn, "bincom_test");
?>


<?php 

    // variable declaration  //

   
     $pollingunit=trim($_POST['pollingunit']);
     $lganame=trim($_POST['lganame']);
     $resultid = trim($_POST['resultid']);
     $polling_unit = trim($_POST['polling_unit']);
     $locganame = trim($_POST['locganame']);
     $partyname = trim($_POST['partyname']);
     $partyscore = trim($_POST['partyscore']);
     $username = trim($_POST['username']);
    
    
?>