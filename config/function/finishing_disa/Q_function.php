<?php

//DASHBOARD DATA
function data_dashboard($workingdate, $shiftgroup, $lineprocess, $conn)
{
	
$sql = "DECLARE

@WorkingDate as date,
@ShiftGroup as varchar(10),
@LineProcess as varchar(15)

SET @WorkingDate = '$workingdate'
SET @ShiftGroup = '$shiftgroup'
SET @LineProcess = '$lineprocess'

SELECT RIGHT(LineName, 2) as LineName
,LineProcess
,LineCode
,StatusLine
,StatusProcess
,Kind
,TotalOK
,TotalNG
,TotalStop
,Operator
,Leader
,ShiftName
,SessionID
,ShiftGroup
,WorkingDate
FROM (
SELECT LM.LineName
	,LM.LineProcess
	,LM.LineCode
	,LM.Status as StatusLine
	,ISNULL(LT.StatusProcess, LM.Status) as StatusProcess
	,LT.Kind
	,LOK.TotalOK
	,LNG.TotalNG
	,LNS.TotalStop
	,LOP.EmployeeName as Operator
	,LLD.EmployeeName as Leader
	,LO.ShiftName
	,LO.SessionID
	,LM.AssetID
	,LO.ShiftGroup
	,LO.WorkingDate
FROM [PRD].[dbo].[mt_line_process] LM

LEFT JOIN
(Select * from (
select SessionID      
	,LineCode
	,WorkingDate
	,CASE 
		WHEN ShiftName = 'SP' then 'NSP'
		WHEN ShiftName = 'SM' then 'NSM'
	END as ShiftName
	,ShiftGroup
	,SessionStart
	,SessionFinish	
	,ROW_NUMBER() OVER (
PARTITION BY LineCode
    ORDER BY SessionStart DESC
)row_num from [PRD].[dbo].[session_log] TL Where TL.WorkingDate = @WorkingDate
and ShiftGroup = @ShiftGroup
)TG Where row_num = 1
)LO ON LO.LineCode = LM.LineCode
AND LO.WorkingDate = @WorkingDate


LEFT JOIN
(Select * from (
select *
,CASE
	When Type = 'SESSION_FINISH' then 'End Shift'
	When Type = 'SESSION_START' then 'Prepare'
	When Type = 'BREAK' then 'Break'
	When Type = 'PROCESS' then 'Proses'
	When Type = 'STMJ' then 'Setting Meja'
	When Type = 'GTL' then 'Ganti Tool'
	When Type = 'MSN' then 'Mesin'
	When Type = 'OTH' then 'Lain-Lain'
	When Type = 'WMAT' then 'Tunggu Material'
End As StatusProcess
, ROW_NUMBER() OVER (
PARTITION BY LineCode
    ORDER BY StartTime DESC
)row_num from [PRD].[dbo].[time_log] TL 
)TB
Where row_num = 1) LT ON LT.LineCode = LM.LineCode
AND LT.WorkingDate = LO.WorkingDate
and LT.AssetID = LM.AssetID

LEFT JOIN
(Select AssetID, SessionID, LineCode, SUM(Qty) as TotalOK From [PRD].[dbo].[qty_log] Where WorkingDate = @WorkingDate and Kind = 'OK' group by AssetID,LineCode,SessionID
) LOK ON LOK.LineCode = LM.LineCode and LOK.SessionID = LO.SessionID and LOK.AssetID = LM.AssetID

LEFT JOIN
(Select AssetID,SessionID,LineCode, SUM(Qty) as TotalNG From [PRD].[dbo].[qty_log] Where WorkingDate = @WorkingDate and Kind = 'NG' group by AssetID,LineCode,SessionID
) LNG ON LNG.LineCode = LM.LineCode and LNG.SessionID = LO.SessionID and LNG.AssetID = LM.AssetID

LEFT JOIN
(select SessionID,LineCode, SUM(Duration) as TotalStop from [PRD].[dbo].[time_log] Where WorkingDate = @WorkingDate and Kind = 'STOP' group by LineCode,SessionID
) LNS ON LNS.LineCode = LM.LineCode and LNS.SessionID = LO.SessionID

LEFT JOIN
(select EP.AssetID, SessionID, ET.EmployeeName from [PRD].[dbo].[session_users] EP 
	LEFT JOIN [ATI].[dbo].[HRD_EMPLOYEE_TABLE] ET ON EP.EmpID = ET.EmpID	
	Where EP.Role = 'Operator'
) LOP ON LOP.SessionID = LO.SessionID and LOP.AssetID = LM.AssetID

LEFT JOIN
(select EP.AssetID, SessionID, ET.EmployeeName from [PRD].[dbo].[session_users] EP 
	LEFT JOIN [ATI].[dbo].[HRD_EMPLOYEE_TABLE] ET ON EP.EmpID = ET.EmpID	
	Where EP.Role = 'Leader'
) LLD ON LLD.SessionID = LO.SessionID and LLD.AssetID = LM.AssetID

)TP
Where LineProcess = @LineProcess
Order By LineName";
		
		$stmt = sqlsrv_query($conn, $sql);
		return $stmt;	
		
}



//DASHBOARD TABLE
function table_dashboard
(
	$captionBG = 'black'
	,$captionColor = 'black'
	,$captionHeader = 'GRINDING 1st'
	,$captionFontSize = 'h3'
	,$thFontSize = '15px'
	,$thFontBold = 'bold'
	,$tdFontSize = '20px'
	,$tdFontBold = 'bold'
	,$dataTable 
)

