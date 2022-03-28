<?php

$get_config = "SELECT TOP 1 LineCode, AreaCode From PRD.dbo.tb_config";
$stmt_get = sqlsrv_query($conn, $get_config);
while($row_get = sqlsrv_fetch_array($stmt_get, SQLSRV_FETCH_ASSOC))
{
	$LineCode = $row_get['LineCode'];
	$AreaCode = $row_get['AreaCode'];

	$_SESSION['LineCode'] = $LineCode;
}

// $sql_foreman = "SELECT EmpID, EmployeeName, Role, Picture FROM [PRD].[dbo].[mt_user] WHERE Role = 'Foreman' AND AreaCode = '$AreaCode'";
// $sql_leader = "SELECT EmpID, EmployeeName, Role, Picture FROM [PRD].[dbo].[mt_user] WHERE Role = 'Leader' AND AreaCode = '$AreaCode'";
// $sql_operator = "SELECT EmpID, EmployeeName, Role, Picture FROM [PRD].[dbo].[mt_user] WHERE Role = 'Operator' AND AreaCode = '$AreaCode'";
// $sql_product = "SELECT PartName FROM [PRD].[dbo].[mt_product] WHERE LineCode = '$LineCode' ORDER BY PartName ASC";

?>