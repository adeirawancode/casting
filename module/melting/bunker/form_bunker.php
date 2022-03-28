<?php
require "config/query/Q_config.php";
require "config/query/Q_pouring.php";
require "config/query/Q_melting.php";

include "modal/modal_shift.php";
include "modal/modal_finish.php";
include "modal/modal_product.php";

$sessionID = $_SESSION['SessionID'];

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
            <th style="vertical-align: middle; text-align : center; font-size : auto; font-weight: bold;" rowspan="2">BUNKER REPORT</th>	
            <th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;">Tanggal</th>
            <th style="text-align : center; font-size : 15px; font-weight : bold; vertical-align: middle;">Shift</th>										
            <th style="vertical-align: middle; text-align : center; font-size : 13px;">Operator</th>									
            <th style="vertical-align: middle; text-align : center; font-size : 13px;">Leader</th>									
            <th style="vertical-align: middle; text-align : center; font-size : 13px;">Foreman</th>
            <th style="vertical-align: middle; text-align : right;" rowspan="2">
			
			<?php while($row_fm = sqlsrv_fetch_array($stmt_fm, SQLSRV_FETCH_ASSOC)) { ?>
				 <a href="module/melting/bunker/ac_change_fm_bunker.php?f=<?php echo $row_fm['FurnanceNumber']; ?>&fName=<?php echo $row_fm['FurnanceName']; ?>" class="btn btn-primary" name="<?php echo $row_fm['FurnanceID']; ?>"><?php echo $row_fm['FurnanceName']; ?></a>
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
<h4 style ="text-align : left; font-size : 25px; font-weight : bold;"><?php echo $fmName; ?></h4>
</div>

<form action="" method="POST" novalidate="novalidate" id="form_add_bunker">
    <div class="col2 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- <div class="col-4">
                        <label for="">CHARGING</label>
                        <input type="number" class="form-control" id="no_charging" name="no_charging">
                    </div> -->
                    <div class="col-6">
                        <button type="button" class="btn btn-success btn-block" data-bs-toggle="modal" data-bs-target="#modal_product">PILIH PRODUK</button>
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="text" class="form-control text-center" id="product" name="product" readonly>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary btn-block">FM</button>
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control text-center" id="fm" name="fm" value="<?php echo $fmActive; ?>" readonly>
                    </div>
            </div>
            </div>
        </div>
    </div>
    
    <div class="col2 mt-2">
        <div class="card">
            <div class="card-body">
                <!-- <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-success btn-block mt-2">RETURN SCRAP</button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-success btn-block mt-2">STEEL SCRAP</button>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-1">
                        <button type="button" class="btn btn-secondary btn-block mt-2">NO</button>
                        <input type="number" class="form-control mt-2 text-center" value="1" disabled>
                        <input type="number" class="form-control mt-2 text-center" value="2" disabled>
                        <input type="number" class="form-control mt-2 text-center" value="3" disabled>
                        <input type="number" class="form-control mt-2 text-center" value="4" disabled>
                        <input type="number" class="form-control mt-2 text-center" value="5" disabled>
                        <input type="number" class="form-control mt-2 text-center" value="6" disabled>
                        <input type="number" class="form-control mt-2 text-center" value="7" disabled>
                        <input type="number" class="form-control mt-2 text-center" value="8" disabled>
                        <input type="number" class="form-control mt-2 text-center" value="9" disabled>
                        <button type="button" class="btn btn-warning btn-block mt-2">SUB TOTAL</button>
                        <button type="button" class="btn btn-danger btn-block mt-2">STANDARD</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block mt-2">FC</button>
                        <input type="number" class="form-control mt-2 text-center bunker fc">
                        <input type="number" class="form-control mt-2 text-center bunker fc">
                        <input type="number" class="form-control mt-2 text-center bunker fc">
                        <input type="number" class="form-control mt-2 text-center bunker fc">
                        <input type="number" class="form-control mt-2 text-center bunker fc">
                        <input type="number" class="form-control mt-2 text-center bunker fc">
                        <input type="number" class="form-control mt-2 text-center bunker fc">
                        <input type="number" class="form-control mt-2 text-center bunker fc">
                        <input type="number" class="form-control mt-2 text-center bunker fc">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center sub-fc" id="subfc" name="subfc" readonly >
                        <input type="text" class="form-control mt-2 text-center" readonly>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block mt-2">FCD 450</button>
                        <input type="number" class="form-control mt-2 text-center bunker fcd450">
                        <input type="number" class="form-control mt-2 text-center bunker fcd450">
                        <input type="number" class="form-control mt-2 text-center bunker fcd450">
                        <input type="number" class="form-control mt-2 text-center bunker fcd450">
                        <input type="number" class="form-control mt-2 text-center bunker fcd450">
                        <input type="number" class="form-control mt-2 text-center bunker fcd450">
                        <input type="number" class="form-control mt-2 text-center bunker fcd450">
                        <input type="number" class="form-control mt-2 text-center bunker fcd450">
                        <input type="number" class="form-control mt-2 text-center bunker fcd450">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center sub-fcd450" id="fcd450" name="fcd450" readonly >
                        <input type="text" class="form-control mt-2 text-center" readonly>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block mt-2">FCD 500</button>
                        <input type="number" class="form-control mt-2 text-center bunker fcd500">
                        <input type="number" class="form-control mt-2 text-center bunker fcd500">
                        <input type="number" class="form-control mt-2 text-center bunker fcd500">
                        <input type="number" class="form-control mt-2 text-center bunker fcd500">
                        <input type="number" class="form-control mt-2 text-center bunker fcd500">
                        <input type="number" class="form-control mt-2 text-center bunker fcd500">
                        <input type="number" class="form-control mt-2 text-center bunker fcd500">
                        <input type="number" class="form-control mt-2 text-center bunker fcd500">
                        <input type="number" class="form-control mt-2 text-center bunker fcd500">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center sub-fcd500" id="fcd500" name="fcd500" readonly>
                        <input type="text" class="form-control mt-2 text-center" readonly>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block mt-2">FCD 600</button>
                        <input type="number" class="form-control mt-2 text-center bunker fcd600">
                        <input type="number" class="form-control mt-2 text-center bunker fcd600">
                        <input type="number" class="form-control mt-2 text-center bunker fcd600">
                        <input type="number" class="form-control mt-2 text-center bunker fcd600">
                        <input type="number" class="form-control mt-2 text-center bunker fcd600">
                        <input type="number" class="form-control mt-2 text-center bunker fcd600">
                        <input type="number" class="form-control mt-2 text-center bunker fcd600">
                        <input type="number" class="form-control mt-2 text-center bunker fcd600">
                        <input type="number" class="form-control mt-2 text-center bunker fcd600">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center sub-fcd600" id="fcd600" name="fcd600" readonly>
                        <input type="text" class="form-control mt-2 text-center" readonly>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block mt-2">HIGH MN</button>
                        <input type="number" class="form-control mt-2 text-center bunker high">
                        <input type="number" class="form-control mt-2 text-center bunker high">
                        <input type="number" class="form-control mt-2 text-center bunker high">
                        <input type="number" class="form-control mt-2 text-center bunker high">
                        <input type="number" class="form-control mt-2 text-center bunker high">
                        <input type="number" class="form-control mt-2 text-center bunker high">
                        <input type="number" class="form-control mt-2 text-center bunker high">
                        <input type="number" class="form-control mt-2 text-center bunker high">
                        <input type="number" class="form-control mt-2 text-center bunker high">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center sub-high" id="high" name="high" readonly>
                        <input type="text" class="form-control mt-2 text-center" readonly>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block mt-2">LOW MN</button>
                        <input type="number" class="form-control mt-2 text-center bunker low">
                        <input type="number" class="form-control mt-2 text-center bunker low">
                        <input type="number" class="form-control mt-2 text-center bunker low">
                        <input type="number" class="form-control mt-2 text-center bunker low">
                        <input type="number" class="form-control mt-2 text-center bunker low">
                        <input type="number" class="form-control mt-2 text-center bunker low">
                        <input type="number" class="form-control mt-2 text-center bunker low">
                        <input type="number" class="form-control mt-2 text-center bunker low">
                        <input type="number" class="form-control mt-2 text-center bunker low">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center sub-low" id="low" name="low" readonly>
                        <input type="text" class="form-control mt-2 text-center" readonly>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block mt-2">POTONG</button>
                        <input type="number" class="form-control mt-2 text-center bunker potong">
                        <input type="number" class="form-control mt-2 text-center bunker potong">
                        <input type="number" class="form-control mt-2 text-center bunker potong">
                        <input type="number" class="form-control mt-2 text-center bunker potong">
                        <input type="number" class="form-control mt-2 text-center bunker potong">
                        <input type="number" class="form-control mt-2 text-center bunker potong">
                        <input type="number" class="form-control mt-2 text-center bunker potong">
                        <input type="number" class="form-control mt-2 text-center bunker potong">
                        <input type="number" class="form-control mt-2 text-center bunker potong">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center sub-potong" id="potong" name="potong" readonly>
                        <input type="text" class="form-control mt-2 text-center" readonly>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block mt-2">CHIPS</button>
                        <input type="number" class="form-control mt-2 text-center bunker chips">
                        <input type="number" class="form-control mt-2 text-center bunker chips">
                        <input type="number" class="form-control mt-2 text-center bunker chips">
                        <input type="number" class="form-control mt-2 text-center bunker chips">
                        <input type="number" class="form-control mt-2 text-center bunker chips">
                        <input type="number" class="form-control mt-2 text-center bunker chips">
                        <input type="number" class="form-control mt-2 text-center bunker chips">
                        <input type="number" class="form-control mt-2 text-center bunker chips">
                        <input type="number" class="form-control mt-2 text-center bunker chips">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center sub-chips" id="chips" name="chips" readonly>
                        <input type="text" class="form-control mt-2 text-center" readonly>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block mt-2">ST BLOCK</button>
                        <input type="number" class="form-control mt-2 text-center bunker st">
                        <input type="number" class="form-control mt-2 text-center bunker st">
                        <input type="number" class="form-control mt-2 text-center bunker st">
                        <input type="number" class="form-control mt-2 text-center bunker st">
                        <input type="number" class="form-control mt-2 text-center bunker st">
                        <input type="number" class="form-control mt-2 text-center bunker st">
                        <input type="number" class="form-control mt-2 text-center bunker st">
                        <input type="number" class="form-control mt-2 text-center bunker st">
                        <input type="number" class="form-control mt-2 text-center bunker st">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center sub-st" id="st" name="st" readonly>
                        <input type="text" class="form-control mt-2 text-center" readonly>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block mt-2">PIG IRON</button>
                        <input type="number" class="form-control mt-2 text-center bunker pig">
                        <input type="number" class="form-control mt-2 text-center bunker pig">
                        <input type="number" class="form-control mt-2 text-center bunker pig">
                        <input type="number" class="form-control mt-2 text-center bunker pig">
                        <input type="number" class="form-control mt-2 text-center bunker pig">
                        <input type="number" class="form-control mt-2 text-center bunker pig">
                        <input type="number" class="form-control mt-2 text-center bunker pig">
                        <input type="number" class="form-control mt-2 text-center bunker pig">
                        <input type="number" class="form-control mt-2 text-center bunker pig">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center sub-pig" id="pig" name="pig" readonly>
                        <input type="text" class="form-control mt-2 text-center" readonly>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block mt-2">KAWUL</button>
                        <input type="number" class="form-control mt-2 text-center bunker kawul">
                        <input type="number" class="form-control mt-2 text-center bunker kawul">
                        <input type="number" class="form-control mt-2 text-center bunker kawul">
                        <input type="number" class="form-control mt-2 text-center bunker kawul">
                        <input type="number" class="form-control mt-2 text-center bunker kawul">
                        <input type="number" class="form-control mt-2 text-center bunker kawul">
                        <input type="number" class="form-control mt-2 text-center bunker kawul">
                        <input type="number" class="form-control mt-2 text-center bunker kawul">
                        <input type="number" class="form-control mt-2 text-center bunker kawul">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center sub-kawul" id="kawul" name="kawul" readonly>
                        <input type="text" class="form-control mt-2 text-center" readonly>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-block mt-2">OTHER</button>
                        <input type="number" class="form-control mt-2 text-center bunker other">
                        <input type="number" class="form-control mt-2 text-center bunker other">
                        <input type="number" class="form-control mt-2 text-center bunker other">
                        <input type="number" class="form-control mt-2 text-center bunker other">
                        <input type="number" class="form-control mt-2 text-center bunker other">
                        <input type="number" class="form-control mt-2 text-center bunker other">
                        <input type="number" class="form-control mt-2 text-center bunker other">
                        <input type="number" class="form-control mt-2 text-center bunker other">
                        <input type="number" class="form-control mt-2 text-center bunker other">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center sub-other" id="other" name="other" readonly>
                    </div>
                    <!-- <div class="col-2">
                        <button type="button" class="btn btn-primary btn-block mt-2">TOTAL CHARGING</button>
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center total-charging" id="total_charging" name="total_charging" readonly>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-1">
                        <button type="button" class="btn btn-primary btn-block mt-2">TOTAL</button>
                    </div>
                    <div class="col-11">
                        <input style ="text-align : center; font-size : 25px; font-weight : bold;" type="number" class="form-control mt-2 text-center total-charging" id="total_charging" name="total_charging" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <button type="submit" class="btn btn-primary btn-lg" id="add_bunker_log" name="add_bunker_log">SIMPAN DATA</button>
    </div>
    
    <?php
        if(isset($_POST["add_bunker_log"])){
            $fm = $_POST['fm'];
            $product = $_POST['product'];
            $fc = $_POST['subfc'];
            $fcd450 = $_POST['fcd450'];
            $fcd500 = $_POST['fcd500'];
            $fcd600 = $_POST['fcd600'];
            $high = $_POST['high'];
            $low = $_POST['low'];
            $chips = $_POST['chips'];
            $st = $_POST['st'];
            $pig = $_POST['pig'];
            $total_charging = $_POST['total_charging'];
			
			if($product == '' || $fm == '' || $total_charging == '')
			{
				echo '<script>alert("FM & Nama Produk Belum Dipilih / Total Charging Kosong")</script>';
			}else{
				  $sql_bunker_log = "INSERT INTO [PRD].[dbo].[bunker_log]
				(FM
				,ProductCode
				,FC
				,FCD450
				,FCD500
				,FCD600
				,HighMn
				,LowMn
				,Chips
				,STBlock
				,PigIron
				,TotalCharging)
				VALUES
				('$fm'
				,'$product'
				,'$fc'
				,'$fcd450'
				,'$fcd500'
				,'$fcd600'
				,'$high'
				,'$low'
				,'$chips'
				,'$st'
				,'$pig'
				,'$total_charging')";
				$stmt_bunker_log = sqlsrv_query($conn, $sql_bunker_log);
				echo '<meta http-equiv="refresh" content="0" />';
                echo '<script>alert("Data Berhasil Ditambahkan")</script>';
			}
        }
    ?>
</form>

<!-- <table width="100%" class="table-bordered table-striped" style="overflow-x:auto; background: #ffff00;">												
    <thead>
        <tr style ="text-align : center; font-size : 18px; font-weight : bold; vertical-align: middle;">
            <th>NAMA PRODUK</th>
            <th>FM</th>
            <th width="5%">FC</th>
            <th width="5%">FCD 450</th>
            <th width="5%">FCD 500</th>
            <th width="5%">FCD 600</th>
            <th width="5%">HIGH MN</th>
            <th width="5%">LOW MN</th>
            <th width="5%">CHIPS</th>
            <th width="5%">ST BLOCK</th>
            <th width="5%">PIG IRON</th>
            <th>TOTAL CHARGING</th>
        </tr>          
    </thead>
    <tbody>
      <?php
      $sql_data_bunker = "SELECT TOP 1 * FROM [PRD].[dbo].[bunker_log] ORDER BY RecID DESC";
      $stmt_data_bunker = sqlsrv_query($conn, $sql_data_bunker);
      while($row_bunker = sqlsrv_fetch_array($stmt_data_bunker, SQLSRV_FETCH_ASSOC))
      {			
      ?>
      <tr style ="text-align : center; font-size : 14px; font-weight : bold; vertical-align: middle;">
          <td style ="background: #ffff00; font-size : 25px; font-weight : bold;"> <?php echo ($row_bunker['ProductCode']); ?></td>
          <td style ="font-size : 25px; font-weight : bold;"> <?php echo ($row_bunker['FM']); ?></td>
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
      </tr>
        
      <?php }
      ?>
    </tbody>
</table> -->

<table width="100%" class="table-bordered table-striped" style="overflow-x:auto;">												
    <thead>
        <tr style ="text-align : center; font-size : 18px; font-weight : bold; vertical-align: middle;">
            <th rowspan="2">NO</th>
            <th rowspan="2">NAMA PRODUK</th>
            <th rowspan="2">FM</th>
            <th colspan="4" width="5%">RETURN SCRAP</th>
            <th colspan="3" width="5%">RETURN SCRAP</th>
            <th rowspan="2" width="5%">CHIPS</th>
            <th rowspan="2" width="5%">ST BLOCK</th>
            <th rowspan="2" width="5%">PIG IRON</th>
            <th rowspan="2" width="5%">KAWUL</th>
            <th rowspan="2">TOTAL CHARGING</th>
            <th rowspan="2">EDIT</th>
        </tr> 
        <tr style ="text-align : center; font-size : 18px; font-weight : bold; vertical-align: middle;">
            <th width="5%">FC</th>
            <th width="5%">FCD 450</th>
            <th width="5%">FCD 500</th>
            <th width="5%">FCD 600</th>
            <th width="5%">HIGH MN</th>
            <th width="5%">LOW MN</th>
            <th width="5%">POTONG</th>
        </tr>          
    </thead>
    <tbody>
      <?php
      $sql_data_bunker = "SELECT * FROM [PRD].[dbo].[bunker_log] ORDER BY RecID ASC";
      $stmt_data_bunker = sqlsrv_query($conn, $sql_data_bunker);
      $no = 1;
      while($row_bunker = sqlsrv_fetch_array($stmt_data_bunker, SQLSRV_FETCH_ASSOC))
      {			
      ?>
      <tr style ="text-align : center; font-size : 14px; font-weight : bold; vertical-align: middle;">
          <td> <?php echo $no++; ?></td>
          <td style ="background: #ffff00; font-size : 25px; font-weight : bold;"> <?php echo ($row_bunker['ProductCode']); ?></td>
          <td style ="font-size : 25px; font-weight : bold;"> <?php echo ($row_bunker['FM']); ?></td>
          <td> <?php echo ($row_bunker['FC']); ?></td>
          <td> <?php echo ($row_bunker['FCD450']); ?></td>
          <td> <?php echo ($row_bunker['FCD500']); ?></td>
          <td> <?php echo ($row_bunker['FCD600']); ?></td>
          <td> <?php echo ($row_bunker['HighMn']); ?></td>
          <td> <?php echo ($row_bunker['LowMn']); ?></td>
          <td> <?php echo ($row_bunker['Potong']); ?></td>
          <td> <?php echo ($row_bunker['Chips']); ?></td>
          <td> <?php echo ($row_bunker['STBlock']); ?></td>
          <td> <?php echo ($row_bunker['PigIron']); ?></td>
          <td> <?php echo ($row_bunker['Kawul']); ?></td>
          <td> <?php echo ($row_bunker['TotalCharging']); ?></td>
          <td><button type="button" class="btn btn-block btn-warning"><a href="module/melting/bunker/ac_edit_bunker.php?id=<?php echo $row_bunker['RecID']; ?>"><i class="fas fa-edit"></i></a></button></td>
      </tr>
        
      <?php }
      ?>
    </tbody>
</table>


