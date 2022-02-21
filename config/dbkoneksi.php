<?php  
$serverName = "192.168.102.5"; 
$uid = "sa";   
$pwd = "a0ti5server!";  
$databaseName = "PRD"; 
$connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName,
                         "ReturnDatesAsStrings" => true); 
$conn = sqlsrv_connect( $serverName, $connectionInfo);


?>