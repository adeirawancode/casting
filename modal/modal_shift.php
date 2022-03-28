<?php
require "config/query/Q_melting.php";

?>
<!-- Modal Shift -->
<div class="modal fade" id="modal_shift" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SET SHIFT</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">DATE</label>
                                <input type="date" class="form-control" id="working_date" name="working_date"
                                    value="<?php echo $today; ?>">
                            </div>
                        </div>
                    </div>
								<div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">SHIFT NAME</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="radio" id="nsp" name="shift_name" value="NSP" /> NSP
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" id="nsm" name="shift_name" value="NSM" /> NSM
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">OT AWAL</label>
							<select name="OT_AWAL" class="form-control">
								<option value="REG">REG</option>
								<option value="25">2.5 Jam</option>
								<option value="20">2 Jam</option>
								<option value="10">1 Jam</option>
								<option value="05">0.5 Jam</option>
							
							</select>
                        </div>
						
						 <div class="col-4">
                            <label for="">OT AKHIR</label>
							<select name="OT_AKHIR" class="form-control">
								<option value="REG">REG</option>
								<option value="30">3 Jam</option>
								<option value="25">2.5 Jam</option>
								<option value="20">2 Jam</option>							
							</select>
                        </div>
						
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                    data-bs-target="#modal_foreman">FOREMAN</button>
                                <input class="form-control mt-2" id="foreman_id" name="foreman_id" type="hidden">
                                <input class="form-control mt-2" id="foreman_name" name="foreman_name">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                    data-bs-target="#modal_leader">LEADER</button>
                                <input class="form-control mt-2" id="leader_id" name="leader_id" type="hidden">
                                <input class="form-control mt-2" id="leader_name" name="leader_name">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                    data-bs-target="#modal_op">OPERATOR</button>
                                <input class="form-control mt-2" id="checker_id" name="checker_id" type="hidden"> 
                                <input class="form-control mt-2" id="checker_name" name="checker_name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="create_checksheet" name="create_checksheet">SETUP
                        SHIFT</button>
                </div>
            </form>
            <?php
            
                if(isset($_POST["create_checksheet"])){
                $SessionID = Date('YmdHi');
                $LineCode = $_SESSION['LineCode'];
                $dateNow = Date('Y-m-d');
                $working_date = $_POST['working_date'];
                $shift_name = $_POST['shift_name'];
                $ot_akhir = $_POST['OT_AKHIR'];
                $ot_awal = $_POST['OT_AWAL'];
                
                $foreman_id = $_POST['foreman_id'];
                $leader_id = $_POST['leader_id'];
                $checker_id = $_POST['checker_id'];
                
                $foreman_id_cek = strlen($foreman_id);
                $leader_id_cek = strlen($leader_id);
                $checker_id_cek = strlen($checker_id);
                
                if($foreman_id_cek == 2)
                {
                    $foreman = '000'.$foreman_id;
                }else if ($foreman_id_cek == 3){
                    $foreman = '00'.$foreman_id;
                }else if ($foreman_id_cek == 4){
                    $foreman = '0'.$foreman_id;
                }else{
                    $foreman = $foreman_id;
                }
                
                if($leader_id_cek == 2)
                {
                    $leader = '000'.$leader_id;
                }else if ($leader_id_cek == 3){
                    $leader = '00'.$leader_id;
                }else if ($leader_id_cek == 4){
                    $leader = '0'.$leader_id;
                }else{
                    $leader = $leader_id;
                }
                
                if($checker_id_cek == 2)
                {
                    $checker = '000'.$checker_id;
                }else if ($checker_id_cek == 3){
                    $checker = '00'.$checker_id;
                }else if ($checker_id_cek == 4){
                    $checker = '0'.$checker_id;
                }else{
                    $checker = $checker_id;
                }
                
                if($shift_name == 'NSP' && $ot_akhir == 'REG')
                {
                    $working_start =  $dateNow.' 07:30'; 
                    $working_finish =  $dateNow.' 16:25'; 
                }else if($shift_name == 'NSP' && $ot_akhir == '30')
                {
                    $working_start =  $dateNow.' 07:30'; 
                    $working_finish =  $dateNow.' 19:25';   
                }else if($shift_name == 'NSP' && $ot_akhir == '25')
                {
                    $working_start =  $dateNow.' 07:30'; 
                    $working_finish =  $dateNow.' 18:25';  
                }else if($shift_name == 'NSP' && $ot_akhir == '20'){
                    $working_start =  $dateNow.' 07:30'; 
                    $working_finish =  $dateNow.' 17:25';    
                }
                
                if($shift_name == 'NSM' && $ot_awal == 'REG')
                {
                    $working_start =  $dateNow.' 22:00'; 
                    $working_finish =  $dateNow.' 06:55';    
                }else if($shift_name == 'NSM' && $ot_akhir == '25')
                {
                    $working_start =  $dateNow.' 19:30'; 
                    $working_finish =  $dateNow.' 06:55';    
                }else if($shift_name == 'NSM' && $ot_akhir == '20')
                {
                    $working_start =  $dateNow.' 20:00'; 
                    $working_finish =  $dateNow.' 06:55';   			
                }else if($shift_name == 'NSM' && $ot_akhir == '10'){
                    $working_start =  $dateNow.' 21:00'; 
                    $working_finish =  $dateNow.' 06:55'; 
                }


                $sql_shift = "INSERT INTO [PRD].[dbo].[session_log]
                (SessionID
                ,LineCode
                ,WorkingDate
                ,SessionStart
                ,WorkingStart
                ,WorkingFinish
                ,ShiftName
                ,ForemanID
                ,LeaderID
                ,OperatorID
                ,State
                )
                VALUES
                ('$SessionID'
                ,'$LineCode'
                ,'$working_date'
                ,getdate()
                ,'$working_start'
                ,'$working_finish'
                ,'$shift_name'
                ,'$foreman'
                ,'$leader'
                ,'$checker'
                ,'ACTIVE')";
                $stmt_shift = sqlsrv_query($conn, $sql_shift);
                echo '<meta http-equiv="refresh" content="0" />';
                if($stmt_shift){
                    $_SESSION['SessionID'] = $SessionID;
                }
                $SessionID_Active = $_SESSION['SessionID'];
                }
            ?>
        </div>
    </div>
