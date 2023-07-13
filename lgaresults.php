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
        include 'connection/connection.php';

    // declare counting variables before the loop
        $pdp = 0;
        $dpp= 0 ;
        $acn= 0 ;
        $ppa= 0 ;
        $cdc= 0 ;
        $jp = 0;
        $anpp = 0; 
        $labour = 0;
        $cpp = 0;

        // Retrieve Local_govt_id using the loc_govt name
        $checkLgaId = mysqli_query($conn, "SELECT `lga_id` FROM `lga` WHERE `lga_name`='$lganame'");
        $fetchLgaId= mysqli_fetch_array($checkLgaId);
        $lgaId = $fetchLgaId['lga_id'];

        // Retrieve the unique id from the polling_unit_tab using loc_govt id
        $checkPollingUnitsQuery = mysqli_query($conn, "SELECT `uniqueid` FROM `polling_unit` WHERE `lga_id`='$lgaId'");
        $countPollingUnits= mysqli_num_rows($checkPollingUnitsQuery);


        while($fetchPollingUnits= mysqli_fetch_array($checkPollingUnitsQuery)){
        $pollingUnitUniqueId = $fetchPollingUnits['uniqueid'];

            
        $checkForResultsQuery = mysqli_query($conn, "SELECT * FROM `announced_pu_results` WHERE `polling_unit_uniqueid`='$pollingUnitUniqueId'");
        $countForResults= mysqli_num_rows($checkForResultsQuery);
        while($fetchForResults= mysqli_fetch_array($checkForResultsQuery)){
        $partyab = $fetchForResults['party_abbreviation'];
        $partypo = $fetchForResults['party_score'];

        if ($partyab === "PDP") {
        $pdp += $partypo;
        }
        if ($partyab == "DPP") {
        $dpp += $partypo;
        }
        if ($partyab == "ACN") {
        $acn += $partypo;
        }
        if ($partyab == "PPA") {
        $ppa += $partypo;
        }
        if ($partyab == "CDC") {
        $cdc += $partypo;
        }
        if ($partyab == "JP") {
        $jp += $partypo;
        }
        if ($partyab == "ANPP") {
        $anpp += $partypo;
        }  
        if ($partyab == "LABO") {
        $labour += $partypo;
        }
        if ($partyab == "CPP") {
        $cpp += $partypo;

        }

        }

        }

        echo $pdp ; echo " :"; echo "PDP";echo "<br>";
        echo $dpp ; echo " :"; echo "DPP";echo "<br>";
        echo $acn ; echo " :"; echo "ACN";echo "<br>";
        echo $ppa ; echo " :"; echo "PPA";echo "<br>";
        echo $cdc ; echo " "; echo "CDC";echo "<br>";
        echo $jp ; echo " :"; echo"JP";echo "<br>";
        echo $anpp ; echo " :"; echo "ANPP";echo "<br>";
        echo $labour; echo " :"; echo "LABO";echo "<br>";
        echo $cpp; echo " :"; echo "CPP";echo "<br>";

        $totalVotes = $pdp+$dpp+$acn+$ppa+$cdc+$jp+$anpp+$labour+$cpp;
        echo "A Total Number of " . $totalVotes . " People voted in " . $lganame;
        ?>
    <br>
        <a href="question2.php">
            <button>
                BACK
            </button>
        </a>
</body>
</html>