
<meta http-equiv="refresh" content="200">
<?php
require "config/dbkoneksi.php";
require "config/function/finishing_disa/Q_function.php";	

	if (isset($_POST['tampil']))
	{
		$date = $_POST['tgl1'];		
		$groupFrm = $_POST['groupFrm'];	
		
		$resultGR1st = data_dashboard($date, $groupFrm, 'Grinding 1st', $conn);
		$resultGR2nd = data_dashboard($date, $groupFrm, 'Grinding 2nd', $conn);
		$resultVCG = data_dashboard($date, $groupFrm, 'Visual Check', $conn);	
		
	}else{
		
		$sqlgroup = "SELECT TOP 1 ShiftName
		,ShiftGroup
		FROM [PRD].[dbo].[session_log]
		ORDER BY SessionStart DESC";
		$stmtgroup = sqlsrv_query($conn, $sqlgroup);
		$resultgroup = sqlsrv_fetch_array($stmtgroup, SQLSRV_FETCH_ASSOC);		
		$groupFrm = $resultgroup['ShiftGroup'];	
		
		$date = date('Y-m-d');
		
		$resultGR1st = data_dashboard($date, $groupFrm, 'Grinding 1st', $conn);
		$resultGR2nd = data_dashboard($date, $groupFrm, 'Grinding 2nd', $conn);
		$resultVCG = data_dashboard($date, $groupFrm, 'Visual Check', $conn);	
		
	}
	
?>

				
<div id="printThis">

	<div class="row">
		<div class="container-fluid">
			<div class="table-responsive">		
				<table class="table table-bordered table-responsive" width="100%" cellspacing="0">						
						
						<form action="" method="POST" >											
						<tr>							
							
							<th style="vertical-align: middle; text-align : center; font-size : 30px; font-weight: bold;"> DISA FINISHING MONITORING DASHBOARD</th>

							<th style="vertical-align: top; text-align : center; font-size : 15;" width="10%" >
								WORKING DATE
								<input type="date" name="tgl1" class="form-control" value="<?php echo $date; ?>"autocomplete="off" />								
							</th>							
							
							<th style="vertical-align: top; text-align : center; font-size : 15;" width="10%">
								GROUP
								<select class="form-control" name="groupFrm">
									<option value="<?php echo $groupFrm; ?>"><?php echo $groupFrm; ?></option>
									<option value="MERAH">MERAH</option>
									<option value="PUTIH">PUTIH</option>
								</select>																	
							</th>
							
							<th style="vertical-align: top; text-align : center; font-size : 15;" width="5%">	
								<br>
								<button type="submit" name="tampil" id="tampil" class="btn btn-primary">Refresh</button>										
							</th>
							
							
						</tr>
						</form>					
				</table>
			</div>
		</div>				
	</div>	
	
	<div class="container-fluid">
		<div class="row">					
			
			<?php 
			
				$captionFontSize_ = 'h3';
				$thFontSize_ = '';
				$thFontBold_ = 'bold';
				
				$tdFontSize_ = '';
				$tdFontBold_ = 'bold';								
				
				
				table_dashboard
				(
					$captionBG = 'orange'
					,$captionColor = 'black'
					,$captionHeader = 'GRINDING 1st'
					,$captionFontSize = $captionFontSize_
					,$thFontSize = $thFontSize_
					,$thFontBold = $thFontBold_
					,$tdFontSize = $tdFontSize_
					,$tdFontBold = $tdFontBold_
					,$resultGR1st
				);
				
				table_dashboard
				(
					$captionBG = 'aqua'
					,$captionColor = 'black'
					,$captionHeader = 'GRINDING 2nd'
					,$captionFontSize = $captionFontSize_
					,$thFontSize = $thFontSize_
					,$thFontBold = $thFontBold_
					,$tdFontSize = $tdFontSize_
					,$tdFontBold = $tdFontBold_
					,$resultGR2nd
				);
				
				table_dashboard
				(
					$captionBG = 'green'
					,$captionColor = 'white'
					,$captionHeader = 'VISUAL CHECK'
					,$captionFontSize = $captionFontSize_
					,$thFontSize = $thFontSize_
					,$thFontBold = $thFontBold_
					,$tdFontSize = $tdFontSize_
					,$tdFontBold = $tdFontBold_
					,$resultVCG
				);							
			
			 ?>
			
		</div>	
	</div>				
</div>
