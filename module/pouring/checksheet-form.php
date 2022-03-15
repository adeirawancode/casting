<?php
require "config/query/Q_pouring.php";
?>
<div class="row">
    <div class="col-11">
        <table class="table table-striped">
            <thead class="thead-dark" style="text-align: center">
                <tr>
                    <!-- <th width="1%" rowspan="2">Laddle</th> -->
                    <th width="1%" rowspan="2">FM</th>
                    <th width="1%" rowspan="2">Start Time</th>
                    <th width="1%" rowspan="2">Finish Time</th>
                    <th width="1%" rowspan="2">Temp.</th>
                    <th width="1%" rowspan="2">Pin Sample</th>
                    <th width="1%" rowspan="2">Panjang Chill</th>
                    <th width="1%" colspan="2">Pour</th>
                    <th width="1%" colspan="3">Problem (Qty Mold)</th>
                    <th width="2%" rowspan="2">OPR</th>
                    <th width="2%" rowspan="2">FDT</th>
                    <th colspan="9">Material Composition</th>
                    <th width="2%" rowspan="2">Frm/Ldr Check</th>
                    <th width="6%" rowspan="2">Problem</th>
                    <th width="2%" rowspan="2">Get Comp.</th>
                </tr>
                <tr>
                    <th width="1%">Mold</th>
                    <th width="1%">Total</th>
                    <th width="1%">Mold NG</th>
                    <th width="1%">Pour NG</th>
                    <th width="1%">Empty</th>
                    <th width="1%">C</th>
                    <th width="1%">Si</th>
                    <th width="1%">Mn</th>
                    <th width="1%">S</th>
                    <th width="1%">Cu</th>
                    <th width="1%">Sn</th>
                    <th width="1%">Mg</th>
                    <th width="1%">Cr</th>
                    <th width="1%">P</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_data_transaction = "SELECT * FROM [PRD].[dbo].[pouring]";
                $stmt_data_transaction = sqlsrv_query($conn, $sql_data_transaction);
                while($row_pouring = sqlsrv_fetch_array($stmt_data_transaction, SQLSRV_FETCH_ASSOC))
                {			
                ?>
                <tr>
                    <!-- <td><?php  ?></td> -->
                    <td><?php echo $row_pouring['FM']; ?></td>
                    <td><?php echo substr($row_pouring['StartTime'], 0,5); ?></td>
                    <td><?php echo substr($row_pouring['FinishTime'], 0,5); ?></td>
                    <td><?php echo $row_pouring['Temperature']; ?></td>
                    <td><?php echo $row_pouring['PinSample']; ?></td>
                    <td><?php echo $row_pouring['PanjangChill']; ?></td>
                    <td><?php echo $row_pouring['Mold']; ?></td>
                    <td><?php echo $row_pouring['TotalMold']; ?></td>
                    <td><?php echo $row_pouring['MoldNG']; ?></td>
                    <td><?php echo $row_pouring['PourNG']; ?></td>
                    <td><?php echo $row_pouring['Empty']; ?></td>
                    <td><?php echo $row_pouring['OperatorID']; ?></td>
                    <td><?php echo $row_pouring['FaddingTime']; ?></td>
                    <td><?php echo round($row_pouring['C'], 4); ?></td>
                    <td><?php echo round($row_pouring['Si'], 4); ?></td>
                    <td><?php echo round($row_pouring['Mn'], 4); ?></td>
                    <td><?php echo round($row_pouring['S'], 5); ?></td>
                    <td><?php echo round($row_pouring['Cu'], 5); ?></td>
                    <td><?php echo round($row_pouring['Sn'], 5); ?></td>
                    <td><?php echo round($row_pouring['Mg'], 5); ?></td>
                    <td><?php echo round($row_pouring['Cr'], 5); ?></td>
                    <td><?php echo round($row_pouring['P'], 5); ?></td>
                    <td><?php echo $row_pouring['Inspection']; ?></td>
                    <td><?php echo $row_pouring['StopLineID']; ?></td>
                    <td>
                        <button type="button" class="btn btn-lg btn-block btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal_composition"><?php echo $row_pouring['ProductCode']; ?></button>
                        <button type="button" class="btn btn-lg btn-block btn-primary mt-2" data-bs-toggle="modal"
                            data-bs-target="#modal_edit<?php echo $row_pouring['RecID']; ?>">Edit</button>
                    </td>
                </tr>
                 
                <?php include  "module/pouring/modal_edit.php"; }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-1 pl-0" style="background-color: #ffc107;">
        <?php
      $sql_session = "SELECT TOP 1 WorkingDate
      ,ShiftName
      ,ForemanID
      ,LeaderID
      ,OperatorID
      FROM [PRD].[dbo].[session_log]
      ORDER BY WorkingDate DESC";
      $stmt_session = sqlsrv_query($conn, $sql_session); 
      $row_session = sqlsrv_fetch_array($stmt_session, SQLSRV_FETCH_ASSOC);
        ?>
        <form method="POST" class="pl-0">
            <div class="form-group">
                <div class="col">
                    <div class="col-1 d-grid gap-2">
                        <button type="button" class="btn btn-lg btn-primary mt-2" data-bs-toggle="modal"
                            data-bs-target="#modal_data">TAMBAH DATA</button>
                    </div>
                    <!-- <div class="col-1">
                        <button type="button" class="btn btn-lg btn-secondary mt-2" data-bs-toggle="modal"
                            data-bs-target="#modal_grafik">CHART TEMP.</button>
                    </div> -->
                </div>
            </div>
            <div class="form-group">
                <div class="col-1">
                    <div class="col-1">
                        <label for="">TANGGAL</label>
                    </div>
                    <div>
                        <input type="text" size="8"
                            value="<?php echo isset($row_session['WorkingDate']) ? $row_session['WorkingDate'] : '-' ;?>">
                    </div>
                    <div class="col-1">
                        <label for="">SHIFT</label>
                    </div>
                    <div>
                        <input type="text" size="8"
                            value="<?php echo isset($row_session['ShiftName']) ? $row_session['ShiftName'] : '-' ;?>">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col-1">
                    <label>FOREMAN</label> <br>
                    <?php echo isset($row_session['ForemanID']) ? $row_session['ForemanID'] : '-'; ?>
                </div>
                <div class="col-1">
                    <label>LEADER</label> <br>
                    <?php echo isset($row_session['LeaderID']) ? $row_session['LeaderID'] : '-'; ?>
                </div>
                <div class="col-1">
                    <label>CHECKER</label> <br>
                    <?php echo isset($row_session['OperatorID']) ? $row_session['OperatorID'] : '-'; ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col">
                    <div class="col-1">
                        <button type="button" class="btn btn-lg btn-primary mt-2" data-bs-toggle="modal"
                            data-bs-target="#modal_shift">SET SHIFT</button>
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-lg btn-secondary mt-2" data-bs-toggle="modal"
                            data-bs-target="#modal_end">END SHIFT</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Shift -->
