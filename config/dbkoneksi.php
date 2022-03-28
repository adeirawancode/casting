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


$getConfig = "SELECT TOP 1 LineCode, AreaName, AreaCode FROM tb_config";
$stmtConfig = sqlsrv_query($conn, $getConfig);
while($rowConfig = sqlsrv_fetch_array($stmtConfig, SQLSRV_FETCH_ASSOC))
{
	$AreaName = $rowConfig['AreaName'];
}

if($AreaName == 'DISA')
{
	$serverComposition = "10.123.230.186";
}else{
	$serverComposition = "10.123.230.185";
}

$userComposition = "aas";
$passwordComposition = "andon";

$conn_Composition = mysqli_connect($serverComposition, $userComposition, $passwordComposition);
/*
// DISA radmin bayu ati
$servername = "10.123.230.186";
$username = "aas";
$password = "andon";
//ACE
*/
$serverAce = "10.123.230.185";
$userACE = "aas";
$passwordACE = "andon";

// Create connection
$conn_mysql = mysqli_connect($serverAce, $userACE, $passwordACE);
?>