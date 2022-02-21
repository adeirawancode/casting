<!DOCTYPE html>
<html style="font-size: 16px;">
<head>

	
</head>

<body class="hold-transition sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed"> 

<?php
require "config/dbkoneksi.php";
require "ui/head.php"; ?>	
<div class="wrapper">
	<?php require "ui/navbar.php"; ?>			
	<div class="content-wrapper">	
		<div class="card">
			<div class="card-body">				
				<hr>			
				<section>
					<div class="container-fluid">
						<div class="row">							
							<div class="table-responsive">		
								<table class="table table-bordered" width="100%" cellspacing="0">						
													
										<tr>
											<th style="vertical-align: middle; text-align : center; font-size : 0px;" rowspan="2" width="5%"><img src="assets/images/ATI3.png" width="60" /></th>																								
											<th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;" width="15%">Departemen / Section</th>
											<th style="vertical-align: middle; text-align : center; font-size : 30px; font-weight: bold;" rowspan="2">Unit Cost Control Sheet (Gentan-i) </th>				
											<th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;" >Bulan</th>
											<th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;" >Line</th>										
										</tr>
										<tr>
											<th style="vertical-align: top; text-align : center; font-size : 20px;">Core - Finishing 1 / Finishing 1</th>
											<th style="vertical-align: top; text-align : center; font-size : 20px;">Feb-21</th>
											<th style="vertical-align: top; text-align : center; font-size : 20px;">VISUAL CHECK</th>										
										</tr>											
								</table>								
							</div>
						</div>
					</div>				
				</section>	

				<section>
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-10 col-sm-12">							
								
								
								
							</div>
						</div>
					</div>				
				</section>	

				<section>
					<div class="container-fluid">
						<div class="row">						
							<div class="table-responsive">		
								<table class="table table-bordered" width="100%" cellspacing="0">						
													
										<tr>
											<th style="vertical-align: middle; text-align : left; font-size : 13px;" width="5%">Item Cost</th>
											<?php  for ($i=1; $i<=31; $i+=1) { ?>
												<th style="vertical-align: middle; text-align : center; font-size : 13px;" width="2%"><?php echo $i; ?></th>	
											<?php } ?>
										</tr>
										
										<?php 
										/*
										$sql = "Select * from (
											select WorkingDate,sum(Qty) as Qty from [PRD].[dbo].[qty_log_temp]
											Group By WorkingDate
											)TB
											PIVOT(
											  SUM(Qty) 
												FOR WorkingDate IN ([2021-02-06],[2021-02-07],[2021-02-08],[2021-02-0])

											) as Pvt
											";
										*/	
										$sql = "exec  [PRD].[dbo].[sp_dynamic_pivot]
												N'select sum(Qty) as Qty from [PRD].[dbo].[qty_log_temp]
												Group By WorkingDate',
												N'CAST(WorkingDate as Date)',
												N'Sum(Qty)'";
										
										$stmt = sqlsrv_query($conn, $sql,  array(1, "some data"));
										$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
										$jmlcol = sqlsrv_num_fields($stmt);
										 ?>
										
										
										
										
										
										<tr>
											<td style="vertical-align: middle; text-align : left; font-size: 13px;" width="5%">Plan Produksi</td>
										</tr>
										<tr>
											<td style="vertical-align: middle; text-align : left; font-size: 13px;" width="5%">Plan Man Hour</td>
										</tr>
										<tr>	
											<td style="vertical-align: middle; text-align : left; font-size: 13px;" width="5%">Actual Produksi</td>
											<?php 
															
											for ($i = 0; $i<=$jmlcol-1; $i+=1)
											{ ?>
											<td style="vertical-align: middle; text-align : left; font-size: 13px;" width="5%"><?php echo $row[$i]; ?></td>
											
											
											<?php
											} ?>
										</tr>
										<tr>	
											<td style="vertical-align: middle; text-align : left; font-size: 13px;" width="5%">Actual Man Hour</td>
										</tr>
										<tr>	
											<td style="vertical-align: middle; text-align : left; font-size: 13px;" width="5%">Actual Gentani</td>
										</tr>								
																				
								</table>
							</div>							
						</div>
					</div>				
				</section>				
				
			</div>
		</div>
	</div>					
</div>


</body>
</html>