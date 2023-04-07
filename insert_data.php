<?php

//change the time zone as per your country
date_default_timezone_set("Asia/Kolkata");

include_once 'util.php';

$val=$_REQUEST["dist"];

//$val="10";
insert_in_db($val);

function insert_in_db($val){   

   if(empty($val)){
      $val = rand(1,100); 
    }
    
   
    $connection=create_db_connection();
    
    $t=time();
    $date_time= date('Y-m-d H:i:s', $t); 
    
    

    $sql="INSERT INTO `level_log`(`level`, `timestamp`, `date_time`)
                      VALUES ('$val','$t', '$date_time')";
   
    $result = mysqli_query($connection,$sql);
    
         if ( !$result ) {
            die(mysql_error()."\n".$sql);
            echo" !!!<br> ";
            //return 0;
         }
    
        if ( $result ) {
            echo "Daal diya";
            //return 1;
      }
 
    close_db_connection($connection);
    
}

?>

