<?php
    include_once 'databaseconnection.php';
    $sql = "DELETE FROM personaldetails WHERE userid=" . $_GET["userid"] . "";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>