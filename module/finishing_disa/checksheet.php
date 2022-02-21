<?php
require "config/dbkoneksi.php";	
$no = 0 + 1;


if (isset($_POST['tgl1']))
{	
	$date = $_POST['tgl1'];
	$line = $_POST['line'];
	$groupFrm = $_POST['groupFrm'];		
	include "config/function/finishing_disa/Q_function.php";
	include "config/query/finishing_disa/Q_checksheet.php";
	
}else{
	
	$mode = $_SESSION['mode'];	
	if($mode == 0)
	{
		$sql = '';
		$sql1 = '';
		$sql2 = '';
		$sql3 = '';
		$line = '';
		$date = '';	
		$sessi =  '';
		$asset =  '';
		$groupFrm =  '';
		$sessi =  '';
		$asset =  '';
		$shiftName =  '';
		$statusLine =  '';
		$nameLine =  '';
	}else{
		
		$line = $_SESSION['lineID'];
		$date = $_SESSION['dateID'];
		$groupFrm = $_SESSION['groupID'];
		include "config/function/finishing_disa/Q_function.php";
		include "config/query/finishing_disa/Q_checksheet.php";	
		
	}
	
}

?>

<div class="card">
	<div class="card-body">
		<section>
		<div class="container-fluid">
			<form action="" method="post">
			<div class="row">
				<div class="col-lg-2 col-sm-12">
					Tanggal						
					<input type="date" name="tgl1" class="form-control" value="<?php echo $date; ?>"autocomplete="off" />								
				</div>
				<div class="col-lg-2 col-sm-12">
					Group
					<select class="form-control" name="groupFrm">
						<option value="<?php echo $groupFrm; ?>"><?php echo $groupFrm; ?></option>
						<option value="MERAH">MERAH</option>
						<option value="PUTIH">PUTIH</option>
					</select>	
				</div>
				<div class="col-lg-2 col-sm-12">	
					Line
					<div class="input-group mb-2">
					<select name="line" class="form-control" />	
						<option value="<?php echo $line; ?>"><?php echo $line; ?></option>								
						<?php 							
							$sql4 = "SELECT * FROM (
								SELECT DISTINCT LT.LineCode,LC.LineSearch from [PRD].[dbo].[time_log] LT
								LEFT JOIN
								(
								SELECT LineCode,LineSearch FROM [PRD].[dbo].[mt_line_process]
								) LC ON LT.LineCode = LC.LineCode
								Where LC.LineSearch IS NOT NULL
								)TB
								ORDER BY LineSearch";
							$stmt4 = sqlsrv_query($conn, $sql4);							
						?>
						<?php while($row4 = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC)) { ?>
						<option value="<?php echo $row4['LineCode']; ?>"><?php echo $row4['LineSearch']; ?></option>
						<?php } ?>							
					</select>
					<div class="input-group-append">					
							<button type="submit" name="tampil" class="btn btn-primary"><i class="fas fa-cogs"></i> Setting</button>
					</div>
					</div>
				</div>
			
				<div class="col-lg-6 col-sm-12">	
					<br>
					<a onClick="history.go(0)" id="rfrsh" style="color: white;" class="btn btn-success"> <i class="fas fa-sync-alt"> Refresh</i></a>
					<a type="button" id="btnPrint" class="btn btn-dark" style="color: white;"><i class="fas fa-print"></i> Print</a>
					<a class="btn btn-primary" href="pages.php?p=module/finishing_disa/dashboard.php" style="color: white;"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
				</div>
			
			</div>
			</form>	

		</div>	
		</section>
		<hr>
		<div id="printThis">
		<section>
			<div class="container-fluid">
			<div class="table-responsive">		
				<table class="table table-bordered" width="100%" cellspacing="0">						
									
						<tr>
							<th style="vertical-align: middle; text-align : center; font-size : 0px;" rowspan="2" width="5%"><img src="assets/images/ATI3.png" width="60" /></th>							
							<th style="vertical-align: middle; text-align : center; font-size : 20px; font-weight: bold;" rowspan="2">LAPORAN HARIAN GRINDING / VISUAL CHECK </th>																			
							<th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;" >Tanggal</th>
							<th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;" >Shift</th>
							<th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;" >Line</th>
							<th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;">Status</th>
							
							<?php
							
							$stmt3 = sqlsrv_query($conn, $sql3);
							while($row3 = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
							
							?>
							<th style="vertical-align: top; text-align : center; font-size : 13px;"><?php echo $row3['Role']; ?></th>									
							
							<?php } ?>
							
							
						</tr>
						<tr>
							
							<th style="vertical-align: top; text-align : center; font-size : 13px;"><?php echo date('d-M-Y', strtotime($date)); ?></th>
							<th style="vertical-align: top; text-align : center; font-size : 13px;"><?php echo $shiftName; ?></th>
							<th style="vertical-align: top; text-align : center; font-size : 13px;"><?php echo $nameLine; ?></th>
							<th style="vertical-align: top; text-align : center; font-size : 13px;"><?php echo $statusLine; ?></th>
							
							<?php
							
							$stmt3 = sqlsrv_query($conn, $sql3);
							while($row3 = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
							
							?>
							<th style="vertical-align: top; text-align : center; font-size : 13px;"><?php echo $row3['EmployeeName']; ?></th>									
							
							<?php } ?>
						</tr>
										
				</table>
			</div>
			</div>			
		</section>
		
		<section>
			<div class="container-fluid">
			<div class="table-responsive">		
			<table class="table table-bordered" width="100%" cellspacing="0">						
									
						<tr>
							<th style="vertical-align: middle; text-align : center; font-size : 10px;" rowspan="2" width="2%">No</th>														
							<th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;" colspan="2">Waktu</th>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;" rowspan="2" width="25%">NAMA PRODUK</th>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;" rowspan="2" width="5%">Casting STOCode</th>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;" rowspan="2" width="5%">CASTING DATE</th>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;" rowspan="2" width="4%">Total OK</th>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;" rowspan="2" width="4%">Total NG</th>
							<th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;" colspan="13" >JENIS REJECT (NG)</th>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;" rowspan="2" width="4%">Rework (Qty)</th>
							<th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;" colspan="6">Stop Line (Menit)</th>
							
							
																					
						</tr>
						<tr>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;"  width="5%">Mulai</th>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;"  width="5%">Selesai</th>
							
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">GM</th>
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">KS</th>
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">DA</th>
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">YU</th>
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">KT</th>
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">OT</th>
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">AK</th>
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">HK</th>
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">MI</th>
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">OS</th>
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">OG</th>
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">SC</th>
							<th style="vertical-align: middle; text-align : center; font-size : 12px; font-weight: bold; color: red;"  width="3%">BD</th>

							<th style="vertical-align: middle; text-align : center; font-size : 13px;"  width="5%">Istirahat</th>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;"  width="5%">Tunggu Material</th>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;"  width="5%">Setting Meja</th>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;"  width="5%">Ganti Tool</th>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;"  width="5%">Mesin Rusak</th>
							<th style="vertical-align: middle; text-align : center; font-size : 13px;"  width="5%">Other</th>									
							
							
						</tr>
						
						
						<?php
						$stmt = sqlsrv_query($conn, $sql);
						while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {  ?>
						
						<tr>
							<td width="2%"><?php echo $no; ?></td>
							<td style="vertical-align: middle; text-align : center;" width="5%"><?php echo $row['Mulai']; ?></td>
							<td style="vertical-align: middle; text-align : center;" width="5%"><?php echo $row['Selesai']; ?></td>
							<td style="vertical-align: middle; text-align : left;" width="25%"><?php echo '<label style="font-size: 13px;">'.$row['ProductCode'].'</label>'.'<br>'.$row['PartName']; ?></td>
							<td style="vertical-align: middle; text-align : center;" width="5%"><?php echo $row['CastingSTOCode']; ?></td>
							<td style="vertical-align: middle; text-align : center;" width="5%"><?php echo $row['CastDate']; ?></td>
							<td style="vertical-align: middle; text-align : center; font-weight: bold;" width="4%"><?php echo $row['TotalOK']; ?></td>
							<td style="vertical-align: middle; text-align : center; font-weight: bold;" width="4%"><?php echo $row['TotalNG']; ?></td>
							
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['Gomi']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['Kusare']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['Dakon']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['Yuzakai']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['Kataochi']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['Other']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['Aka']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['Hike']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['Mikui']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['Oshigomi']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['OverGerinda']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['SoundCheck']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['Bending']; ?></td>
							<td style="vertical-align: middle; text-align : center; color: red; font-weight: bold;" width="5%"><?php echo $row['Rework']; ?></td>
							
							<td style="vertical-align: middle; text-align : center; font-weight: bold;" width="5%"><?php echo $row['Istirahat']; ?></td>
							<td style="vertical-align: middle; text-align : center; font-weight: bold;" width="5%"><?php echo $row['Material']; ?></td>
							<td style="vertical-align: middle; text-align : center; font-weight: bold;" width="5%"><?php echo $row['SettingMeja']; ?></td>
							<td style="vertical-align: middle; text-align : center; font-weight: bold;" width="5%"><?php echo $row['GantiTool']; ?></td>
							<td style="vertical-align: middle; text-align : center; font-weight: bold;" width="5%"><?php echo $row['Mesin']; ?></td>
							<td style="vertical-align: middle; text-align : center; font-weight: bold;" width="5%"><?php echo $row['Lain']; ?></td>
							
						</tr>
						<?php $no++;  }   ?>
						<tr>			
							<?php 
								$stmt1 = sqlsrv_query($conn, $sql1);
								while($row1 = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
								$totalOK = $row1['TotalOK'];
								$totalNG = $row1['TotalNG'];										
							?>
							<th style="vertical-align: middle; text-align : center; font-size : 25px;" colspan="6">TOTAL</th>
							<th style="vertical-align: middle; text-align : center; font-size : 25px; background: yellow;" width="5%"><?php echo $row1['TotalOK']; ?></th>
							<th style="vertical-align: middle; text-align : center; font-size : 25px; background: red; color:white;" width="5%"><?php echo $row1['TotalNG']; ?></th>
								<?php } ?>
						</tr>
								
			</table>
			</div>
			</div>
		</section>
		</div>
	</div>
</div>

<script>
setInterval(function () 
{
	document.getElementById("rfrsh").click();
	}, 1000000);
</script>

</body>

<script>
document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("printThis"));
	
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
	
}
</script>
</html>