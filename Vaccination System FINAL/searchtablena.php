<?php
    $con= new mysqli("localhost","root","","vaccinationsystem");
    $firstname = $_POST['search'];
    $lastname = $_POST['search'];
    $category = $_POST['search'];
    $query = "SELECT * FROM personaldetails WHERE firstname LIKE '%{$firstname}%' OR lastname LIKE '%{$lastname}%' OR category LIKE '%{$category}%'";

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    $result = mysqli_query($con, "SELECT * FROM personaldetails WHERE firstname LIKE '%{$firstname}%' OR lastname LIKE '%{$lastname}%' OR category LIKE '%{$category}%'");
    mysqli_close($con);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="vscss.css">
    <link rel="stylesheet" type="text/css" href="vscss2.css">
</head>
<body>
    <button class="backbtn"><a class="lgn" href="index.php">GO BACK</a></button>
    <h1 style="color: white; text-align: center;">SEARCH RESULTS</h1>

    <div class="tablecont">
        <font color="white">
        <table style="width: 98%;">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Middle Name</th>
                <th>Category</th>
                <th>Address</th>
                <th>First Dosage</th>
                <th>Second Dosage</th>
            </tr>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td style="text-align: center"><?php echo $row['firstname']; ?></td>
                <td style="text-align: center"><?php echo $row['lastname']; ?></td>
                <td style="text-align: center"><?php echo $row['middlename'] ?></td>
                <td style="text-align: center"><?php echo $row['category'] ?></td>
                <td style="text-align: center"><?php echo $row['address'] ?></td>
                <td style="text-align: center"><?php echo $row['firstdose'] ?></td>
                <td style="text-align: center"><?php echo $row['seconddose'] ?></td>
            </tr>
        <?php } ?>
        </table>
</body>
</html>