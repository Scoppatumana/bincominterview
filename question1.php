<?php include 'connection/connection.php' ?>


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
    <label for="">Select The Polling Unit for Which you want to view Result</label>

   <form action="results.php" method="POST" enctype="multipart/form-data">
    <select id="pollingunit" name="pollingunit" required>
                                    
            <option value=""selected >Select Title</option>
            
            <?php

            // Retrieve all polling units from the polling unit tab
            $checkPollingUnitQuery=mysqli_query($conn, "SELECT * FROM `polling_unit`");
            while ($fetchPollingUnit=mysqli_fetch_array($checkPollingUnitQuery)){
                $pollingUnit= $fetchPollingUnit['polling_unit_name'];
                $pollingUnitUniqueId= $fetchPollingUnit['uniqueid'];
                $wardId = $fetchPollingUnit['ward_id'];
                $lgaId = $fetchPollingUnit['lga_id'];

        ?>
                                    
            <option value="<?php echo $pollingUnit ?>"><?php echo $pollingUnit ?></option>
            <?php   
            }
            ?>
            
        </select>

            <button type="submit">
            Submit
            </button>
           
   </form>

<a href="index.php">
<button >
            BACK
    </button>
</a>

 

</body>
</html>