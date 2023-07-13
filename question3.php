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
    
    <form action="insertion.php" method="POST" enctype="multipart/form-data">
        <label for="">Result Id</label><br>
        <input type="text" name="resultid" id="resultid" placeholder="Result Id"> <br>

        <label for="">Polling Unit</label><br>
        <select id="polling_unit" name="polling_unit" required>
            <option value=""selected >Select Polling Unit</option>
            <?php
            // Retrieve all polling units to the select box
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
        <br>


        <label for="">Local Government Area</label><br>
        <select id="locganame" name="locganame" required>
            <option value=""selected >Select Local Government Area</option>
            <?php
            // Retrieve all lga to the select box
            $checkLganameQuery=mysqli_query($conn, "SELECT * FROM `lga`");
            while ($fetchLga=mysqli_fetch_array($checkLganameQuery)){
                $lga= $fetchLga['lga_name'];
            ?>
            <option value="<?php echo $lga ?>"><?php echo $lga ?></option>
            <?php   
            }
            ?>
        </select><br>
        
        <label for="">Party Name</label><br>
        <select id="partyname" name="partyname" required>
            <option value=""selected >Select Party</option>
            <?php
            // Retrieve all parties to the select box
            $checkPartynameQuery=mysqli_query($conn, "SELECT * FROM `party`");
            while ($fetchParty=mysqli_fetch_array($checkPartynameQuery)){
                $party= $fetchParty['partyname'];
            ?>
            <option value="<?php echo $party ?>"><?php echo $party ?></option>
            <?php   
            }
            ?>
            
        </select><br>

        <label for="">Party Score</label><br>
        <input type="text" name ="partyscore" id ="partyscore" placeholder="Party Score"><br>

        <label for="">User name</label><br>
        <select id="username" name="username" required>
            <option value=""selected >Select User</option>
            <?php
            // Retrieve all agents to the select box
            $checkUserNameQuery=mysqli_query($conn, "SELECT * FROM `agentname`");
            while ($fetchUser=mysqli_fetch_array($checkUserNameQuery)){
                $user= $fetchUser['firstname'];
            ?>
            <option value="<?php echo $user ?>"><?php echo $user ?></option>
            <?php   
            }
            ?>
            
        </select><br>

  
            <button type="submit">
                SUBMIT
            </button>

            <a href="index.php">
            <button type="button">
                BACK
            </button>
            </a>
    </form>

</body>
</html>