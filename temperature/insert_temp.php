

<?php

date_default_timezone_set("Asia/Kolkata");

include_once '../util.php';

$temp=$_POST["temp"];
$humidity=$_POST["humidity"];

//$val="10";
insert_in_db2($temp,$humidity);

function insert_in_db2($temp,$humidity){   

   if(empty($temp)){
      $val = 0; 
    }
    if(empty($humidity)){
        $val = 0; 
      }
      
    
   
    $connection=create_db_connection3();
    
    $t=time();
    $date_time= date('Y-m-d H:i:s', $t); 
    
    

    $sql="INSERT INTO `temp_log`(`temp`,`humidity`,`timestamp`, `date_time`)
                      VALUES ('$temp','$humidity','$t', '$date_time')";
   
    $result = mysqli_query($connection,$sql);
    
         if ( !$result ) {
            die(mysql_error()."\n".$sql);
            echo" !!!<br> ";
            //return 0;
         }
    
        if ( $result ) {
            echo"Temperature:$temp, Humidity:$humidity";
            //return 1;
      }
 
    close_db_connection($connection);
    
}


?>
