

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access-control-allow-origin, content-type");
header("Content-Type: application/x-www-form-urlencoded; charset=UTF-8");
date_default_timezone_set("Asia/Kolkata");

include_once '../util.php';

$val=$_REQUEST["fanState"];

//$val="10";
insert_in_db2($val);

function insert_in_db2($val){   

   if(empty($val)){
      $val = 0; 
    }
    
   
    $connection=create_db_connection4();
    
    $t=time();
    $date_time= date('Y-m-d H:i:s', $t); 
    
    

    $sql="UPDATE `state` SET `fanLevel` = '$val' WHERE 1";
   
    $result = mysqli_query($connection,$sql);
    
         if ( !$result ) {
            die(mysql_error()."\n".$sql);
            echo" !!!<br> ";
            //return 0;
         }
    
        if ( $result ) {echo"$val";
            //return 1;
      }
 
    close_db_connection($connection);

}
?>
