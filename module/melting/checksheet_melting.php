<?php
require "config/query/Q_pouring.php";
require "config/query/Q_melting.php";
require "config/query/Q_config.php";

include "modal/modal_shift.php";
include "modal/modal_finish.php";
include "modal/modal_product.php";

$SessionID = $_SESSION['SessionID'];

if(isset($_SESSION['fmName']))
{
	$fmName = $_SESSION['fmName'];
	
}else{
	$fmName = 'NOT SET';
}

if(isset($_SESSION['fmActive']))
{
	$fmActive = $_SESSION['fmActive'];	
	
}else{
	$fmActive = 'NOT SET';
}


?>
<table id="" width="100%" class="table-bordered" style="overflow-x:auto;" cellspacing="0" cellpadding="0">												
	 <tbody>
        <tr>
            <th style="vertical-align: middle; text-align : center; font-size : 0px;" rowspan="2"><a href="pages.php?p=dashboard.php"><img src="img/ATI_bg.png" width="60"></a></th>							
            <th style="vertical-align: middle; text-align : center; font-size : auto; font-weight: bold;" rowspan="2">MELTING REPORT</th>	
            <th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;">Tanggal</th>
            <th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;">Shift</th>										
            <th style="vertical-align: middle; text-align : center; font-size : 13px;">Operator</th>									
            <th style="vertical-align: middle; text-align : center; font-size : 13px;">Leader</th>									
            <th style="vertical-align: middle; text-align : center; font-size : 13px;">Foreman</th>
            <th style="vertical-align: middle; text-align : right;" rowspan="2">
			
			<?php while($row_fm = sqlsrv_fetch_array($stmt_fm, SQLSRV_FETCH_ASSOC)) { ?>
				 <a href="module/melting/ac_change_fm.php?f=<?php echo $row_fm['FurnanceNumber']; ?>&fName=<?php echo $row_fm['FurnanceName']; ?>" class="btn btn-primary" name="<?php echo $row_fm['FurnanceID']; ?>"><?php echo $row_fm['FurnanceName']; ?></a>
			<?php } ?>
			
				<?php if($adaEvent < 1) { ?>
 					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_shift">SET SHIFT</button>
				<?php }else{ ?>	
					<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal_end">END SHIFT</button>
				<?php } ?>
			</th>
        </tr>
	
	
		<?php while($row_session = sqlsrv_fetch_array($stmt_get_member, SQLSRV_FETCH_ASSOC)) { ?>
        <tr>
            <td style="vertical-align: middle; text-align : center; font-size : 13px;"><?php echo isset($row_session['WorkingDate']) ? $row_session['WorkingDate'] : '-' ;?></td>
            <td style="vertical-align: middle; text-align : center; font-size : 13px;"><?php echo isset($row_session['ShiftName']) ? $row_session['ShiftName'] : '-' ;?></td>
            <td style="vertical-align: middle; text-align : center; font-size : 13px;"><?php echo isset($row_session['OperatorID']) ? $row_session['OperatorID'] : '-' ;?></td>										
            <td style="vertical-align: middle; text-align : center; font-size : 13px;"><?php echo isset($row_session['LeaderID']) ? $row_session['LeaderID'] : '-' ;?></td>										
            <td style="vertical-align: middle; text-align : center; font-size : 13px;"><?php echo isset($row_session['ForemanID']) ? $row_session['ForemanID'] : '-' ;?></td>										
        </tr>            
		<?php } ?>
    </tbody>
</table>

<div class="card-header bg-warning">
    <h4><?php echo $fmName; ?></h4>
</div>

<div class="row">
    <div class="col-12">
        <a href="pages.php?p=module/melting/form_melting.php">
            <button type="button" class="btn btn-primary" id="" name="">TAMBAH DATA</button>
        </a>
    </div>
</div>