</div>

<!-- Modal Operator -->
<div class="modal fade" id="modal_op" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SET OPERATOR</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <div class="col2">
                    <div class="row">
                        <?php
                        while($row_operator = sqlsrv_fetch_array($stmt_operator, SQLSRV_FETCH_ASSOC)) { ?>
                        <div class="col-sm-3">
                            <a id="get_op" data-empid="<?php echo $row_operator['EmpID'];?>"
                                data-empname="<?php echo $row_operator['EmployeeName']; ?>">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?php echo '<img src="data:image;base64, '.base64_encode($row_operator['Picture']).'" width="50px">' ?>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <?php echo $row_operator['EmpID'] ?>
                                                </div>
                                                <div class="row">
                                                    <?php echo $row_operator['EmployeeName'] ?>
                                                </div>
                                                <div class="row">
                                                    <?php echo $row_operator['Role'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Leader -->
<div class="modal fade" id="modal_leader" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SET LEADER</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="row">
                        <?php
            while($row_leader = sqlsrv_fetch_array($stmt_leader, SQLSRV_FETCH_ASSOC)) { ?>
                        <div class="col-sm-3">
                            <a id="get_leader" data-empid="<?php echo sprintf("%s",$row_leader['EmpID']); ?>"
                                data-empname="<?php echo $row_leader['EmployeeName']; ?>">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?php echo '<img src="data:image;base64, '.base64_encode($row_leader['Picture']).'" width="50px">' ?>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <?php echo $row_leader['EmpID'] ?>
                                                </div>
                                                <div class="row">
                                                    <?php echo $row_leader['EmployeeName'] ?>
                                                </div>
                                                <div class="row">
                                                    <?php echo $row_leader['Role'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Foreman -->
<div class="modal fade" id="modal_foreman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SET FOREMAN</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <div class="col2">
                    <div class="row">
                        <?php
            while($row_foreman = sqlsrv_fetch_array($stmt_foreman, SQLSRV_FETCH_ASSOC)) { ?>
                        <div class="col-sm-3">
                            <a id="get_foreman" data-empid="<?php echo $row_foreman['EmpID']; ?>"
                                data-empname="<?php echo $row_foreman['EmployeeName']; ?>">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?php echo '<img src="data:image;base64, '.base64_encode($row_foreman['Picture']).'" width="50px">' ?>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <?php echo $row_foreman['EmpID'] ?>
                                                </div>
                                                <div class="row">
                                                    <?php echo $row_foreman['EmployeeName'] ?>
                                                </div>
                                                <div class="row">
                                                    <?php echo $row_foreman['Role'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>