<?php
session_start();
require "../../config/dbkoneksi.php";

$mode = $_GET['md'];
$lineID = $_GET['p'];
$dateID = $_GET['d'];
$groupID = $_GET['g'];

$_SESSION['loadpage'] = 'module/finishing_disa/checksheet.php';

$_SESSION['lineID'] = "$lineID";
$_SESSION['dateID'] = "$dateID";
$_SESSION['groupID'] = "$groupID";
$_SESSION['mode'] = "$mode";
		
header('Location: ../../index');;
?>