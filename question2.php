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
    

<label for="">Select The Local Government for Which you want to view Result</label>

   <form action="lgaresults.php" method="POST" enctype="multipart/form-data">
        <select id="lganame" name="lganame" required>
                                        
            <option value=""selected >Select Title</option>
            
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
        </select>

        <button type="submit">
        Submit
        </button>
    </form>

   <a href="index.php">
        <button>
            BACK
        </button>
   </a>
</body>
</html>