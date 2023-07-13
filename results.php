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



// Retrieve the unique id from polling unit using polling unit name
$checkPollingUniqueId = mysqli_query($conn, "SELECT `uniqueid` FROM `polling_unit` WHERE `polling_unit_name`='$pollingunit'");
$fetchPollingUniqueId= mysqli_fetch_array($checkPollingUniqueId);
$UniqueId = $fetchPollingUniqueId['uniqueid'];


$getResultQuery=mysqli_query($conn, "SELECT * FROM `announced_pu_results` WHERE `polling_unit_uniqueid`='$UniqueId'");
$countResult=mysqli_num_rows($getResultQuery);



if($countResult < 1){
    echo "Voting did not take place in " . $pollingunit;
}

$count = 0;
while($getResult=mysqli_fetch_array($getResultQuery)){
$partyAbbreviation= $getResult['party_abbreviation'];
$partyScore= $getResult['party_score'];


?>
    <table>
        
        <tr>
        <?php echo $partyAbbreviation ?> :
        </tr>

        <tr>
        <?php echo $partyScore ?>
        </tr>
    </table>

<?php
$count += $partyScore;

}
echo "A Total Number of " . $count . " People voted in " . $pollingunit;

// ?>
<br>

<a href="question1.php">
    <button>
        BACK
    </button>
</a>
</body>
</html>