<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$dept_id = $_GET['dept_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM department WHERE dept_id=$dept_id");

//redirecting to the display page (index.php in our case)
header("Location:info_department.php");
?>

