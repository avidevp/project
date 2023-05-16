

<?php

date_default_timezone_set("Asia/Kolkata");

include_once '../util.php';

$val=$_REQUEST["state"];

//$val="10";
insert_in_db2($val);

function insert_in_db2($val){   

   if(empty($val)){
      $val = 0; 
    }
    
   
    $connection=create_db_connection2();
    
    $t=time();
    $date_time= date('Y-m-d H:i:s', $t); 
    
    

    $sql="INSERT INTO `state`(`level`, `timestamp`, `date_time`)
                      VALUES ('$val','$t', '$date_time')";
   
    $result = mysqli_query($connection,$sql);
    
         if ( !$result ) {
            die(mysql_error()."\n".$sql);
            echo" !!!<br> ";
            //return 0;
         }
    
        if ( $result ) {
            echo "$val";
            //return 1;
      }
 
    close_db_connection($connection);
    
}


?>
