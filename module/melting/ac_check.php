<?php
session_start();
$id_adjust = $_GET['id'];
$fm = $_GET['fm'];
$product = $_GET['product'];


$_SESSION['loadpage_production'] = "modal/modal_check.php";
$_SESSION['RecID'] = $id_adjust;
$_SESSION['FM'] = $fm;
$_SESSION['ProductCode'] = $product;

header('Location: ../../echecksheet');
?>