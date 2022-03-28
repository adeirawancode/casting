<?php
require "config/query/Q_pouring.php";
require "config/query/Q_melting.php";
include "modal/modal_password.php";
$sessionID = $_SESSION['SessionID'];

/*
$sql_get_check = "SELECT TM.SessionID
, TM.WorkingDate
, TM.LineCode
, TM.ShiftName
, TM.EmpID
, TM.Role
, TM.State
, ET.Picture
, ET.EmployeeName
 FROM (
SELECT [SessionID]
      ,[WorkingDate]     
      ,SL.[LineCode]
      ,[ShiftName]     
      ,[LeaderID] as EmpID
    ,LD.Role
    ,State
  FROM [PRD].[dbo].[session_log] SL
  LEFT OUTER JOIN [PRD].[dbo].[mt_user] LD ON LD.EmpID = SL.LeaderID

  UNION

  SELECT [SessionID]
      ,[WorkingDate]     
      ,SL.[LineCode]
      ,[ShiftName]     
      ,[ForemanID] as EmpID
    ,LD.Role
    ,State  
  FROM [PRD].[dbo].[session_log] SL
  LEFT OUTER JOIN [PRD].[dbo].[mt_user] LD ON LD.EmpID = SL.ForemanID
) TM
LEFT OUTER JOIN [PRD].[dbo].[mt_user] ET ON ET.EmpID = TM.EmpID
WHERE State = 'ACTIVE'";
*/
$RecID = $row_melting['RecID'];
// var_dump($RecID);die;
$sql_get_check = "SELECT DT.SessionID, DT.FM, DT.RecID
, WorkingDate
, EmpID
, Role
, SL.State
, SL.Picture
, SL.EmployeeName
FROM [PRD].[dbo].[melting] DT
LEFT OUTER JOIN 
(
	SELECT TM.SessionID
	, TM.WorkingDate
	, TM.LineCode
	, TM.ShiftName
	, TM.EmpID
	, TM.Role
	, TM.State
	, ET.Picture
	, ET.EmployeeName
	, DT.FM
	, DT.RecID
	, DT.ProductCode
	 FROM (
	SELECT [SessionID]
		  ,[WorkingDate]     
		  ,SL.[LineCode]
		  ,[ShiftName]     
		  ,[LeaderID] as EmpID
		,LD.Role
		,State
	  FROM [PRD].[dbo].[session_log] SL
	  LEFT OUTER JOIN [PRD].[dbo].[mt_user] LD ON LD.EmpID = SL.LeaderID

	  UNION

	  SELECT [SessionID]
		  ,[WorkingDate]     
		  ,SL.[LineCode]
		  ,[ShiftName]     
		  ,[ForemanID] as EmpID
		,LD.Role
		,State  
	  FROM [PRD].[dbo].[session_log] SL
	  LEFT OUTER JOIN [PRD].[dbo].[mt_user] LD ON LD.EmpID = SL.ForemanID
	) TM
	LEFT OUTER JOIN [PRD].[dbo].[mt_user] ET ON ET.EmpID = TM.EmpID
	LEFT OUTER JOIN [PRD].[dbo].[melting] DT ON DT.SessionID = Tm.SessionID
) SL ON SL.SessionID = DT.SessionID AND SL.LineCode = DT.LineCode
WHERE State = 'ACTIVE'";
// AND RecID = '$RecID'
$stmt_get_check = sqlsrv_query($conn, $sql_get_check);
// var_dump($stmt_get_check);die;

?>
<div class="modal fade" id="modal_check<?php echo $row_melting['RecID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PILIH FOREMAN/LEADER</h5>               
            </div>
            <form method="POST">
                <div class="modal-body">
                <?php while($result_get_check = sqlsrv_fetch_array($stmt_get_check, SQLSRV_FETCH_ASSOC)) { ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <?php echo '<img src="data:image;base64, '.base64_encode($result_get_check['Picture']).'" width="100px">' ?>
                                </div>
                                <div class="col-6" style ="text-align : center; font-size : 18px; font-weight : bold; vertical-align: middle;">
                                    <div class="row">
                                        <?php echo $result_get_check['EmpID'] ?>
                                    </div>
                                    <div class="row">
                                        <?php echo $result_get_check['EmployeeName'] ?>
                                    </div>
                                    <div class="row">
                                        <?php echo $result_get_check['Role'] ?>
                                    </div>
                                </div>
                                <a>
                                <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#modal_password<?php echo $result_get_check['EmpID'] ?>">PILIH</button>
                                </a>
                            </div>
                        </div>
                    </div>
					
                    <div class="modal fade" id="modal_password<?php echo $result_get_check['EmpID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">INPUT PASSWORD</h5>               
                                </div>
                                <form method="POST">
                                    <div class="modal-body">
                                    <input type="password" class="form-control" name="password" autofocus required>
                                    <input type="hidden" class="form-control" name="role_empid" <?php echo $result_get_check['Role'] ?> >
                                    <input type="hidden" class="form-control" name="empid" <?php echo $result_get_check['EmpID'] ?> >
                                    <input type="hidden" class="form-control" name="recID" <?php echo $result_get_check['RecID'] ?> >
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                        <button type="submit" class="btn btn-primary" id="inspection_submit" name="inspection_submit">CHECK</button>
                                </div>
                                </form>
                                <?php
									
									if(isset($_POST["inspection_submit"]))
									{
										$password = $_POST['password'];
										$role_empid = $_POST['role_empid'];
										$empid = $_POST['empid'];
										$recID = $_POST['recID'];
										
										if($role_empid == 'LEADER')
										{
											$fieldCheck = 'LeaderCheck';
										}else{
											$fieldCheck = 'ForemanCheck';
										}
										
										
										if($password == $empid)
										{
											$update_state = "UPDATE [PRD].[dbo].[melting] SET $fieldCheck = getdate() WHERE RecID = '$recID'";
											$stmt_password = sqlsrv_query($conn, $update_state);
											if($stmt_password)
											{
												 echo '<meta http-equiv="refresh" content="0" />';
											}
										}else{
											echo '<script>alert("Password Salah !")</script>';
										}

									}
								
								
										/*
										$insp = $_POST['inspection_submit'];
										if
										if(isset($_POST["check"])){
										$sessionActive = $_POST['sessionID'];
										$sql_check = "UPDATE [PRD].[dbo].[melting]
										SET LeaderCheck = getdate()
										, ForemanCheck = getdate()
										WHERE SessionID = '$sessionActive' AND State = 'ACTIVE'";
										$stmt_end = sqlsrv_query($conn, $sql_end);
										echo '<meta http-equiv="refresh" content="0" />';
										}
										*/
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </form>
        </div>
    </div>
</div>