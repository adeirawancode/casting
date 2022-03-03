<?php
require "config/query/Q_set_member.php";
?>
<div class="row">
  <div class="col-10 pr-0">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <!-- <th scope="col">#</th> -->
          <th scope="col">NO FM</th>
          <th scope="col">PRODUCT</th>
          <th scope="col">START</th>
          <th scope="col">TEMP.</th>
          <th scope="col">PIN</th>
          <th scope="col">CHILL</th>
          <th scope="col">FINISH</th>
          <th scope="col">MOLD</th>
          <th scope="col">TOTAL</th>
          <th scope="col">MOLD NG</th>
          <th scope="col">POUR NG</th>
          <th scope="col">EMPTY</th>
          <th scope="col">OPR</th>
          <th scope="col">FDT</th>
          <th scope="col">PROBLEM</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql_data_transaction = "SELECT * FROM [PRD].[dbo].[transaction_log]";
        $stmt_data_transaction = sqlsrv_query($conn, $sql_data_transaction); 
        while($row_transaction = sqlsrv_fetch_array($stmt_data_transaction, SQLSRV_FETCH_ASSOC))			
        {			
          ?>
          <tr>
            <td><?php echo $row_transaction['FM']; ?></td>	
            <td><?php echo $row_transaction['ProductCode']; ?></td>
            <td><?php echo $row_transaction['StartTime']; ?></td>
            <td><?php echo $row_transaction['Temperature']; ?></td>
            <td><?php echo $row_transaction['PinSample']; ?></td>
            <td><?php echo $row_transaction['PanjangChill']; ?></td>
            <td><?php echo $row_transaction['FinishTime']; ?></td>
            <td><?php echo $row_transaction['Mold']; ?></td>
            <td><?php echo $row_transaction['TotalMold']; ?></td>
            <td><?php echo $row_transaction['MoldNG']; ?></td>
            <td><?php echo $row_transaction['PourNG']; ?></td>
            <td><?php echo $row_transaction['Empty']; ?></td>
            <td><?php echo $row_transaction['OperatorID']; ?></td>									
            <td><?php echo $row_transaction['FaddingTime']; ?></td>
            <td><?php echo $row_transaction['Problem']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="col-2 pl-2" style="background-color: #ffc107;">
    <?php
      $sql_session = "SELECT WorkingDate
      ,ShiftName
      ,ForemanID
      ,LeaderID
      ,OperatorID
      FROM [PRD].[dbo].[session_log]
      WHERE WorkingDate = CAST(GETDATE() as date)";
      $stmt_session = sqlsrv_query($conn, $sql_session); 
      $row_session = sqlsrv_fetch_array($stmt_session, SQLSRV_FETCH_ASSOC);
    ?>
    <form method="POST">
      <div class="form-group">
        <div class="row">
          <div class="col-6">
            <button type="button" class="btn btn-lg btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modal_shift">SET SHIFT</button>
          </div>
          <div class="col-6">
            <button type="button" class="btn btn-lg btn-secondary mt-2" data-bs-toggle="modal" data-bs-target="#modal_shift">END SHIFT</button>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col">
            <label for="">TANGGAL</label> <br>
            <input type="text" value="<?php echo $row_session['WorkingDate'];?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col">
            <label for="">SHIFT</label> <br>
            <input type="text" value="<?php echo $row_session['ShiftName'];?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <label>FOREMAN</label>
          <?php echo $row_session['ForemanID']; ?>
        </div>
        <div class="col-4">
          <label>LEADER</label>
          <?php echo $row_session['LeaderID']; ?>
        </div>
        <div class="col-4">
          <label>CHECKER</label>
          <?php echo $row_session['OperatorID']; ?>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col">
            <button type="button" class="btn btn-lg btn-block btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modal_data">ADD DATA</button>
          </div>
          <!-- <div class="col-6">
            <button type="button" class="btn btn-secondary mt-2" data-bs-toggle="modal" data-bs-target="#modal_shift">END SHIFT</button>
          </div> -->
        </div>
      </div>
    </form>
  </div>
</div>

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
          <div class="col-6">
            <div class="form-group">
              <label for="">DATE</label>
              <input type="date" class="form-control" id="working_date" name="working_date">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="">SHIFT NAME</label>
              <div class="row">
                <div class="col-6">
                  <input type="radio" name="shift_name" value="NSP"/> NSP
                </div>
                <div class="col-6">
                  <input type="radio" name="shift_name" value="NSM"/> NSM
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <div class="form-group">
              <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modal_foreman">FOREMAN</button>
              <input class="form-control mt-2" id="foreman_id" name="foreman_id">
              <input class="form-control mt-2" id="foreman_name" name="foreman_name">
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modal_leader">LEADER</button>
              <input class="form-control mt-2" id="leader_id" name="leader_id">
              <input class="form-control mt-2" id="leader_name" name="leader_name">
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modal_op">CHECKER</button>
              <input class="form-control mt-2" id="checker_id" name="checker_id">
              <input class="form-control mt-2" id="checker_name" name="checker_name">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="create_checksheet" name="create_checksheet">ADD CHECKSHEET</button>
      </div>
      </form>
      <?php
        if(isset($_POST["create_checksheet"])){
          $working_date = $_POST['working_date'];
          $shift_name = $_POST['shift_name'];
          $foreman_id = $_POST['foreman_id'];
          $leader_id = $_POST['leader_id'];
          $checker_id = $_POST['checker_id'];
          $sql = "INSERT INTO [PRD].[dbo].[session_log]
          (WorkingDate
          ,ShiftName
          ,ForemanID
          ,LeaderID
          ,OperatorID
          )
          VALUES
          ('$working_date'
          ,'$shift_name'
          ,'$foreman_id'
          ,'$leader_id'
          ,'$checker_id')";
          $stmt = sqlsrv_query($conn, $sql);
        }
      ?>
    </div>
  </div>
</div>

<!-- Modal Data -->
<div class="modal fade" id="modal_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD DATA</h5>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      <form method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modal_fm">FURNACE</button>
                <select class="form-control mt-2" aria-label="" name="fm">
                  <option value="07">07</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                </select>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modal_product">PRODUCT</button>
                <input class="form-control mt-2" id="product" name="product">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#">START</button>
                <input  type="time" class="form-control mt-2" id="start" name="start">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#">TEMPERATUR</button>
                <input type="number" class="form-control mt-2" id="temp" name="temp">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#">PIN</button>
                <input class="form-control mt-2" id="pin" name="pin">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#">CHILL</button>
                <input type="number" class="form-control mt-2" id="chill" name="chill">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#">FINISH</button>
                <input type="time" class="form-control mt-2" id="finish" name="finish">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#">MOLD</button>
                <input type="number" class="form-control mt-2" id="mold" name="mold">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#">TOTAL</button>
                <input type="number" class="form-control mt-2" id="total" name="total">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#">MOLD NG</button>
                <input type="number" class="form-control mt-2" id="mold_ng" name="mold_ng">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#">POUR NG</button>
                <input type="number" class="form-control mt-2" id="pour_ng" name="pour_ng">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#">EMPTY</button>
                <input type="number" class="form-control mt-2" id="empty" name="empty">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modal_op">OPERATOR</button>
                <input class="form-control mt-2" id="op" name="op">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#">FADDING</button>
                <input type="number" class="form-control mt-2" id="fdt" name="fdt">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#">PROBLEM</button>
                <input class="form-control mt-2" id="problem" name="problem">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="add_data" name="add_data" onClick="refresh">ADD DATA</button>
        </div>
      </form>
      <?php
        if(isset($_POST["add_data"])){
          $fm = $_POST['fm'];
          $product = $_POST['product'];
          $start = $_POST['start'];
          $temp = $_POST['temp'];
          $pin = $_POST['pin'];
          $chill = $_POST['chill'];
          $finish = $_POST['finish'];
          $mold = $_POST['mold'];
          $total = $_POST['total'];
          $mold_ng = $_POST['mold_ng'];
          $pour_ng = $_POST['pour_ng'];
          $empty = $_POST['empty'];
          $op = $_POST['op'];
          $fdt = $_POST['fdt'];
          $problem = $_POST['problem'];
          $sql_transaction = "INSERT INTO [PRD].[dbo].[transaction_log]
          (FM
          ,ProductCode
          ,StartTime
          ,Temperature
          ,PinSample
          ,PanjangChill
          ,FinishTime
          ,Mold
          ,TotalMold
          ,MoldNG
          ,PourNG
          ,Empty
          ,OperatorID
          ,FaddingTime
          ,Problem
          )
          VALUES
          ('$fm'
          ,'$product'
          ,'$start'
          ,'$temp'
          ,'$pin'
          ,'$chill'
          ,'$finish'
          ,'$mold'
          ,'$total'
          ,'$mold_ng'
          ,'$pour_ng'
          ,'$empty'
          ,'$op'
          ,'$fdt'
          ,'$problem')";
          $stmt_transaction = sqlsrv_query($conn, $sql_transaction);
        }
      ?>
    </div>
  </div>
</div>

<!-- Modal Product -->
<div class="modal fade" id="modal_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SET PRODUCT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
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
        <div class="col-12">
          <div class="row">
            <?php
            while($row_foreman = sqlsrv_fetch_array($stmt_atasan, SQLSRV_FETCH_ASSOC)) { ?>
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

<!-- Modal Operator -->
<div class="modal fade" id="modal_op" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SET OPERATOR</h5>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      <div class="modal-body">
        <div class="col-12">
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