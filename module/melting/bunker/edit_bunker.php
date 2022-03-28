<?php
include "module/melting/modal/modal_product.php";
$id_edit_bunker = $_SESSION['RecID'];
$get_edit_bunker = "SELECT * FROM [PRD].[dbo].[bunker_log] WHERE RecID = '$id_edit_bunker'";
$stmt_edit_bunker = sqlsrv_query($conn, $get_edit_bunker);
while($row_edit_bunker = sqlsrv_fetch_array($stmt_edit_bunker, SQLSRV_FETCH_ASSOC))
{
    $fm = $row_edit_bunker['FM'];
    $product = $row_edit_bunker['ProductCode'];
    $fc = $row_edit_bunker['FC'];
    $fcd450 = $row_edit_bunker['FCD450'];
    $fcd500 = $row_edit_bunker['FCD500'];
    $fcd600 = $row_edit_bunker['FCD600'];
    $high = $row_edit_bunker['HighMn'];
    $low = $row_edit_bunker['LowMn'];
    $potong = $row_edit_bunker['Potong'];
    $sacrab = $row_edit_bunker['Sacrab'];
    $fesi = $row_edit_bunker['FeSi'];
    $sic = $row_edit_bunker['SiC'];
    $simn = $row_edit_bunker['SiMn'];
    $sn = $row_edit_bunker['Sn'];
    $s = $row_edit_bunker['S'];
    $cu = $row_edit_bunker['Cu'];
    $other = $row_edit_bunker['Other'];
    $temp = $row_edit_bunker['Temperature'];
    $sample = $row_edit_bunker['TimeSample'];
}
?>
<form method="POST" action="">
    <div class="row">
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
    <a href="pages.php?p=module/melting/bunker/form_bunker.php"><button type="button" class="btn btn-secondary btn-lg btn-block" id="" name="">KEMBALI</button></a>
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
    WHERE RecID = '$id_edit_bunker'";
    $_bunker_melting = sqlsrv_query($conn, $sql_edit_melting);
    //echo '<meta http-equiv="refresh" content="0"; url="http://localhost/casting/pages.php?p=module/melting/echecksheet-form.php" />';
    // echo '<script>window.location.href="../../pages.php?p=module/melting/checksheet-form.php" </script>';
}
?>