<table width="100%" class="table-bordered table-responsive table-striped" style="overflow-x:auto;">
    <thead class="thead-light">
      <tr style ="text-align : center; font-size : 12px; font-weight : bold; vertical-align: middle;" >
        <!-- <th rowspan="4">No</th> -->
        <th colspan="6">Remelting</th>
        <th rowspan="4">Nama Produk</th>
        <th colspan="11">Raw Material</th>
        <th rowspan="4">Cairan Balik</th>
        <th rowspan="4">Total Charging</th>
        <th colspan="8">Alloy Material</th>
        <th rowspan="4">Other</th>
        <th rowspan="4">Temp.</th>
        <th rowspan="4">Time Sample</th>
        <th rowspan="4">Time Analyst</th>
        <th colspan="13">Chemical Composition</th>
        <th rowspan="4">Catr.</th>
        <th rowspan="4">Garpu</th>
        <th rowspan="4">Insp.</th>
        <th rowspan="4">Get Data Bunker</th>
        <th rowspan="4">Get Comp. FM</th>
        <th rowspan="4">Adjust</th>
        <th rowspan="4">Edit</th>
      </tr>
      <tr style ="text-align : center; font-size : 12px; font-weight : bold; vertical-align: middle;" >
        <th rowspan="3">Time Start</th>
        <th rowspan="3">Time Finish</th>
        <th rowspan="3">Time Total</th>
        <th rowspan="3">KWH Awal</th>
        <th rowspan="3">KWH Akhir</th>
        <th rowspan="3">KWH Total</th>
        <th rowspan="3">RS FC</th>
        <th rowspan="3">FCD 450</th>
        <th rowspan="3">FCD 500</th>
        <th rowspan="3">FCD 600</th>
        <th rowspan="3">High Mn</th>
        <th rowspan="3">Low Mn</th>
        <th rowspan="3">Potong</th>
        <!-- <th colspan="3">Stell Scrap</th> -->
        <th rowspan="3">Chips</th>
        <th rowspan="3">Start Block</th>
        <th rowspan="3">Pig Iron</th>
        <th rowspan="3">Kawul</th>
        <th colspan="2">Carbon</th>
        <th rowspan="3">Fe-Si</th>
        <th rowspan="3">Si C</th>
        <th rowspan="3">Si-Mn</th>
        <th rowspan="3">Sn</th>
        <th rowspan="3">S</th>
        <th rowspan="3">Cu</th>
        <th rowspan="3">C</th>
        <th rowspan="3">Si</th>
        <th rowspan="3">Mn</th>
        <th rowspan="3">S</th>
        <th rowspan="3">Cu</th>
        <th rowspan="3">Sn</th>
        <th rowspan="3">Cr</th>
        <th rowspan="3">P</th>
        <th rowspan="3">Zn</th>
        <th rowspan="3">Al</th>
        <th rowspan="3">Ti</th>
        <th rowspan="3">Ni</th>
        <th rowspan="3">Sb</th>
      </tr>
      <tr style ="text-align : center; font-size : 12px; font-weight : bold; vertical-align: middle;" >
        <th rowspan="2">Asb</th>
        <th rowspan="2">Sac</th>
      </tr>
    </thead>
    <tbody>
      <?php
          $sql_data_melting = "SELECT * FROM [PRD].[dbo].[melting] WHERE SessionID = '$SessionID' ORDER BY RecID";
          $stmt_data_melting = sqlsrv_query($conn, $sql_data_melting);
          while($row_melting = sqlsrv_fetch_array($stmt_data_melting, SQLSRV_FETCH_ASSOC))
          {			
          ?>
          <!-- <tr>
            <td colspan="31"></td>
            <td>MIN</td>
            <td> <?php echo ($row_melting['CAct']); ?></td>
            <td> <?php echo ($row_melting['SiAct']); ?></td>
            <td> <?php echo ($row_melting['MnAct']); ?></td>
            <td> <?php echo ($row_melting['SAct']); ?></td>
            <td> <?php echo ($row_melting['CuAct']); ?></td>
            <td> <?php echo ($row_melting['SnAct']); ?></td>
            <td> <?php echo ($row_melting['CrAct']); ?></td>
            <td> <?php echo ($row_melting['PAct']); ?></td>
            <td> <?php echo ($row_melting['ZnAct']); ?></td>
            <td> <?php echo ($row_melting['AlAct']); ?></td>
            <td> <?php echo ($row_melting['TiAct']); ?></td>
            <td> <?php echo ($row_melting['NiAct']); ?></td>
            <td> <?php echo ($row_melting['SbAct']); ?></td>
          </tr>
          <tr>
            <td colspan="31"></td>
            <td>MAX</td>
            <td> <?php echo ($row_melting['CAct']); ?></td>
            <td> <?php echo ($row_melting['SiAct']); ?></td>
            <td> <?php echo ($row_melting['MnAct']); ?></td>
            <td> <?php echo ($row_melting['SAct']); ?></td>
            <td> <?php echo ($row_melting['CuAct']); ?></td>
            <td> <?php echo ($row_melting['SnAct']); ?></td>
            <td> <?php echo ($row_melting['CrAct']); ?></td>
            <td> <?php echo ($row_melting['PAct']); ?></td>
            <td> <?php echo ($row_melting['ZnAct']); ?></td>
            <td> <?php echo ($row_melting['AlAct']); ?></td>
            <td> <?php echo ($row_melting['TiAct']); ?></td>
            <td> <?php echo ($row_melting['NiAct']); ?></td>
            <td> <?php echo ($row_melting['SbAct']); ?></td>
          </tr> -->
          <tr style ="text-align : center; font-size : 12px; font-weight : bold; vertical-align: middle;">
              <td><?php echo substr($row_melting['StartTime'], 11,5); ?></td>
              <td> <?php echo substr($row_melting['FinishTime'], 11,5); ?></td>
              <td> <?php echo ($row_melting['TotalTime']); ?></td>
              <td> <?php echo ($row_melting['KWHAwal']); ?></td>
              <td> <?php echo ($row_melting['KWHAkhir']); ?></td>
              <td> <?php echo isset($row_melting['KWHTotal']) ? $row_melting['KWHTotal'] < 0 === 0 : $row_melting['KWHTotal']; ?></td>
              <td style ="background: #ffff00;"> <?php echo ($row_melting['ProductCode']); ?></td>
              <td> <?php echo ($row_melting['FC']); ?></td>
              <td> <?php echo ($row_melting['FCD450']); ?></td>
              <td> <?php echo ($row_melting['FCD500']); ?></td>
              <td> <?php echo ($row_melting['FCD600']); ?></td>
              <td> <?php echo ($row_melting['HighMn']); ?></td>
              <td> <?php echo ($row_melting['LowMn']); ?></td>
              <td> <?php echo ($row_melting['Potong']); ?></td>
              <td> <?php echo ($row_melting['Chips']); ?></td>
              <td> <?php echo ($row_melting['STBlock']); ?></td>
              <td> <?php echo ($row_melting['PigIron']); ?></td>
              <td> <?php echo ($row_melting['Kawul']); ?></td>
              <td> <?php echo ($row_melting['CairanBalik']); ?></td>
              <td> <?php echo ($row_melting['TotalCharging']); ?></td>
              <td> <?php echo ($row_melting['Asbury']); ?></td>
              <td> <?php echo ($row_melting['Sacrab']); ?></td>
              <td> <?php echo ($row_melting['FeSi']); ?></td>
              <td> <?php echo ($row_melting['SiC']); ?></td>
              <td> <?php echo ($row_melting['SiMn']); ?></td>
              <td> <?php echo ($row_melting['Sn']); ?></td>
              <td> <?php echo ($row_melting['S']); ?></td>
              <td> <?php echo ($row_melting['Cu']); ?></td>
              <td> <?php echo ($row_melting['Other']); ?></td>
              <td> <?php echo ($row_melting['Temperature']); ?></td>
              <td> <?php echo substr($row_melting['TimeSample'], 11,5); ?></td>
              <td> <?php echo substr($row_melting['TimeAnalyst'], 11,5); ?></td>
              <td> <?php echo ($row_melting['CAct']); ?></td>
              <td> <?php echo ($row_melting['SiAct']); ?></td>
              <td> <?php echo ($row_melting['MnAct']); ?></td>
              <td> <?php echo ($row_melting['SAct']); ?></td>
              <td> <?php echo ($row_melting['CuAct']); ?></td>
              <td> <?php echo ($row_melting['SnAct']); ?></td>
              <td> <?php echo ($row_melting['CrAct']); ?></td>
              <td> <?php echo ($row_melting['PAct']); ?></td>
              <td> <?php echo ($row_melting['ZnAct']); ?></td>
              <td> <?php echo ($row_melting['AlAct']); ?></td>
              <td> <?php echo ($row_melting['TiAct']); ?></td>
              <td> <?php echo ($row_melting['NiAct']); ?></td>
              <td> <?php echo ($row_melting['SbAct']); ?></td>
              <td> <?php echo ($row_melting['Catridge']); ?></td>
              <td> <?php echo ($row_melting['GarpuSlug']); ?></td>
              <td><button type="button" class="btn btn-success btn-block" data-bs-toggle="modal" data-bs-target="#modal_check<?php echo $row_melting['RecID']; ?>">Check</button></td>
              <td><button type="button" class="btn btn-info btn-block" data-bs-toggle="modal" data-bs-target="#modal_bunker">Bunker</button></td>
              <td><button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#modal_composition"><?php echo ($row_melting['FM']); ?></button></td>
              <td><a href="module/melting/ac_adjustment.php?id=<?php echo $row_melting['RecID']; ?>&fm=<?php echo $row_melting['FM']; ?>&product=<?php echo $row_melting['ProductCode']; ?>" type="button" class="btn btn-danger btn-block">Adjust</a></td>
              <td><a href="module/melting/ac_edit_melting.php?id=<?php echo $row_melting['RecID']; ?>" type="button" class="btn btn-warning btn-block">Edit</a></td>
          </tr>
        
      <?php include "modal/modal_check.php";
 } 
      ?>
    </tbody>
