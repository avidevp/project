<?php
ini_set('display_errors', '1');

//----------database access----------------------------
include_once '../util.php';
//-----------------------------------------------------

$con=create_db_connection3();

/* select the latest entry in the table */
$sql="SELECT * FROM `temp_log` WHERE 1 order by `timestamp` desc limit 1";
$row=db_select_row($con,$sql);

close_db_connection($con);

$temp=floatval($row['temp']); 
$humidity = floatval($row['humidity']);
echo "<div> Temperature:$temp, Humidity:$humidity </div>";
?>