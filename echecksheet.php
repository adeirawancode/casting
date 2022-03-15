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
	var xValues = [07,08,09,10,11,12,13,14,15,16];
	var yValues = [1360,1370,1380,1390,1400,1410,1420,1430,1440];

	new Chart("myChart", {
	type: "line",
	data: {
		labels: xValues,
		datasets: [{
		fill: false,
		lineTension: 0,
		backgroundColor: "rgba(0,0,255,1.0)",
		borderColor: "rgba(0,0,255,0.1)",
		data: yValues
		}]
	},
	options: {
		legend: {display: false},
		scales: {
		yAxes: [{ticks: {min: 1360, max:1440}}],
		}
	}
	});
	var date = new Date();
	var currentDate = date.toLocaleString().substring(0,8);
	console.log(currentDate, 'tgl');
	// var currentTime = date.toISOString().substring(11,16);
	document.getElementById('working_date').valueAsDate = date;
	// document.getElementById('currentTime').value = currentTime;
	// document.getElementById('working_date').valueAsDate = new Date();
	var today = new Date().getHours();
	if (today >= 7 && today <= 19) {
		document.getElementById('nsp').checked = true;
	} else {
		document.getElementById('nsm').checked = true;
	}
    function addMoldNG() {
		let i = 0;
        i++;
        document.getElementById('mold_ng').value = i;
    }
	function addPourNG() {
		let i = 0;
        i++;
        document.getElementById('pour_ng').value = i;
    }
	function addEmpty() {
		let i = 0;
        i++;
        document.getElementById('empty').value = i;
    }
	$(document).ready(function() {
		$(document).on('click', '#get_composition', function() {	
			var comp = $(this).data('compid');	
			$('#composition').val(comp);			
			$('#modal_composition').modal('hide');
		})
		$(document).on('click', '#get_product', function() {	
			var prd_id = $(this).data('prdid');	
			$('#product').val(prd_id);			
			$('#modal_product').modal('hide');
		})
		$(document).on('click', '#get_fm', function() {	
			var fm_id = $(this).data('fmid');	
			$('#fm').val(fm_id);			
			$('#modal_fm').modal('hide');
		})
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
		$(document).on('click', '#get_start', function() {
			var today = new Date();
			// var start = d.toISOString();
			//    console.log(start);
			var start = today.getHours() + ":" + today.getMinutes();
			$('#start').val(start);
		})
		$(document).on('click', '#get_finish', function() {
			let today = new Date();
			var finish = today.getHours() + ":" + today.getMinutes();
			$('#finish').val(finish);
		})
	});
</script>
</body>
</html>
