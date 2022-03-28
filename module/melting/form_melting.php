<?php
// require "config/query/Q_pouring.php";
require "config/query/Q_melting.php";
require "config/query/Q_config.php";

include "modal/modal_product.php";

$SessionID = $_SESSION['SessionID'];
$LineCode = $_SESSION['LineCode'];
$fmID = $_SESSION['fmActive'];
$fmName = $_SESSION['fmName'];

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
              <button type="button" class="btn btn-success btn-block mt-2" data-bs-toggle="modal" data-bs-target="#modal_product">PILIH PRODUK</button>
              <button type="button" class="btn btn-success btn-block mt-2" id="get_start_melt">START TIME</button>
              <button type="button" class="btn btn-success btn-block mt-2" id="get_finish_melt">FINISH TIME</button>
              <button type="button" class="btn btn-secondary btn-block mt-2" onclick="totalTime();">TOTAL TIME</button>
              <button type="button" class="btn btn-success btn-block mt-2">KWH AWAL</button>
              <button type="button" class="btn btn-success btn-block mt-2">KWH AKHIR</button>
              <button type="button" class="btn btn-secondary btn-block mt-2" onclick="totalKWH();">KWH TOTAL</button>
              <button type="button" class="btn btn-success btn-block mt-2" onclick="addCatridge();">CATRIDGE</button>
              <button type="button" class="btn btn-success btn-block mt-2" onclick="addGarpu();">GARPU SLUG</button>
              <button type="button" class="btn btn-success btn-block mt-2" >CAIRAN BALIK</button>
            </div>
            <div class="col-6">
              <!-- <input type="text" class="form-control mt-2" id="sessionid" name="sessionid" value="<?php echo $SessionID ; ?>" readonly>
              <input type="text" class="form-control mt-2" id="linecode" name="linecode" value="<?php echo $LineCode ; ?>" readonly> -->

              <input type="text" class="form-control mt-2" id="fm" name="fm" value="<?php echo $fmID ; ?>" readonly>
              <input type="text" class="form-control mt-2" id="product" name="product" placeholder="Nama Produk" readonly>
              <input type="text" class="form-control mt-2" id="start_melt" name="start_melt" placeholder="Start Time" readonly>
              <input type="text" class="form-control mt-2" id="finish_melt" name="finish_melt" placeholder="Finish Time" readonly>
              <input type="text" class="form-control mt-2" id="total_time" name="total_time" placeholder="Total Time">
              <input type="text" class="form-control mt-2 kwh" id="kwh_awal" name="kwh_awal" placeholder="KWH Awal">
              <input type="text" class="form-control mt-2 kwh" id="kwh_akhir" name="kwh_akhir" placeholder="KWH Akhir">
              <input type="text" class="form-control mt-2 total" id="kwh_total" name="kwh_total" onchange="totalKWH();" placeholder="KWH Total" readonly>
              <input type="text" class="form-control mt-2" id="catridge" name="catridge" placeholder="Catridge">
              <input type="text" class="form-control mt-2" id="garpu" name="garpu" placeholder="Garpu Slug">
              <input type="text" class="form-control mt-2" id="cairan" name="cairan" placeholder="Cairan Balik">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="col-3">
      <div class="card">
        <div class="card-header">
          Raw Material
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6">
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
              <button type="button" class="btn btn-secondary btn-block mt-2">CAIRAN BALIK</button>
              <button type="button" class="btn btn-secondary btn-block mt-2">TOTAL CHARGING</button>
            </div>
            <div class="col-6">
              <input type="text" class="form-control mt-2" id="rs_fc" placeholder="RS FC">
              <input type="text" class="form-control mt-2" id="fcd_450" placeholder="RS FCD 450">
              <input type="text" class="form-control mt-2" id="fcd_500" placeholder="RS FCD 500">
              <input type="text" class="form-control mt-2" id="fcd_600" placeholder="RS FCD 600">
              <input type="text" class="form-control mt-2" id="high_mn" placeholder="Steel Scrap High Mn">
              <input type="text" class="form-control mt-2" id="low_mn" placeholder="Steel Scrap Low Mn">
              <input type="text" class="form-control mt-2" id="potong" placeholder="Steel Scrap Potong">
              <input type="text" class="form-control mt-2" id="chips" placeholder="Chips">
              <input type="text" class="form-control mt-2" id="start_block" placeholder="Start Block">
              <input type="text" class="form-control mt-2" id="pig_iron" placeholder="Pig Iron">
              <input type="text" class="form-control mt-2" id="kawul" placeholder="Kawul">
              <input type="text" class="form-control mt-2" id="cairan_balik" placeholder="Cairan Balik">
              <input type="text" class="form-control mt-2" id="total_charging" placeholder="Total Charging">
            </div>
          </div>
        </div>
      </div>
    </div> -->
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
              <input type="text" class="form-control mt-2" id="asbury" name="asbury" placeholder="Carbon Asbury" autocomplete="off">
              <input type="text" class="form-control mt-2" id="sacrab" name="sacrab" placeholder="Carbon Sacrab">
              <input type="text" class="form-control mt-2" id="fesi" name="fesi" placeholder="Fe-Si">
              <input type="text" class="form-control mt-2" id="sic" name="sic" placeholder="Si-C">
              <input type="text" class="form-control mt-2" id="simn" name="simn" placeholder="Si-Mn">
              <input type="text" class="form-control mt-2" id="sn" name="sn" placeholder="Sn">
              <input type="text" class="form-control mt-2" id="s" name="s" placeholder="S">
              <input type="text" class="form-control mt-2" id="cu" name="cu" placeholder="Cu">
              <input type="text" class="form-control mt-2" id="other" name="other" placeholder="Other">
              <input type="text" class="form-control mt-2" id="temp" name="temp" placeholder="Temp.">
              <input type="text" class="form-control mt-2" id="time_sample" name="time_sample" placeholder="Time Sample" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="col-3">
      <div class="card">
        <div class="card-header">
          Chemical Composition
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-4">
              <button type="button" class="btn btn-warning btn-block mt-2">STD MIN</button>
              <input type="text" class="form-control mt-2" id="" placeholder="C">
              <input type="text" class="form-control mt-2" id="" placeholder="Si">
              <input type="text" class="form-control mt-2" id="" placeholder="Mn">
              <input type="text" class="form-control mt-2" id="" placeholder="S">
              <input type="text" class="form-control mt-2" id="" placeholder="Cu">
              <input type="text" class="form-control mt-2" id="" placeholder="Sn">
              <input type="text" class="form-control mt-2" id="" placeholder="Cr">
              <input type="text" class="form-control mt-2" id="" placeholder="P">
              <input type="text" class="form-control mt-2" id="" placeholder="Zn">
              <input type="text" class="form-control mt-2" id="" placeholder="Al">
              <input type="text" class="form-control mt-2" id="" placeholder="Ti">
              <input type="text" class="form-control mt-2" id="" placeholder="Ni">
              <input type="text" class="form-control mt-2" id="" placeholder="Sb">
            </div>
            <div class="col-4">
              <button type="button" class="btn btn-danger btn-block mt-2">STD MAX</button>
              <input type="text" class="form-control mt-2" id="" placeholder="C">
              <input type="text" class="form-control mt-2" id="" placeholder="Si">
              <input type="text" class="form-control mt-2" id="" placeholder="Mn">
              <input type="text" class="form-control mt-2" id="" placeholder="S">
              <input type="text" class="form-control mt-2" id="" placeholder="Cu">
              <input type="text" class="form-control mt-2" id="" placeholder="Sn">
              <input type="text" class="form-control mt-2" id="" placeholder="Cr">
              <input type="text" class="form-control mt-2" id="" placeholder="P">
              <input type="text" class="form-control mt-2" id="" placeholder="Zn">
              <input type="text" class="form-control mt-2" id="" placeholder="Al">
              <input type="text" class="form-control mt-2" id="" placeholder="Ti">
              <input type="text" class="form-control mt-2" id="" placeholder="Ni">
              <input type="text" class="form-control mt-2" id="" placeholder="Sb">
            </div>
            <div class="col-4">
              <button type="button" class="btn btn-success btn-block mt-2" data-bs-toggle="modal" data-bs-target="#modal_composition">ACTUAL</button>
              <input type="text" class="form-control mt-2" id="c_act" placeholder="C">
              <input type="text" class="form-control mt-2" id="si_act" placeholder="Si">
              <input type="text" class="form-control mt-2" id="mn_act" placeholder="Mn">
              <input type="text" class="form-control mt-2" id="s_act" placeholder="S">
              <input type="text" class="form-control mt-2" id="cu_act" placeholder="Cu">
              <input type="text" class="form-control mt-2" id="sn_act" placeholder="Sn">
              <input type="text" class="form-control mt-2" id="cr_act" placeholder="Cr">
              <input type="text" class="form-control mt-2" id="p_act" placeholder="P">
              <input type="text" class="form-control mt-2" id="zn_act" placeholder="Zn">
              <input type="text" class="form-control mt-2" id="al_act" placeholder="Al">
              <input type="text" class="form-control mt-2" id="ti_act" placeholder="Ti">
              <input type="text" class="form-control mt-2" id="ni_act" placeholder="Ni">
              <input type="text" class="form-control mt-2" id="sb_act" placeholder="Sb">
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </div>
  <div class="row">
    <button type="submit" class="btn btn-primary btn-lg" id="add_melting" name="add_melting">SIMPAN DATA</button>
  </div>
  <div class="card">
    <a href="pages.php?p=module/melting/checksheet_melting.php">
      <button type="button" class="btn btn-secondary btn-lg btn-block" id="" name="">KEMBALI</button>
    </a>
  </div>
