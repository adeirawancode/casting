<?php
include "module/melting/modal/modal_productx.php";
$id_edit_melting = $_SESSION['RecID'];
$get_edit = "SELECT * FROM [PRD].[dbo].[melting] WHERE RecID = '$id_edit_melting'";
$stmt_edit = sqlsrv_query($conn, $get_edit);
while($row_edit = sqlsrv_fetch_array($stmt_edit, SQLSRV_FETCH_ASSOC))
{
    $fm = $row_edit['FM'];
    $product = $row_edit['ProductCode'];
    $start =  $row_edit['StartTime'];
    $finish = $row_edit['FinishTime'];
    $total_time = $row_edit['TotalTime'];
    $awal = $row_edit['KWHAwal'];
    $akhir = $row_edit['KWHAkhir'];
    $total_kwh = $row_edit['KWHTotal'];
    $catridge = $row_edit['Catridge'];
    $garpu = $row_edit['GarpuSlug'];
    $cairan = $row_edit['CairanBalik'];
    $fc = $row_edit['FC'];
    $fcd450 = $row_edit['FCD450'];
    $fcd500 = $row_edit['FCD500'];
    $fcd600 = $row_edit['FCD600'];
    $high = $row_edit['HighMn'];
    $low = $row_edit['LowMn'];
    $asbury = $row_edit['Asbury'];
    $sacrab = $row_edit['Sacrab'];
    $fesi = $row_edit['FeSi'];
    $sic = $row_edit['SiC'];
    $simn = $row_edit['SiMn'];
    $sn = $row_edit['Sn'];
    $s = $row_edit['S'];
    $cu = $row_edit['Cu'];
    $other = $row_edit['Other'];
    $temp = $row_edit['Temperature'];
    $sample = $row_edit['TimeSample'];
}
?>
<form method="POST" action="">
    <div class="row">
        <div class="col-6">
            <div class="card">
            <div class="card-header">
                Remelting
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-secondary btn-block mt-2">NO FURNACE</button>
                    <button type="button" class="btn btn-success btn-block mt-2" data-bs-toggle="modal" data-bs-target="#modal_productx">PILIH PRODUK</button>
                    <button type="button" class="btn btn-success btn-block mt-2" id="get_startx">START TIME</button>
                    <button type="button" class="btn btn-success btn-block mt-2" id="get_finishx">FINISH TIME</button>
                    <button type="button" class="btn btn-secondary btn-block mt-2" onclick="totalTime();">TOTAL TIME</button>
                    <button type="button" class="btn btn-success btn-block mt-2">KWH AWAL</button>
                    <button type="button" class="btn btn-success btn-block mt-2">KWH AKHIR</button>
                    <button type="button" class="btn btn-secondary btn-block mt-2" onclick="totalKWH();">KWH TOTAL</button>
                    <button type="button" class="btn btn-success btn-block mt-2" onclick="addCatridgex();">CATRIDGE</button>
                    <button type="button" class="btn btn-success btn-block mt-2" onclick="addGarpux();">GARPU SLUG</button>
                    <button type="button" class="btn btn-success btn-block mt-2" >CAIRAN BALIK</button>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control mt-2" id="fmx" name="fmx" value="<?php echo $fm ?>" readonly>
                    <input type="text" class="form-control mt-2" id="productx" name="productx" placeholder="Nama Produk" value="<?php echo $product ?>" readonly>
                    <input type="text" class="form-control mt-2" id="startx" name="startx" placeholder="Start Time" value="<?php echo substr($start, 11,5) ?>" readonly>
                    <input type="text" class="form-control mt-2" id="finishx" name="finishx" placeholder="Finish Time" value="<?php echo substr($finish, 11,5) ?>" readonly>
                    <input type="text" class="form-control mt-2" id="total_timex" name="total_timex" placeholder="Total Time" value="<?php echo $total_time ?>" readonly>
                    <input type="text" class="form-control mt-2 kwh" id="kwh_awalx" name="kwh_awalx" placeholder="KWH Awal" value="<?php echo $awal ?>">
                    <input type="text" class="form-control mt-2 kwh" id="kwh_akhirx" name="kwh_akhirx" placeholder="KWH Akhir" value="<?php echo $akhir ?>">
                    <input type="text" class="form-control mt-2 total" id="kwh_totalx" name="kwh_totalx" onchange="totalKWH();" placeholder="KWH Total" value="<?php echo $total_kwh ?>" readonly>
                    <input type="text" class="form-control mt-2" id="catridgex" name="catridgex" placeholder="Catridge" value="<?php echo $catridge ?>" readonly>
                    <input type="text" class="form-control mt-2" id="garpux" name="garpux" placeholder="Garpu Slug" value="<?php echo $garpu ?>" readonly>
                    <input type="text" class="form-control mt-2" id="cairanx" name="cairanx" placeholder="Cairan Balik" value="<?php echo $cairan ?>">
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
            <div class="card-header">
                Alloy Material
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-success btn-block mt-2">CARBON ASBURY</button>
                    <button type="button" class="btn btn-success btn-block mt-2">CARBON SACRAB</button>
                    <button type="button" class="btn btn-success btn-block mt-2">Fe-Si</button>
                    <button type="button" class="btn btn-success btn-block mt-2">Si-C</button>
                    <button type="button" class="btn btn-success btn-block mt-2">Si-Mn</button>
                    <button type="button" class="btn btn-success btn-block mt-2">Sn</button>
                    <button type="button" class="btn btn-success btn-block mt-2">S</button>
                    <button type="button" class="btn btn-success btn-block mt-2">Cu</button>
                    <button type="button" class="btn btn-success btn-block mt-2">OTHER</button>
                    <button type="button" class="btn btn-success btn-block mt-2">TEMPERATURE</button>
                    <button type="button" class="btn btn-success btn-block mt-2" id="get_sample">TIME SAMPLE</button>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control mt-2" id="asburyx" name="asburyx" placeholder="Carbon Asbury" value="<?php echo $asbury ?>">
                    <input type="text" class="form-control mt-2" id="sacrabx" name="sacrabx" placeholder="Carbon Sacrab" value="<?php echo $sacrab ?>">
                    <input type="text" class="form-control mt-2" id="fesix" name="fesix" placeholder="Fe-Si" value="<?php echo $fesi ?>">
                    <input type="text" class="form-control mt-2" id="sicx" name="sicx" placeholder="Si-C" value="<?php echo $sic ?>">
                    <input type="text" class="form-control mt-2" id="simnx" name="simnx" placeholder="Si-Mn" value="<?php echo $simn ?>">
                    <input type="text" class="form-control mt-2" id="snx" name="snx" placeholder="Sn" value="<?php echo $sn ?>">
                    <input type="text" class="form-control mt-2" id="sx" name="sx" placeholder="S" value="<?php echo $s ?>">
                    <input type="text" class="form-control mt-2" id="cux" name="cux" placeholder="Cu" value="<?php echo $cu ?>">
                    <input type="text" class="form-control mt-2" id="otherx" name="otherx" placeholder="Other" value="<?php echo $other ?>">
                    <input type="text" class="form-control mt-2" id="tempx" name="tempx" placeholder="Temp." value="<?php echo $temp ?>">
                    <input type="text" class="form-control mt-2" id="time_samplex" name="time_samplex" placeholder="Time Sample" value="<?php echo substr($sample, 11,5) ?>" readonly>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="card row">
    <button type="submit" class="btn btn-primary btn-lg" id="edit_melting" name="edit_melting">SIMPAN DATA</button>
    </div>
    <div class="card row">
    <a href="pages.php?p=module/melting/checksheet_melting.php"><button type="button" class="btn btn-secondary btn-lg btn-block" id="" name="">KEMBALI</button></a>
    </div>
