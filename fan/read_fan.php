<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access-control-allow-origin, content-type");
header("Content-Type: application/x-www-form-urlencoded; charset=UTF-8");
ini_set('display_errors', '1');

//----------database access----------------------------
include_once '../util.php';
//-----------------------------------------------------

$con=create_db_connection4();

/* select the latest entry in the table */
$sql="SELECT * FROM `state` WHERE 1 order by `timestamp` desc limit 1";
$row=db_select_row($con,$sql);

close_db_connection($con);

$val=floatval($row['fanLevel']); 
echo "$val";
?>