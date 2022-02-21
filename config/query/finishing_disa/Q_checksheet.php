<?php

//Main Value Checksheet
	$sql= "DECLARE
				@WorkingDate as date,
				@LineCode as varchar(15),
				@ShiftGroup as varchar(10)

				Set @WorkingDate = '$date'
				Set @LineCode = '$line'
				Set @ShiftGroup = '$groupFrm'

				Select HariKerja
				,dbo.fn_FormatDateTime(Mulai, 'HH:MM 24') as Mulai
				,dbo.fn_FormatDateTime(Selesai, 'HH:MM 24') as Selesai
				,ProductCode
				,PartName
				,CastingSTOCode
				,CastDate
				,LineCode
				,Case
					WHEN ShiftName = 'SP' then 'NSP'
					WHEN ShiftName = 'SM' then 'NSM'
					END As ShiftName
				,ShiftGroup
				,TotalOK
				,TotalNG
				,Istirahat
				,Gomi
				,Kusare
				,Dakon
				,Yuzakai
				,Kataochi
				,Other
				,Aka
				,Hike
				,Mikui
				,Oshigomi
				,OverGerinda
				,SoundCheck
				,Bending
				,Rework
				,Material
				,SettingMeja
				,GantiTool
				,Mesin
				,Lain
				From PRD.dbo.fn_checksheet_line(@WorkingDate, @LineCode, @ShiftGroup)
				ORDER BY LineCode, HariKerja, SessionID, SubSessionID, ProductCode";	
	
	//Total OK & NG
	$sql1 = "DECLARE
		@WorkingDate as date,
		@LineCode as varchar(15),
		@ShiftGroup as varchar(10)

		Set @WorkingDate = '$date'
		Set @LineCode = '$line'
		Set @ShiftGroup = '$groupFrm'
	
		select LG.SessionID
		,LG.LineCode
		,LG.WorkingDate
		,LG.ShiftGroup
		,LOK.TotalOK
		,LNG.TotalNG
		 from [PRD].[dbo].[session_log] LG

		LEFT JOIN
		(
			Select SessionID,LineCode,WorkingDate, Sum(Qty) as TotalOK From [PRD].[dbo].[Qty_log] Where WorkingDate = @WorkingDate and LineCode = @LineCode and Kind = 'OK' GROUP BY  SessionID,LineCode,WorkingDate
		) LOK ON LOK.SessionID = LG.SessionID

		LEFT JOIN
		(
			Select SessionID,LineCode,WorkingDate, Sum(Qty) as TotalNG From [PRD].[dbo].[Qty_log] Where WorkingDate = @WorkingDate and LineCode = @LineCode and Kind = 'NG'  GROUP BY  SessionID,LineCode,WorkingDate
		) LNG ON LNG.SessionID = LG.SessionID

	 Where LG.LineCode = @LineCode
	 and LG.WorkingDate = @WorkingDate
	 and LG.ShiftGroup = @ShiftGroup";
	
	//Cek Apakah Terdapat Sessi
	$sqlsesi = "DECLARE
		@WorkingDate as date,
		@LineCode as varchar(15),
		@ShiftGroup as varchar(10)

		Set @WorkingDate = '$date'
		Set @LineCode = '$line'
		Set @ShiftGroup = '$groupFrm'
		
	select COUNT(*) as Sesi from (
	select top 1 LO.LineCode	
			,ShiftGroup		
			,LO.Status
			,WorkingDate		
			FROM [PRD].[dbo].[session_log] LO
			LEFT OUTER JOIN
			[PRD].[dbo].[mt_line_process] LT ON LT.LineCode = LO.LineCode
			Where WorkingDate = @WorkingDate
			and LO.LineCode = @LineCode
			and ShiftGroup = @ShiftGroup
	)TG";
	$stmtsesi = sqlsrv_query($conn, $sqlsesi);
	$rowsesi = sqlsrv_fetch_array($stmtsesi, SQLSRV_FETCH_ASSOC);
	$adasessi =  $rowsesi['Sesi'];
	
	//JIka terdapat sessi maka tampilkan, jika tidak maka blank
	if($adasessi == 1)
	{
		$sql2 = "select top 1 LO.AssetID
		,SessionID
		,LO.LineCode
		,CASE 
			WHEN ShiftName = 'SP' then 'NSP'
			WHEN ShiftName = 'SM' then 'NSM'
			END AS ShiftName
		,ShiftGroup
		,SessionStart
		,SessionFinish
		,LO.Status
		,WorkingDate
		,LT.LineProcess
		,LT.LineName
		FROM [PRD].[dbo].[session_log] LO
		LEFT OUTER JOIN
		[PRD].[dbo].[mt_line_process] LT ON LT.LineCode = LO.LineCode
		Where WorkingDate = '$date'
		and LO.LineCode = '$line'
		and ShiftGroup = '$groupFrm'";
		$stmt2 = sqlsrv_query($conn, $sql2);
		$row2 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC);
		$sessi =  $row2['SessionID'];
		$asset =  $row2['AssetID'];
		$shiftName =  $row2['ShiftName'];
		$statusLine =  $row2['LineProcess'];
		$nameLine =  $row2['LineName'];
	}else{
		$sessi =  '';
		$asset =  '';
		$shiftName =  '';
		$statusLine =  '';
		$nameLine =  '';
	}
	
	//Menentukan Sesi & Asset ID untuk mendapatkan Informasi Value Header (Foreman, Leader, Operator)
	$sql3 = "SELECT distinct SS.SessionID
	,SS.EmpID
	,ET.EmployeeName
	,SS.Role
	,SS.AssetID
	FROM [PRD].[dbo].[session_users] SS
	Left outer join [ATI].[dbo].[HRD_EMPLOYEE_TABLE] ET
	ON ET.EmpID = SS.EmpID
	left outer join [PRD].[dbo].[qty_log] LO
	ON LO.AssetID = SS.AssetID and LO.SessionID = SS.SessionID
	Where SS.SessionID = '$sessi'
	and SS.AssetID = '$asset'";
	
	$sql5 = "select TOP 1 AssetID
	,SessionID
	,CASE
		WHEN ShiftName = 'SP' then 'NSP'
		WHEN ShiftName = 'SM' then 'NSM'
		End As ShiftName
	,ShiftGroup
	,SessionStart
	,SessionFinish from [PRD].[dbo].[session_log]
	Where SessionID = '$sessi'
	and AssetID = '$asset'";
	$stmt5 = sqlsrv_query($conn, $sql5);
	$row5 = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC);


?>