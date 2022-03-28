<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
	<?php
		session_start();
		require "config/dbkoneksi.php";
		require "ui/head.php";
		if(!isset($_SESSION['loadpage_production'])){$_SESSION['loadpage_production'] = "dashboard.php";}
		$loadpages = $_SESSION['loadpage_production'];
	?>
</head>
<body class="hold-transition sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed"> 			
	<div class="content-wrapper">
		<?php require "$loadpages"; ?>
	</div>				

	<script>
	//BUNKER
		$(document).on("change", ".fc", function() {
			var sum = 0;
			$(".fc").each(function(){
				sum += +$(this).val();
			});
			$(".sub-fc").val(sum);
		});
		$(document).on("change", ".fcd450", function() {
			var sum = 0;
			$(".fcd450").each(function(){
				sum += +$(this).val();
			});
			$(".sub-fcd450").val(sum);
		});
		$(document).on("change", ".fcd500", function() {
			var sum = 0;
			$(".fcd500").each(function(){
				sum += +$(this).val();
			});
			$(".sub-fcd500").val(sum);
		});
		$(document).on("change", ".fcd600", function() {
			var sum = 0;
			$(".fcd600").each(function(){
				sum += +$(this).val();
			});
			$(".sub-fcd600").val(sum);
		});
		$(document).on("change", ".high", function() {
			var sum = 0;
			$(".high").each(function(){
				sum += +$(this).val();
			});
			$(".sub-high").val(sum);
		});
		$(document).on("change", ".low", function() {
			var sum = 0;
			$(".low").each(function(){
				sum += +$(this).val();
			});
			$(".sub-low").val(sum);
		});
		$(document).on("change", ".potong", function() {
			var sum = 0;
			$(".potong").each(function(){
				sum += +$(this).val();
			});
			$(".sub-potong").val(sum);
		});
		$(document).on("change", ".chips", function() {
			var sum = 0;
			$(".chips").each(function(){
				sum += +$(this).val();
			});
			$(".sub-chips").val(sum);
		});
		$(document).on("change", ".st", function() {
			var sum = 0;
			$(".st").each(function(){
				sum += +$(this).val();
			});
			$(".sub-st").val(sum);
		});
		$(document).on("change", ".pig", function() {
			var sum = 0;
			$(".pig").each(function(){
				sum += +$(this).val();
			});
			$(".sub-pig").val(sum);
		});
		$(document).on("change", ".kawul", function() {
			var sum = 0;
			$(".kawul").each(function(){
				sum += +$(this).val();
			});
			$(".sub-kawul").val(sum);
		});
		$(document).on("change", ".other", function() {
			var sum = 0;
			$(".other").each(function(){
				sum += +$(this).val();
			});
			$(".sub-other").val(sum);
		});
		$(document).on("change", ".bunker", function() {
			var sum = 0;
			$(".bunker").each(function(){
				sum += +$(this).val();
			});
			$(".total-charging").val(sum);
		});
	//BUNKER

		//MELTING
		// $(document).ready(function() {
		// 	$(document).on('click', '#start_melt', function() {
		// 		let today = new Date();
		// 		let start = today.getHours() + ":" + today.getMinutes();
		// 		$('#start_melt').val(start);
		// 	})
		// });
		function addCatridge() {
			var value = parseInt(document.getElementById('catridge').value, 10);
			value = isNaN(value) ? 0 : value;
			value++;
			document.getElementById('catridge').value = value;
		}
		function addGarpu() {
			var value = parseInt(document.getElementById('garpu').value, 10);
			value = isNaN(value) ? 0 : value;
			value++;
			document.getElementById('garpu').value = value;
		}
		function totalTime() {
			var start = document.getElementById('start').value;
			var finish = document.getElementById('finish').value;
			var total = finish - start;
			var total_time = document.getElementById('total_time').value = total;
			console.log(start, 'tes');
		}
		$(document).on("change", ".kwh", function() {
			let awal = document.getElementById('kwh_awal').value;
			let akhir = document.getElementById('kwh_akhir').value;
			let total = akhir - awal;
			let kwh_total = document.getElementById('kwh_total').value = total;
		});

		//POURING
		function addMoldNG() {
			let value = parseInt(document.getElementById('mold_ng').value, 10);
			value = isNaN(value) ? 0 : value;
			value++;
			document.getElementById('mold_ng').value = value;
		}
		function addPourNG() {
			let value = parseInt(document.getElementById('pour_ng').value, 10);
			value = isNaN(value) ? 0 : value;
			value++;
			document.getElementById('pour_ng').value = value;
		}
		function addEmpty() {
			let value = parseInt(document.getElementById('empty').value, 10);
			value = isNaN(value) ? 0 : value;
			value++;
			document.getElementById('empty').value = value;
		}
		
		//SET SHIFT
		var date = new Date();
		var currentDate = date.toLocaleString().substring(0,8);
		document.getElementById('working_date').valueAsDate = date;
		var today = new Date().getHours();
		if (today >= 7 && today <= 19) {
			document.getElementById('nsp').checked = true;
		} else {
			document.getElementById('nsm').checked = true;
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
				let today = new Date();
				let start = today.getHours() + ":" + today.getMinutes();
				$('#start').val(start);
			})
			$(document).on('click', '#get_finish', function() {
				let today = new Date();
				let finish = today.getHours() + ":" + today.getMinutes();
				$('#finish').val(finish);
			})
			$(document).on('click', '#get_sample', function() {
				let today = new Date();
				let sample = today.getHours() + ":" + today.getMinutes();
				$('#time_sample').val(sample);
			})
		});
	</script>
</body>
<?php
	require "ui/footer.php";
?>
</html>

