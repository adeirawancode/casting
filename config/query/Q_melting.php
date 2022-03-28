<?php

$get_member = "SELECT [SessionID]
      ,[WorkingDate]
      ,[ProcessCode]
      ,[LineCode]
      ,[ShiftName]
      ,[OperatorID]
      ,[LeaderID]
      ,[ForemanID]
      ,[WorkingStart]
      ,[WorkingFinish]
      ,[SessionStart]
      ,[SessionFinish]
      ,[AssetID]
      ,[State]
  FROM [PRD].[dbo].[session_log] WHERE State = 'ACTIVE'";
  $stmt_get_member = sqlsrv_query($conn, $get_member);

  
  
  $cek_event_active = "SELECT COUNT(*) AdaEvent FROM [PRD].[dbo].[session_log] WHERE State = 'ACTIVE'";
  $stmt_event_active = sqlsrv_query($conn, $cek_event_active);
  while($event_active = sqlsrv_fetch_array($stmt_event_active, SQLSRV_FETCH_ASSOC))
  {
	  $adaEvent = $event_active['AdaEvent'];
  }
  
  $get_event_active = "SELECT TOP 1 LineCode, ShiftName, WorkingDate, SessionID FROM [PRD].[dbo].[session_log] WHERE State = 'ACTIVE' ORDER BY WorkingDate DESC";
  $stmt_event_get = sqlsrv_query($conn, $get_event_active);
  while($event_get = sqlsrv_fetch_array($stmt_event_get, SQLSRV_FETCH_ASSOC))
  {
	  $LineCode = $event_get['LineCode'];
	  $ShiftName = $event_get['ShiftName'];
	  $WorkingDate =  $event_get['WorkingDate'];
    $SessionID =  $event_get['SessionID'];

    $_SESSION['SessionID'] = $SessionID;
    $_SESSION['LineCode'] = $LineCode;
    
  }
  
  $get_fm = "SELECT FurnanceID, FurnanceName, FurnanceNumber FROM [PRD].[dbo].[mt_furnance] WHERE CF_Active = 1";
  $stmt_fm = sqlsrv_query($conn, $get_fm);
 
  
  
?>