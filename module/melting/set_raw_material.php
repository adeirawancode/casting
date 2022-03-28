<?php
session_start();
require "../../config/dbkoneksi.php";

$fm = $_GET['fm'];
$fc = $_GET['fc'];
$fcd450 = $_GET['fcd450'];
$fcd500 = $_GET['fcd500'];
$fcd600 = $_GET['fcd600'];
$high = $_GET['high'];
$low = $_GET['low'];
$chips = $_GET['chips'];
$st = $_GET['st'];
$pig = $_GET['pig'];
$total = $_GET['total'];

$sql_raw = "UPDATE [PRD].[dbo].[melting]
   SET 
    FC = '$fc'
    ,FCD450 = '$fcd450'
    ,FCD500 = '$fcd500'
    ,FCD600 = '$fcd600'
    ,HighMn = '$low'
    ,LowMn = '$high'
    ,Chips = '$chips'
    ,STBlock = '$st'
    ,PigIron = '$pig'
    ,TotalCharging = '$total'
 WHERE FM = '$fm'";
 $stmt_raw = sqlsrv_query($conn, $sql_raw);

$_SESSION['loadpage'] = 'module/melting/set_raw_material.php'; // REGISTER NEXT PAGE
		
header('Location: ../../echecksheet'); // INDEX

?>