<div class="modal fade" id="modal_grafik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">GRAFIK TEMPERATURE</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
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
                                <input type="date" class="form-control" id="working_date" name="working_date"
                                    value="<?php echo $today; ?>">
                            </div>
                        </div>
                        <div class="col-6">
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
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                    data-bs-target="#modal_foreman">FOREMAN</button>
                                <input class="form-control mt-2" id="foreman_id" name="foreman_id">
                                <input class="form-control mt-2" id="foreman_name" name="foreman_name">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                    data-bs-target="#modal_leader">LEADER</button>
                                <input class="form-control mt-2" id="leader_id" name="leader_id">
                                <input class="form-control mt-2" id="leader_name" name="leader_name">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                    data-bs-target="#modal_op">CHECKER</button>
                                <input class="form-control mt-2" id="checker_id" name="checker_id">
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
          $working_date = $_POST['working_date'];
          $shift_name = $_POST['shift_name'];
          $foreman_id = $_POST['foreman_id'];
          $leader_id = $_POST['leader_id'];
          $checker_id = $_POST['checker_id'];
          $sql = "INSERT INTO [PRD].[dbo].[session_log]
          (SessionID
          ,WorkingDate
          ,ShiftName
          ,ForemanID
          ,LeaderID
          ,OperatorID
          )
          VALUES
          ('$SessionID'
          ,'$working_date'
          ,'$shift_name'
          ,'$foreman_id'
          ,'$leader_id'
          ,'$checker_id')";
          $stmt = sqlsrv_query($conn, $sql);
          echo '<meta http-equiv="refresh" content="0" />';
          if($stmt){
            $_SESSION['SessionID'] = $SessionID;
          }
          $SessionID_Active = $_SESSION['SessionID'];
          var_dump($SessionID_Active);die;
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
                <h5 class="modal-title" id="exampleModalLabel">FORM E-CHECKSHEET</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_fm">FURNACE</button>
                                <input class="form-control mt-2" id="fm" name="fm"></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_product">PRODUCT</button>
                                <input class="form-control mt-2" id="product" name="product"></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_op">OPERATOR</button>
                                <input class="form-control mt-2" id="op" name="op"></input>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>START TIME</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="get_start">START</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="start" name="start">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>FINISH TIME</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="get_finish">FINISH</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="finish" name="finish">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>POUR NG</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" onclick="addPourNG();">POUR NG</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="pour_ng" name="pour_ng">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>MOLD NG</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" onclick="addMoldNG();">MOLD NG</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="mold_ng" name="mold_ng">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>EMPTY</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" onclick="addEmpty();">EMPTY</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="empty" name="empty">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                <label type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#" id="get_finish">FINISH</label>
                <input class="form-control mt-2" id="finish" name="finish"></input>
              </div> -->
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>TEMP.</label>
                                <input type="number" class="form-control" id="temp" name="temp"></input>
                            </div>
                            <!-- <div class="form-group">
                <button type="button" class="btn btn-secondary mt-2" data-bs-toggle="modal" data-bs-target="#">PIN</button>
                <input class="form-control mt-2" id="pin" name="pin"></input>
              </div> -->
                            <div class="form-group">
                                <label>CHILL</label>
                                <input type="number" class="form-control" id="chill" name="chill"></input>
                            </div>
                            <div class="form-group">
                                <label>MOLD</label>
                                <input type="number" class="form-control" id="mold" name="mold"></input>
                            </div>
                            <div class="form-group">
                                <label>TOTAL</label>
                                <input type="number" class="form-control" id="total" name="total"></input>
                            </div>
                            <div class="form-group">
                                <label>FDT</label>
                                <input type="text" class="form-control" id="fdt" name="fdt"></input>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                    data-bs-target="#">START PROBLEM</button>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                    data-bs-target="#">FINISH PROBLEM</button>
                            </div>
                        </div>
                        <textarea class="form-control mt-2" id="problem" name="problem"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="add_data" name="add_data">TAMBAH DATA</button>
                </div>
            </form>
            <?php
            // $RecordID = Date();
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
          $sql_transaction = "INSERT INTO [PRD].[dbo].[pouring]
          (SessionID
           ,FM
           ,ProductCode
           ,StartTime
           ,FinishTime
           ,Temperature
           ,PinSample
           ,PanjangChill
           ,Mold
           ,TotalMold
           ,MoldNG
           ,PourNG
           ,Empty
           ,OperatorID
           ,FaddingTime)
          VALUES
          ('$SessionID_Active'
          ,'$fm'
          ,'$product'
          ,'$start'
          ,'$finish'
          ,'$temp'
          ,'OK'
          ,'$chill'
          ,'$mold'
          ,'$total'
          ,'$mold_ng'
          ,'$pour_ng'
          ,'$empty'
          ,'$op'
          ,'$fdt')";
          $stmt_transaction = sqlsrv_query($conn, $sql_transaction);
          echo '<meta http-equiv="refresh" content="0" />';
          var_dump($stmt_transaction);die;
        }
      ?>
        </div>
    </div>
