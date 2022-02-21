<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
<?php
session_start();
require "ui/head.php";
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// die();
if(!isset($_SESSION['loadpage_production'])){$_SESSION['loadpage_production'] = "dashboard.php";}
$loadpages = $_SESSION['loadpage_production'];
?>
</head>
<body class="hold-transition sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed"> 
<div class="wrapper">
	<?php require "ui/navbar.php"; ?>			
	<div class="content-wrapper">
		<?php require "$loadpages"; ?>
	</div>					
</div>
</body>
</html>