</table>

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

<!-- Modal Bunker -->
<div class="modal fade" id="modal_bunker" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SET RAW MATERIAL</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
              <table width="100%" class="table-bordered table-striped" style="overflow-x:auto;">												
                  <thead>
                      <tr style ="text-align : center; font-size : 18px; font-weight : bold; vertical-align: middle;">
                          <th>NAMA PRODUK</th>
                          <th>FM</th>
                          <th>FC</th>
                          <th>FCD 450</th>
                          <th>FCD 500</th>
                          <th>FCD 600</th>
                          <th>HIGH MN</th>
                          <th>LOW MN</th>
                          <th>CHIPS</th>
                          <th>ST BLOCK</th>
                          <th>PIG IRON</th>
                          <th>TOTAL CHARGING</th>
                          <th>OPSI</th>
                      </tr>          
                  </thead>
                  <tbody>
                    <?php
                    $sql_data_bunker = "SELECT * FROM [PRD].[dbo].[bunker_log] ORDER BY RecID DESC";
                    $stmt_data_bunker = sqlsrv_query($conn, $sql_data_bunker);
                    while($row_bunker = sqlsrv_fetch_array($stmt_data_bunker, SQLSRV_FETCH_ASSOC))
                    {	
                    ?>
                    
                    <tr style ="text-align : center; font-size : 14px; font-weight : bold; vertical-align: middle;">
                        <td style ="background: #ffff00;"> <?php echo ($row_bunker['ProductCode']); ?></td>
                        <td> <?php echo ($row_bunker['FM']); ?></td>
                        <td> <?php echo ($row_bunker['FC']); ?></td>
                        <td> <?php echo ($row_bunker['FCD450']); ?></td>
                        <td> <?php echo ($row_bunker['FCD500']); ?></td>
                        <td> <?php echo ($row_bunker['FCD600']); ?></td>
                        <td> <?php echo ($row_bunker['HighMn']); ?></td>
                        <td> <?php echo ($row_bunker['LowMn']); ?></td>
                        <td> <?php echo ($row_bunker['Chips']); ?></td>
                        <td> <?php echo ($row_bunker['STBlock']); ?></td>
                        <td> <?php echo ($row_bunker['PigIron']); ?></td>
                        <td> <?php echo ($row_bunker['TotalCharging']); ?></td>
                        <td><a type="submit" class="button btn-lg btn-primary" href="module/melting/set_raw_material.php?fm=<?php echo ($row_bunker['FM']); ?>&fc=<?php echo ($row_bunker['FC']); ?>&fcd450=<?php echo ($row_bunker['FCD450']); ?>&fcd500=<?php echo ($row_bunker['FCD500']); ?>&fcd600=<?php echo ($row_bunker['FCD600']); ?>&high=<?php echo ($row_bunker['HighMn']); ?>&low=<?php echo ($row_bunker['LowMn']); ?>&chips=<?php echo ($row_bunker['Chips']); ?>&st=<?php echo ($row_bunker['STBlock']); ?>&pig=<?php echo ($row_bunker['PigIron']); ?>&total=<?php echo ($row_bunker['TotalCharging']); ?>">PILIH</a></td>
                    </tr>
                      
                    <?php }
                    ?>
                  </tbody>
              </table>
            </div>
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
                        $layout .= "<td><a type=\"submit\" class=\"button btn-lg btn-primary\" href=\"module/pouring/composition.php?analyst=$tr_time[$i]&fm=$furnace[$i]&sample=$kodeloe[$i]&laddle=$laddle[$i]&qty=$spektro_data\">PILIH</a></td>";
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