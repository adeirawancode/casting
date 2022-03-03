<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
<?php
session_start();
require "config/dbkoneksi.php";
require "ui/head.php";
// require "assets/frontend/css/fullcalendar.css";
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
<script>
	$(document).ready(function() {
		$(document).on('click', '#get_foreman', function() {	
			var foreman_id = $(this).data('empid');	
			$('#foreman_id').val(foreman_id);
			var foreman_name = $(this).data('empname');	
			$('#foreman_name').val(foreman_name);				
			$('#modal_foreman').modal('hide');
		})
		$(document).on('click', '#get_leader', function() {
			var leader_id = $(this).data('empid');	
			$('#leader_id').val(leader_id);
			var leader_name = $(this).data('empname');	
			$('#leader_name').val(leader_name);				
			$('#modal_leader').modal('hide');	
		})
		$(document).on('click', '#get_op', function() {
			var op = $(this).data('empid');	
			$('#op').val(op);
			var checker_id = $(this).data('empid');	
			$('#checker_id').val(checker_id);
			var checker_name = $(this).data('empname');	
			$('#checker_name').val(checker_name);				
			$('#modal_op').modal('hide');	
		})
	});
</script>
</body>
</html>
