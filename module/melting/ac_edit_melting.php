<?php
session_start();
$id_edit_melting = $_GET['id'];


$_SESSION['loadpage_production'] = "module/melting/edit_melting.php";
$_SESSION['RecID'] = $id_edit_melting;

header('Location: ../../echecksheet');
?>