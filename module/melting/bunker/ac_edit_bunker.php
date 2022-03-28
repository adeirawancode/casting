<?php
session_start();
$id_edit_bunker = $_GET['id'];


$_SESSION['loadpage_production'] = "module/melting/bunker/edit_bunker.php";
$_SESSION['RecID'] = $id_edit_bunker;

header('Location: ../../echecksheet');
?>