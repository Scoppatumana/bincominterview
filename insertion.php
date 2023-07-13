<?php include 'connection/connection.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
        <?php

    // Check If the Primary key in the input exists
        $checknumber_query=mysqli_query($conn, "SELECT * FROM `announced_pu_results` WHERE `result_id`='$resultid'");
        $checknumber=mysqli_num_rows($checknumber_query);

        if( $checknumber > 0 ){
        ?>

            <script>
                alert('Unique Id Exists');
                window.parent(location="question3.php")
            </script>
        <?php
        }
        
        // Retrieve the unique polling unit id using the polling unit name
        $checkPollingUniqueId = mysqli_query($conn, "SELECT `uniqueid` FROM `polling_unit` WHERE `polling_unit_name`='$polling_unit'");
        $fetchPollingUniqueId= mysqli_fetch_array($checkPollingUniqueId);
        $UniqueId = $fetchPollingUniqueId['uniqueid'];


         // Insert into the Announce Polling Unit Result Tab
        mysqli_query($conn, "INSERT INTO `announced_pu_results`
        (`result_id`, `polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`, `date_entered`, `user_ip_address`) VALUES 
        ('$resultid','$UniqueId','$partyname','$partyscore','$username', NOW() ,'192.168.1.101')")
        or die('cannot insert into Announced Polling Unit Result');

        // If Successful Print this
        echo "Insertion Successful";
        
        ?>
        <br>

        <a href="question3.php">
            <button>
                BACK
            </button>
        </a>
</body>
</html>