</div>

<!-- Modal Composition -->
<div class="modal fade" id="modal_composition" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SET COMPOSITION</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                  // *** Initialize Local Variables & Constants
                  $second = date('s');
                  $odd_sec = $second%2;
                  $values = array("","","","","","","","","","","","","","","","","","","","");
                  $tr_time = array("","","","","","","","","","","","","","","","","","","","");
                  $furnace = array("","","","","","","","","","","","","","","","","","","","");
                  $samples = array("","","","","","","","","","","","","","","","","","","","");
                  $laddle = array("","","","","","","","","","","","","","","","","","","","");
                  $spektro = array("","","","","","","","","","","","","","","","","","","","");
                  $max_show = 15;
                  $data = "";
                  $idx_data_last = 0;
                  $idx_data_next = 0;
                  $idx_sample = 0;
                  $idx_value = 0;
                  $idx_status = 0;
                  
                  //make blink
                  $detiku = date('s');
                  $modi = fmod($detiku,2); 
                ?>

                    <?php
                  //table output layout
                  $elements = array("C","Si","Mn","S","Cu","Sn","Cr","P","Zn","Al","Ti","Mg","Ni","V","Mo","Sb","Fe1","Fe2");
                  $layout = "";
                  $layout .= "<table class=\"table table-striped\">";
                  // Table Header
                  $layout .= "<tr align=\"center\">";
                  $layout .= "<th width=\"2%\" ><span class=\"tableheader\" >NO</span></th>";
                  $layout .= "<th width=\"8%\" ><span class=\"tableheader\" >TIME</span></th>";
                  $layout .= "<th width=\"2%\" ><span class=\"tableheader\" >FM</span></th>";
                  $layout .= "<th width=\"10%\" ><span class=\"tableheader\" >SAMPLE</span></th>";
                  $layout .= "<th width=\"4%\" ><span class=\"tableheader\" >LADDLE</span></th>";
                  $width_cell = round(80/count($elements),2);
                  for ($i=0;$i<count($elements);$i++) {
                    $layout .= "<th width=\"".$width_cell."%\" ><span class=\"tableheader\" >".$elements[$i]."</span></th>";
                  }
                  $layout .= "<th width=\"2%\" ><span class=\"tableheader\" >OPSI</span></th>";
                  $layout .= "</tr>";

                  // Table Data
                  //$query = "SELECT * FROM tdata_log ORDER BY fid DESC LIMIT $max_show";
                  // $query = "SELECT * FROM tdisplay WHERE fdisplay_name = 'LOCAL' ORDER BY fid DESC";
                  $result = mysqli_query($conn_mysql, "SELECT fid
                  , ftr_time
                  , ffurnace
                  , fsample
                  , fladdle
                  , fspektro
                  , fdisplay_name
                  , fshow
                  FROM db_cms.tdisplay ORDER BY ftr_time DESC LIMIT 10");
                  $num_rows = mysqli_num_rows($result);
                  // var_dump($num_rows);die;
                  $i=$num_rows;
                  if ($num_rows > 0) {
                    while ( $row = mysqli_fetch_array($result) ) {
                      if ($i>=($num_rows-$max_show)) {
                        if ($i%2) {
                          $def_bg_color = "#33FFFF";
                        } else {
                          $def_bg_color = "white";
                        }
                        $layout .= "<tr align=\"center\" >";
                        $fid[$i] = $row['fid'];
                        $tr_time[$i] = $row['ftr_time']; $pos_sp = strpos($tr_time[$i]," ");
                        $tr_time[$i] = substr($tr_time[$i],($pos_sp+1),(strlen($tr_time[$i])-$pos_sp-4));
                        $furnace[$i] = substr($row['ffurnace'],2,(strlen($row['ffurnace'])-2));
                        $samples[$i] = $row['fsample'];
                        $laddle[$i] = $row['fladdle'];
                        $spektro[$i] = $row['fspektro'];
                        $kodeloe[$i] = $row['fsample'];
                        $spek[$i] = $row['fspektro'];
                        // var_dump($spek[$i]);die; 

                        $idx_data_next = strpos($spektro[$i],"#"); //int(8) #=8 :=6
                        // echo $spektro[$i];
                        
                        $data_element[0] = "";
                        $data_value[0] = "";
                        $data_status[0] = "";
                        $j=1;
                        while ($idx_data_next > 0) {
                          $data = substr($spektro[$i],$idx_data_last,($idx_data_next-$idx_data_last)); //string(8) "C=3.35:0"
                          $pos_eq = strpos($data,"="); //int(3)
                          $pos_dz = strpos($data,":"); //int(10)
                          $data_element[$j] = substr($data,0,$pos_eq); //element unsur
                          $data_value[$j] = substr($data,($pos_eq+1),($pos_dz-$pos_eq-1)); //value hasil cms
                          $data_status[$j] = substr($data,($pos_dz+1),(strlen($data)-$pos_dz)); //status 0 belakang
                          $cms =  $data_element[$j]."=".$data_value[$j];
                          $spektro[$i] = substr($spektro[$i],($idx_data_next + 1),(strlen($spektro[$i])-$idx_data_next));
                          $idx_data_next = strpos($spektro[$i],"#");
                          if ((empty($idx_data_next))) {
                            $idx_data_next = strlen($spektro[$i]);
                          }
                          $j++;
                        //   echo $cms;
                        }
                        // echo $cms;
                        // var_dump($idx_data_next);die;
                        $spektro_data = str_replace('#','-',$spek[$i]);
                        $layout .= "<td bgcolor=\"".$def_bg_color."\" width=\"2%\" align=\"center\" ><span class=\"tablecell\" >".($i)."</span></td>";
                        $layout .= "<td bgcolor=\"".$def_bg_color."\" width=\"8%\" align=\"center\" ><span class=\"tablecell\" >".$tr_time[$i]."</span></td>";
                        $layout .= "<td bgcolor=\"".$def_bg_color."\" width=\"2%\" ><span class=\"tablecell\" >".$furnace[$i]."</span></td>";
                        
                        $num_rows1 = 0;
                        $query1 = "SELECT fcode FROM tstandar WHERE fcode = '{$kodeloe[$i]}'";
                        
                        $query_count = mysqli_query($conn_mysql, "SELECT COUNT(fcode) fcode FROM tstandar WHERE fcode = '{$kodeloe[$i]}'");
                        $num_rows1 = $query_count;
                        
                        echo $num_rows1."<br/>";
                        // var_dump($num_rows1);die;
                        if ($num_rows1 > 0) {
                          $layout .= "<td bgcolor=\"".$def_bg_color."\" width=\"10%\" ><span class=\"tablecell bg-warning\" >".$samples[$i]."</span></td>";
                        } else {
                          $layout .= "<td bgcolor=\"bg-warning\"  width=\"10%\" ><span class=\"tablecell\" >".$samples[$i]."</span></td>";
                        }

                        $layout .= "<td bgcolor=\"".$def_bg_color."\" width=\"4%\" ><span class=\"tablecell\" >".$laddle[$i]."</span></td>";

                        for ($k=0;$k<count($elements);$k++) {
                          $searchTerm = $elements[$k];
                          $pos = array_search($searchTerm,$data_element);

                      $red_min = 0;
                      $red_max = 0;
                      $blue_min = 0;
                      $blue_max = 0;
                      
                      // $queryku = mysqli_query("SELECT * FROM tstandar WHERE fcode = '{$kodeloe[$i]}' and felement = '$searchTerm'");
                    //   while($queryku2=mysql_fetch_array($queryku))	
                    //  {
                    // 	$red_min = $queryku2['fmin'];
                    // 	$red_max = $queryku2['fmax'];
                      //$blue_min = $queryku2['fmin_blue'];
                      //$blue_max = $queryku2['fmax_blue'];
                    //}
                    
                    //cek apakah sample ada ?
                    //  $adasample = 0;
                    //  if($red_min != ""){
                    // 	$adasample = 1; 
                    //  }
                    
                      
                          //echo $searchTerm." - ".$pos."<br/>";
                          if ($i%2) {
                            $def_bg_color = "#33FFFF";
                          } else {
                            $def_bg_color = "white";
                          }
                          if (empty($pos)) { $disp_value = ""; }
                          else {
                            $disp_value = $data_value[$pos];
                            $disp_status = intval($data_status[$pos]);
                            switch ($disp_status) {
                              case 1 :
                                if ($odd_sec) { $def_bg_color = "red"; }
                                break;
                              case 2 :
                                $def_bg_color = "yellow";
                                break;
                            }
                            // echo $pos." | ".$data_element[$pos]." | ".$disp_value." | ".$disp_status."<br/>";
                          }
                      
                      
                      $disp_value = $data_value[$pos];
                      
                      //echo "<font color='white'>".$red_max."</font><br>";
                      
                      //if($disp_value <= $red_min || $disp_value >= $red_max){
                        if($disp_value < $red_min || $disp_value > $red_max){
                      $def_bg_color = "white";
                      
                      }else{
                        if ($i%2) {
                        $def_bg_color = "#33FFFF";
                        } else {
                        $def_bg_color = "white";
                        }
                      }
                      
                      
                      if($red_max == ""){
                        //echo $searchTerm." - ".$pos."<br/>";
                        if ($i%2) {
                        $def_bg_color = "#33FFFF";
                        } else {
                        $def_bg_color = "white";
                        }
                      }else{
                        $def_bg_color = $def_bg_color;
                      }


                      // if($adasample == 0){
                      // 	$def_bg_color = "#FFFF00";
                      // }
                      
                      //make blink
                      if($def_bg_color == "blue" || $def_bg_color == "red"){
                      //if($modi == 1){   
                        $blink = $def_bg_color;
                      /*}else{
                        if ($i%2) {
                        $blink = "#33FFFF";
                        } else {
                        $blink = "white";
                        }
                      }*/
                      }else{
                        $blink = $def_bg_color;
                      }
                      
                          
                    $layout .= "             <td bgcolor=\"".$blink."\" align=\"center\" ><span class=\"tablecell\" >".$disp_value."</span></td>";
                          //$layout .= "             <td bgcolor=\"".$def_bg_color."\" align=\"center\" ><span class=\"tablecell\" >".$disp_value."</span></td>";
                        }
                        $layout .= "<td><a type=\"submit\" class=\"button btn-lg btn-primary\" href=\"module/pouring/composition.php?fm=$furnace[$i]&sample=$kodeloe[$i]&laddle=$laddle[$i]&qty=$spektro_data\">PILIH</a></td>";
                        $layout .= "             </tr>";
                      }
                      $i--;
                    }
                  } else {
                      $colspan = count($elements)+5;
                      $layout .= "<tr align=\"center\" >";
                      $layout .= "<td colspan=\"".$colspan."\" align=\"center\" ><span class=\"tablecell\" >No Data on Display</span></td>";
                      $layout .= "</tr>";
                  }
                  $layout .="</table>";
                  echo $layout;

                ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal FM -->
<div class="modal fade" id="modal_fm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SET FM</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col">
                            <a id="get_fm" data-fmid="11">
                                <div class="card">
                                    <div class="card-body">
                                        <p>11</p>
                                    </div>
                                </div>
                            </a>
                            <a id="get_fm" data-fmid="12">
                                <div class="card">
                                    <div class="card-body">
                                        <p>12</p>
                                    </div>
                                </div>
                            </a>
                            <a id="get_fm" data-fmid="14">
                                <div class="card">
                                    <div class="card-body">
                                        <p>14</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Product -->
<div class="modal fade" id="modal_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SET PRODUCT</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="row">
                        <?php
            while($row_product = sqlsrv_fetch_array($stmt_product, SQLSRV_FETCH_ASSOC)) { ?>
                        <div class="col-sm-3">
                            <a id="get_product" data-prdid="<?php echo $row_product['PartName']; ?>">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <?php echo $row_product['PartName']; ?>
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
                <div class="col-12">
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