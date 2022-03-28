<?php
$id_adjust = $_SESSION['RecID'];
$fm = $_SESSION['FM'];
$product = $_SESSION['ProductCode'];
?>
<form method="POST" action="">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header bg-warning">
                <h4 style ="text-align : left; font-size : 30px; font-weight : bold;">ADJUSTMENT COMPOSITION PRODUCT <?php echo $product; ?> FM <?php echo $fm; ?> </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-secondary btn-block mt-2">RS FC</button>
                        <button type="button" class="btn btn-secondary btn-block mt-2">RS FCD 450</button>
                        <button type="button" class="btn btn-secondary btn-block mt-2">RS FCD 500</button>
                        <button type="button" class="btn btn-secondary btn-block mt-2">RS FCD 600</button>
                        <button type="button" class="btn btn-secondary btn-block mt-2">HIGH Mn</button>
                        <button type="button" class="btn btn-secondary btn-block mt-2">LOW Mn</button>
                        <button type="button" class="btn btn-secondary btn-block mt-2">POTONG</button>
                        <button type="button" class="btn btn-secondary btn-block mt-2">CHIPS</button>
                        <button type="button" class="btn btn-secondary btn-block mt-2">START BLOCK</button>
                        <button type="button" class="btn btn-secondary btn-block mt-2">PIG IRON</button>
                        <button type="button" class="btn btn-secondary btn-block mt-2">KAWUL</button>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control mt-2" id="fc" name="fc" placeholder="RS FC">
                        <input type="text" class="form-control mt-2" id="fcd450" name="fcd450" placeholder="RS FCD 450">
                        <input type="text" class="form-control mt-2" id="fcd500" name="fcd500" placeholder="RS FCD 500">
                        <input type="text" class="form-control mt-2" id="fcd600" name="fcd600" placeholder="RS FCD 600">
                        <input type="text" class="form-control mt-2" id="highmn" name="highmn" placeholder="Steel Scrap High Mn">
                        <input type="text" class="form-control mt-2" id="lowmn" name="lowmn" placeholder="Steel Scrap Low Mn">
                        <input type="text" class="form-control mt-2" id="potong" name="potong" placeholder="Steel Scrap Potong">
                        <input type="text" class="form-control mt-2" id="chips" name="chips" placeholder="Chips">
                        <input type="text" class="form-control mt-2" id="st" name="st" placeholder="Start Block">
                        <input type="text" class="form-control mt-2" id="pig" name="pig" placeholder="Pig Iron">
                        <input type="text" class="form-control mt-2" id="kawul" name="kawul" placeholder="Kawul">
                    </div>
                    <div class="col-3">
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
                        <button type="button" class="btn btn-success btn-block mt-2" id="get_sample_adjust">TIME SAMPLE</button>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control mt-2" id="asbury" name="asbury" placeholder="Carbon Asbury">
                        <input type="text" class="form-control mt-2" id="sacrab" name="sacrab" placeholder="Carbon Sacrab">
                        <input type="text" class="form-control mt-2" id="fesi" name="fesi" placeholder="Fe-Si">
                        <input type="text" class="form-control mt-2" id="sic" name="sic" placeholder="Si-C">
                        <input type="text" class="form-control mt-2" id="simn" name="simn" placeholder="Si-Mn">
                        <input type="text" class="form-control mt-2" id="sn" name="sn" placeholder="Sn">
                        <input type="text" class="form-control mt-2" id="s" name="s" placeholder="S">
                        <input type="text" class="form-control mt-2" id="cu" name="cu" placeholder="Cu">
                        <input type="text" class="form-control mt-2" id="other" name="other" placeholder="Other">
                        <input type="text" class="form-control mt-2" id="temp" name="temp" placeholder="Temp.">
                        <input type="text" class="form-control mt-2" id="time_sample_adjust" name="time_sample_adjust" placeholder="Time Sample" readonly>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="card row">
    <button type="submit" class="btn btn-primary btn-lg" id="adjustment_melting" name="adjustment_melting">SIMPAN DATA</button>
    </div>
    <div class="card row">
    <a href="pages.php?p=module/melting/checksheet_melting.php"><button type="button" class="btn btn-secondary btn-lg btn-block" id="" name="">KEMBALI</button></a>
    </div>
</form>

<?php
    if(isset($_POST['adjustment_melting'])){
        // $fm = $_POST['fm'];
        // $product = $_POST['product'];
        $fc = $_POST['fc'];
        $fcd450 = $_POST['fcd450'];
        $fcd500 = $_POST['fcd500'];
        $fcd600 = $_POST['fcd600'];
        $high = $_POST['high'];
        $low = $_POST['low'];
        $potong = $_POST['potong'];
        $chips = $_POST['chips'];
        $st = $_POST['st'];
        $pig = $_POST['pig'];
        $kawul = $_POST['kawul'];
        $asbury = $_POST['asbury'];
        $sacrab = $_POST['sacrab'];
        $fesi = $_POST['fesi'];
        $sic = $_POST['sic'];
        $simn = $_POST['simn'];
        $sn = $_POST['sn'];
        $s = $_POST['s'];
        $cu = $_POST['cu'];
        $other = $_POST['other'];
        $temp = $_POST['temp'];
        $time_sample = $_POST['time_sample_adjust'];
        $sql_melting = "INSERT INTO [PRD].[dbo].[melting]
        (FM
        ,ProductCode
        ,FC
        ,FCD450
        ,FCD500
        ,FCD600
        ,HighMn
        ,LowMn
        ,Potong
        ,Chips
        ,STBlock
        ,PigIron
        ,Kawul
        ,Asbury
        ,Sacrab
        ,FeSi
        ,SiC
        ,SiMn
        ,Sn
        ,S
        ,Cu
        ,Other
        ,Temperature
        ,TimeSample)
          VALUES
          ('$fm'
          ,'$product'
          ,'$fc'
        ,'$fcd450'
        ,'$fcd500'
        ,'$fcd600'
        ,'$high'
        ,'$low'
        ,'$potong'
        ,'$chips'
        ,'$st'
        ,'$pig'
        ,'$kawul'
          ,'$asbury'
          ,'$sacrab'
          ,'$fesi'
          ,'$sic'
          ,'$simn'
          ,'$sn'
          ,'$s'
          ,'$cu'
          ,'$other'
          ,'$temp'
          ,'$time_sample')";
          $stmt_melting = sqlsrv_query($conn, $sql_melting);
          echo "<script language='Javascript'>
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'ADJUSTEMN SUCCESS',
                    showConfirmButton: true,
                    closeOnClickOutside : false,
                    allowOutsideClick: false
                    
                }).then(okay => {
                if (okay) {
                    window.location.href = 'pages.php?p=module/melting/checksheet_melting.php';
                    
                }
            });
            </script>";
          
    }
?>

<script>
    $(document).ready(function() {
		$(document).on('click', '#get_sample_adjust', function() {
			let today = new Date();
			let sample = today.getHours() + ":" + today.getMinutes();
			$('#time_sample_adjust').val(sample);
		})
	});
</script>