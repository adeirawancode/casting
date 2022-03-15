<?php
// $sql_atasan = "SELECT CONVERT(varchar(10), EmpID) as EmpID, EmployeeName, Role, Picture FROM [PRD].[dbo].[mt_user] WHERE Role = 'Foreman' OR Role = 'Leader' AND AreaCode = 'MLT03'";
$sql_foreman = "SELECT EmpID, EmployeeName, Role, Picture FROM [PRD].[dbo].[mt_user] WHERE Role = 'Foreman' AND AreaCode = 'MLT03'";
$sql_leader = "SELECT EmpID, EmployeeName, Role, Picture FROM [PRD].[dbo].[mt_user] WHERE Role = 'Leader' AND AreaCode = 'MLT03'";
$sql_operator = "SELECT EmpID, EmployeeName, Role, Picture FROM [PRD].[dbo].[mt_user] WHERE Role = 'Operator' AND AreaCode = 'MLT03'";
$sql_product = "SELECT PartName FROM [PRD].[dbo].[mt_product]";

// $stmt_atasan = sqlsrv_query($conn, $sql_atasan);
$stmt_foreman = sqlsrv_query($conn, $sql_foreman);
$stmt_leader = sqlsrv_query($conn, $sql_leader);
$stmt_operator = sqlsrv_query($conn, $sql_operator);
$stmt_product = sqlsrv_query($conn, $sql_product);
?>