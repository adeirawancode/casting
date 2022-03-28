<?php
session_start();
$fmID = $_GET['f'];
$fmName = $_GET['fName'];

$_SESSION['loadpage_production'] = "module/melting/checksheet_melting.php";
$_SESSION['fmActive'] = $fmID;
$_SESSION['fmName'] = $fmName;

header('Location: ../../echecksheet');
?>