<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$std_id = $_GET['std_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM std_info WHERE std_id=$std_id");

//redirecting to the display page (index.php in our case)
header("Location:info.php");
?>

