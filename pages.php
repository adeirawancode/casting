<?php
session_start();
$pagename = $_GET['p'];
$_SESSION['loadpage_production'] = $pagename;

header('Location: index');
?>