{

	echo '<div class="col-lg-4 col-sm-12">
		
			
				<center><'.$captionFontSize.' style="font-weight: bold; background: '.$captionBG.'; color: '.$captionColor.';">'.$captionHeader.'</'.$captionFontSize.'></center>
			
			
				<table class="table table-striped table-bordered table-hover table-responsive">
					<thead>								
						<tr>
													
							<th style="vertical-align: middle; text-align: center;" width="5%">LINE</th>							
							<th style="vertical-align: middle; text-align: center;" width="25%">CONDITION</th>														
							<th style="vertical-align: middle; text-align: center;" width="15%">OPERATOR</th>	
							<th style="vertical-align: middle; text-align: center;" width="10%">OK (Pcs)</th>	
							<th style="vertical-align: middle; text-align: center;" width="10%">NG (Pcs)</th>	
							<th style="vertical-align: middle; text-align: center;" width="10%">PROBLEM (Min)</th>	
						</tr>
					</thead>
					<tbody >';
					
					$no = 0 + 1;											
					while($row = sqlsrv_fetch_array($dataTable, SQLSRV_FETCH_ASSOC))			
					{			
						
						echo '<tr>';
						//echo '<td style="text-align: center; vertical-align: middle; font-size: '.$tdFontSize.'; font-weight: '.$tdFontBold.';"><center>'.$no.'</center></td>';						
						echo '<td style="text-align: center; vertical-align: middle; font-size: '.$tdFontSize.'; font-weight: bold;">'.$row['LineName'].'</td>';
						
						//Status Proses
						if($row['StatusProcess'] == 'Proses') {										
						echo '<td style="text-align: center; vertical-align: middle; color: black; font-size: '.$tdFontSize.'; font-weight:bold; background: lime;"><a style="font-size: 18px; font-weight:bold;" class="btn btn-sm" href="module/finishing_disa/bridge_checksheet.php?p='.$row['LineCode'].'&d='.$row['WorkingDate'].'&g='.$row['ShiftGroup'].'&md=1">PROCESS<a/></td>';										
						}else if($row['StatusProcess'] == 'Break') {									
						echo '<td style="text-align: center; vertical-align: middle; color: black; font-size: '.$tdFontSize.'; font-weight:bold; background: orange;"><a style="font-weight: bold; color: white;" class="btn btn-sm" href="module/finishing_disa/bridge_checksheet.php?p='.$row['LineCode'].'&d='.$row['WorkingDate'].'&g='.$row['ShiftGroup'].'&md=1">BREAK</td>';
						}else if($row['StatusProcess'] == 'NOT AVAILABLE') {									
						echo '<td style="text-align: center; vertical-align: middle; color: white; font-size: '.$tdFontSize.'; font-weight:bold; background: #A9A9A9;">N/A</td>';
						}else if($row['StatusProcess'] == 'AVAILABLE') {									
						echo '<td style="text-align: center; vertical-align: middle; color: white; font-size: '.$tdFontSize.'; font-weight:bold; background: #696969;"><a style="font-weight: bold; color: white;" class="btn btn-sm" href="module/finishing_disa/bridge_checksheet.php?p='.$row['LineCode'].'&d='.$row['WorkingDate'].'&g='.$row['ShiftGroup'].'&md=1">NOT PROCESS</td>';
						}else if($row['StatusProcess'] == 'End Shift') {									
						echo '<td style="text-align: center; vertical-align: middle; color: white; font-size: '.$tdFontSize.'; font-weight:bold; background: #696969;"><a style="font-weight: bold; color: white;" class="btn btn-sm" href="module/finishing_disa/bridge_checksheet.php?p='.$row['LineCode'].'&d='.$row['WorkingDate'].'&g='.$row['ShiftGroup'].'&md=1">NOT PROCESS<a/></td>';
						}else if($row['StatusProcess'] == 'Prepare') {									
						echo '<td style="text-align: center; vertical-align: middle; color: black; font-size: '.$tdFontSize.'; font-weight:bold; background: yellow;">PREPARE</td>';
						}else{									
						echo '<td style="text-align: center; vertical-align: middle; color: white; font-size: '.$tdFontSize.'; font-weight:bold; background: red;"><a style="font-weight: bold; color: white;" class="btn btn-sm" href="module/finishing_disa/bridge_checksheet.php?p='.$row['LineCode'].'&d='.$row['WorkingDate'].'&g='.$row['ShiftGroup'].'&md=1"> STOP<br> '.$row['StatusProcess'].'</a></td>';
						}							
						
						echo '<td style="text-align: center; vertical-align: middle; font-size: '.$tdFontSize.'; font-weight: '.$tdFontBold.';">'.$row['Operator'].'</td>';
						echo '<td style="text-align: center; vertical-align: middle; font-size: '.$tdFontSize.'; font-weight: '.$tdFontBold.';">'.$row['TotalOK'].'</td>';
						echo '<td style="text-align: center; vertical-align: middle; font-size: '.$tdFontSize.'; font-weight: '.$tdFontBold.';">'.$row['TotalNG'].'</td>';
						echo '<td style="text-align: center; vertical-align: middle; font-size: '.$tdFontSize.'; font-weight: '.$tdFontBold.';">'.$row['TotalStop'].'</td>';							
						echo '</tr>';		
						
						$no++; 
					
					}
					echo '</tbody>
				</table>
			
		
	</div>';

}

?>