<?php
session_start();
$id_edit_pouring = $_GET['id'];


$_SESSION['loadpage_production'] = "module/pouring/edit_pouring.php";
$_SESSION['RecID'] = $id_edit_pouring;

header('Location: ../../echecksheet');
?>