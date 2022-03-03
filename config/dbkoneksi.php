<?php  
$serverName = "ATINB145\SQLEXPRESS"; 
$uid = "u_prd";   
$pwd = "atiprd";  
$databaseName = "PRD"; 
$connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName,
                         "ReturnDatesAsStrings" => true); 
$conn = sqlsrv_connect( $serverName, $connectionInfo);
?>