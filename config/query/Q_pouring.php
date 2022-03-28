<?php
$get_config = "SELECT TOP 1 LineCode, AreaCode From PRD.dbo.tb_config";
$stmt_get = sqlsrv_query($conn, $get_config);
while($row_get = sqlsrv_fetch_array($stmt_get, SQLSRV_FETCH_ASSOC))
{
	$LineCode = $row_get['LineCode'];
	$AreaCode = $row_get['AreaCode'];
}

$sql_foreman = "SELECT EmpID, EmployeeName, Role, Picture FROM [PRD].[dbo].[mt_user] WHERE Role = 'Foreman' AND AreaCode = 'MLT03'";
$sql_leader = "SELECT EmpID, EmployeeName, Role, Picture FROM [PRD].[dbo].[mt_user] WHERE Role = 'Leader' AND AreaCode = 'MLT03'";
$sql_operator = "SELECT EmpID, EmployeeName, Role, Picture FROM [PRD].[dbo].[mt_user] WHERE Role = 'Operator' AND AreaCode = 'MLT03'";
$sql_operatorx = "SELECT EmpID, EmployeeName, Role, Picture FROM [PRD].[dbo].[mt_user] WHERE Role = 'Operator' AND AreaCode = 'MLT03'";
$sql_product = "SELECT PartName FROM [PRD].[dbo].[mt_product] WHERE LineCode = 'ACE1' ORDER BY PartName ASC";
$sql_productx = "SELECT PartName FROM [PRD].[dbo].[mt_product] WHERE LineCode = 'ACE1' ORDER BY PartName ASC";

$stmt_foreman = sqlsrv_query($conn, $sql_foreman);
$stmt_leader = sqlsrv_query($conn, $sql_leader);
$stmt_operator = sqlsrv_query($conn, $sql_operator);
$stmt_operatorx = sqlsrv_query($conn, $sql_operatorx);
$stmt_product = sqlsrv_query($conn, $sql_product);
$stmt_productx = sqlsrv_query($conn, $sql_productx);

?>