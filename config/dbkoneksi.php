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

// DISA radmin bayu ati
$servername = "10.123.230.186";
$username = "aas";
$password = "andon";
//ACE
$servername = "10.123.230.185";
$username = "aas";
$password = "andon";

// Create connection
$conn_mysql = mysqli_connect($servername, $username, $password);
?>