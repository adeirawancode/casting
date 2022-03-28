<?php
session_start();
$id_adjust = $_GET['id'];
$fm = $_GET['fm'];
$product = $_GET['product'];


$_SESSION['loadpage_production'] = "module/melting/adjustment_melting.php";
$_SESSION['RecID'] = $id_adjust;
$_SESSION['FM'] = $fm;
$_SESSION['ProductCode'] = $product;

header('Location: ../../echecksheet');
?>