</form>

<?php
    if(isset($_POST['add_melting'])){
        // $session_id = $SessionID;
        // $line_code = $LineCode;
        // $fm = $fmID;
        $product = $_POST['product'];
        $start = $_POST['start_melt'];
        $finish = $_POST['finish_melt'];
        $time = $_POST['total_time'];
        $awal = $_POST['kwh_awal'];
        $akhir = $_POST['kwh_akhir'];
        $kwh = $_POST['kwh_total'];
        $cairan = $_POST['cairan'];
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
        $time_sample = $_POST['time_sample'];
        $catridge = $_POST['catridge'];
        $garpu = $_POST['garpu'];
        if($product == '' || $fmID == '' || $start == '')
          {
            echo '<script>alert("FM, Nama Produk & Time Start Belum Diisi")</script>';
          }else{
          $sql_melting = "INSERT INTO [PRD].[dbo].[melting]
          (SessionID
          ,LineCode
          ,FM
          ,ProductCode
          ,WorkingDate
          ,StartTime
          ,FinishTime
          ,TotalTime
          ,KWHAwal
          ,KWHAkhir
          ,KWHTotal
          ,CairanBalik
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
          ,TimeSample
          ,Catridge
          ,GarpuSlug)
          VALUES
          ('$SessionID'
          ,'$LineCode'
          ,'$fmID'
          ,'$product'
          ,getdate()
          ,'$start'
          ,'$finish'
          ,'$time'
          ,'$awal'
          ,'$akhir'
          ,'$kwh'
          ,'$cairan'
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
          ,'$time_sample'
          ,'$catridge'
          ,'$garpu')";
          $stmt_melting = sqlsrv_query($conn, $sql_melting);
          // var_dump($sql_melting);die;
          echo "<script language='Javascript'>
                  Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'ADD DATA MELTING SUCCESS',
                    showConfirmButton: true,
                    closeOnClickOutside : false,
                    allowOutsideClick: false
                    
                  }).then(okay => {
                  if (okay) {
                    window.location.href = 'pages.php?p=module/melting/checksheet_melting.php';
                    
                  }
                });
                </script>";
          // echo '<meta http-equiv="refresh" content="0" />';
          
          }
    }
?>

<script>
    $(document).ready(function() {
        $(document).on('click', '#get_start_melt', function() {
          let today = new Date();
          let start = today.getHours() + ":" + today.getMinutes();
          // let start = today;
          $('#start_melt').val(start);
        })
        $(document).on('click', '#get_finish_melt', function() {
          let today = new Date();
          let finish = today.getHours() + ":" + today.getMinutes();
          $('#finish_melt').val(finish);
        })
	  });
</script>