</form>

<?php
    if(isset($_POST["edit_melting"])){
    $fmx = $_POST['fmx'];
    $productx = $_POST['productx'];
    $startx = $_POST['startx'];
    $finishx = $_POST['finishx'];
    $total_timex = $_POST['total_timex'];
    $tempx = $_POST['tempx'];
    $sql_edit_melting = "UPDATE [PRD].[dbo].[melting]
    SET
    FM = '$fmx'
    ,ProductCode = '$productx'
    ,StartTime = '$startx'
    ,FinishTime = '$finishx'
    ,TotalTime = '$total_timex'
    ,Temperature = '$tempx'
    WHERE RecID = '$id_edit_melting'";
    $stmt_edit_melting = sqlsrv_query($conn, $sql_edit_melting);
    //echo '<meta http-equiv="refresh" content="0"; url="http://localhost/casting/pages.php?p=module/melting/echecksheet-form.php" />';
    // echo '<script>window.location.href="../../pages.php?p=module/melting/checksheet-form.php" </script>';
}
?>

<script>
    $(document).ready(function() {
		$(document).on('click', '#get_startx', function() {
			let today = new Date();
			let start = today.getHours() + ":" + today.getMinutes();
			$('#startx').val(start);
		})
		$(document).on('click', '#get_finishx', function() {
			let today = new Date();
			let finish = today.getHours() + ":" + today.getMinutes();
			$('#finishx').val(finish);
		})
		// $(document).on('click', '#get_productx', function() {	
		// 	var prd_id = $(this).data('prdid');	
		// 	$('#productx').val(prd_id);			
		// 	$('#modal_productx').modal('hide');
		// })
	});
</>