<?php
// require "config/query/Q_melting.php";
?>
<div class="row">
  <div class="col-2">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">FM 11</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">FM 12</button>
      </li>
    </ul>
  </div>
  <div class="col-10">
    <label for="">Tanggal</label>
    <input type="text">
    <label for="">Shift</label>
    <input type="text">
    <label for="">Operator</label>
    <input type="text">
    <label for="">Leader</label>
    <input type="text">
    <label for="">Foreman</label>
    <input type="text">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_shift">SET SHIFT</button>
  </div>
</div>

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <!-- <button type="button" class="btn btn-success">SET PRODUCT</button> <br> -->
    <!-- <div class="row">
      <div class="col-6">
        <button type="button" class="btn btn-success mt-2">SET RAW MATERIAL</button>
        <table class="table">
          <thead class="thead-dark" style="text-align: center">
            <tr>
              <th rowspan="2">RS FC</th>
              <th colspan="3">RS FCD</th>
              <th colspan="3">Stell Scrap</th>
              <th rowspan="2">Chips</th>
              <th rowspan="2">Start Block</th>
              <th rowspan="2">Pig Iron</th>
              <th rowspan="2">Kawul</th>
              <th rowspan="2">Cairan Balik</th>
              <th rowspan="2">Total Charging</th>
            </tr>
            <tr>
              <th>FCD 450</th>
              <th>FCD 500</th>
              <th>FCD 600</th>
              <th>High Mn</th>
              <th>Low Mn</th>
              <th>Potong</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="col-6">
        <button type="button" class="btn btn-success">STD COMPOSITION</button>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th rowspan="4">Time Sample</th>
              <th rowspan="4">Time Analyst</th>
              <th colspan="13">Chemical Composition</th>
            </tr>
            <tr>
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
          </thead>
        </table>
      </div>
    </div> -->
    <!-- <div class="row">
      <div class="col-12">
      <table class="table">
          <thead class="thead-dark" style="text-align: center">
            <tr>
              <th rowspan="2">RS FC</th>
              <th colspan="3">RS FCD</th>
              <th colspan="3">Stell Scrap</th>
              <th rowspan="2">Chips</th>
              <th rowspan="2">Start Block</th>
              <th rowspan="2">Pig Iron</th>
              <th rowspan="2">Kawul</th>
              <th rowspan="2">Cairan Balik</th>
              <th rowspan="2">Total Charging</th>
              <th rowspan="4">Time Sample</th>
              <th rowspan="4">Time Analyst</th>
              <th colspan="13">Chemical Composition</th>
            </tr>
            <tr>
              <th>FCD 450</th>
              <th>FCD 500</th>
              <th>FCD 600</th>
              <th>High Mn</th>
              <th>Low Mn</th>
              <th>Potong</th>
              <th>C</th>
              <th>Si</th>
              <th>Mn</th>
              <th>S</th>
              <th>Cu</th>
              <th>Sn</th>
              <th>Cr</th>
              <th>P</th>
              <th>Zn</th>
              <th>Al</th>
              <th>Ti</th>
              <th>Ni</th>
              <th>Sb</th>
            </tr>
          </thead>
        </table>
      </div>
    </div> -->
    <!-- <div class="row">
      <div class="col-6">
        <button type="button" class="btn btn-success mt-2">SET ALLOY MATERIAL</button>
        <table class="table">
          <thead class="thead-dark" style="text-align: center">
            <tr>
              <th colspan="2">Carbon</th>
              <th rowspan="2">Fe-Si</th>
              <th rowspan="2">Si C</th>
              <th rowspan="2">Si-Mn</th>
              <th rowspan="2">Sn</th>
              <th rowspan="2">S</th>
              <th rowspan="2">Cu</th>
              <th rowspan="2">Temp</th>
            </tr>
            <tr>
              <th>Asbury</th>
              <th>Sacrab</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="col-6">
        <button type="button" class="btn btn-success">SET COMPOSITION</button>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th rowspan="4">Time Sample</th>
              <th rowspan="4">Time Analyst</th>
              <th colspan="13">Chemical Composition</th>
            </tr>
            <tr>
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
          </thead>
        </table>
      </div>
    </div> -->
    <form method="POST" action="">
      <div class="row">
        <div class="col-3">
          <div class="card">
            <div class="card-header">
              Remelting
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <button type="button" class="btn btn-secondary btn-block mt-2">NO FURNACE</button>
                  <button type="button" class="btn btn-success btn-block mt-2" data-bs-toggle="modal" data-bs-target="#modal_product">PILIH PRODUK</button>
                  <button type="button" class="btn btn-success btn-block mt-2" id="get_start">START TIME</button>
                  <button type="button" class="btn btn-success btn-block mt-2" id="get_finish">FINISH TIME</button>
                  <button type="button" class="btn btn-secondary btn-block mt-2" onclick="totalTime();">TOTAL TIME</button>
                  <button type="button" class="btn btn-success btn-block mt-2">KWH AWAL</button>
                  <button type="button" class="btn btn-success btn-block mt-2">KWH AKHIR</button>
                  <button type="button" class="btn btn-secondary btn-block mt-2" onclick="totalKWH();">KWH TOTAL</button>
                  <button type="button" class="btn btn-success btn-block mt-2" onclick="addCatridge();">CATRIDGE</button>
                  <button type="button" class="btn btn-success btn-block mt-2" onclick="addGarpu();">GARPU SLUG</button>
                </div>
                <div class="col-6">
                  <input type="text" class="form-control mt-2" id="fm11" name="fm11" value="11" disabled>
                  <input type="text" class="form-control mt-2" id="product" name="product" placeholder="Nama Produk">
                  <input type="text" class="form-control mt-2" id="start" name="start" placeholder="Start Time">
                  <input type="text" class="form-control mt-2" id="finish" name="finish" placeholder="Finish Time">
                  <input type="text" class="form-control mt-2" id="total_time" name="total_time" placeholder="Total Time">
                  <input type="text" class="form-control mt-2" id="kwh_awal" name="kwh_awal" placeholder="KWH Awal">
                  <input type="text" class="form-control mt-2" id="kwh_akhir" name="kwh_akhir" placeholder="KWH Akhir">
                  <input type="text" class="form-control mt-2" id="kwh_total" name="kwh_total" placeholder="KWH Total">
                  <input type="text" class="form-control mt-2" id="catridge" name="catridge" placeholder="Catridge">
                  <input type="text" class="form-control mt-2" id="garpu" name="garpu" placeholder="Garpu Slug">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3">
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
                  <button type="button" class="btn btn-secondary btn-block mt-2">STEEL SCRAP HIGH Mn</button>
                  <button type="button" class="btn btn-secondary btn-block mt-2">STEEL SCRAP LOW Mn</button>
                  <button type="button" class="btn btn-secondary btn-block mt-2">STEEL SCRAP POTONG</button>
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
        </div>
        <div class="col-3">
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
                  <button type="button" class="btn btn-success btn-block mt-2">TEMPERATURE</button>
                </div>
                <div class="col-6">
                  <input type="text" class="form-control mt-2" id="asbury" placeholder="Carbon Asbury">
                  <input type="text" class="form-control mt-2" id="sacrab" placeholder="Carbon Sacrab">
                  <input type="text" class="form-control mt-2" id="fesi" placeholder="Fe-Si">
                  <input type="text" class="form-control mt-2" id="sic" placeholder="Si-C">
                  <input type="text" class="form-control mt-2" id="simn" placeholder="Si-Mn">
                  <input type="text" class="form-control mt-2" id="sn" placeholder="Sn">
                  <input type="text" class="form-control mt-2" id="s" placeholder="S">
                  <input type="text" class="form-control mt-2" id="cu" placeholder="Cu">
                  <input type="text" class="form-control mt-2" id="temp" placeholder="Temp.">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3">
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
                  <button type="button" class="btn btn-success btn-block mt-2">ACTUAL</button>
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
        </div>
      </div>
      <div class="row">
        <button type="submit" class="btn btn-primary btn-lg" id="add_melting" name="add_melting">SIMPAN DATA</button>
      </div>
    </form>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th rowspan="4">No</th>
        <th colspan="2">Remelting</th>
        <th rowspan="4">Nama Produk</th>
        <th colspan="11">Raw Material</th>
        <th rowspan="4">Cairan Balik</th>
        <th rowspan="4">Total Charging</th>
        <th colspan="8">Alloy Material</th>
        <th rowspan="4">Temp.</th>
        <th rowspan="4">Time Sample</th>
        <th rowspan="4">Time Analyst</th>
        <th colspan="13">Chemical Composition</th>
        <th rowspan="4">Catridge</th>
        <th rowspan="4">Garpu Slug</th>
        <th rowspan="4">Inspection</th>
      </tr>
      <tr>
        <th rowspan="3">JAM</th>
        <th rowspan="3">KWH</th>
        <th rowspan="3">RS FC</th>
        <th colspan="3">RS FCD</th>
        <th colspan="3">Stell Scrap</th>
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
      <tr>
        <!-- <th rowspan="2">Start</th>
        <th rowspan="2">Finish</th>
        <th rowspan="2">Total</th>
        <th rowspan="2">Start</th>
        <th rowspan="2">Finish</th>
        <th rowspan="2">Total</th> -->
        <th colspan="1">FCD 450</th>
        <th colspan="1">FCD 500</th>
        <th colspan="1">FCD 600</th>
        <th rowspan="2">High Mn</th>
        <th rowspan="2">Low Mn</th>
        <th rowspan="2">Potong</th>
        <th rowspan="2">Asbury</th>
        <th rowspan="2">Sacrab</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql_data_melting = "SELECT * FROM [PRD].[dbo].[melting]";
      $stmt_data_melting = sqlsrv_query($conn, $sql_data_melting);
      while($row_melting = sqlsrv_fetch_array($stmt_data_melting, SQLSRV_FETCH_ASSOC))
      {			
      ?>
      <tr>
          <td><?php echo $row_melting['FM']; ?></td>
          <td><?php echo substr($row_melting['StartTime'], 0,5); ?></td>
          <td><?php echo substr($row_melting['FinishTime'], 0,5); ?></td>
      </tr>
        
      <?php include  "module/pouring/modal_edit.php"; }
      ?>
    </tbody>
  </table>
</div>

<?php
    if(isset($_POST['add_melting'])){
        $fm = $_POST['fm11'];
        $product = $_POST['product'];
        $start = $_POST['start'];
        $finish = $_POST['finish'];
        $time = $_POST['total_time'];
        $awal = $_POST['kwh_awal'];
        $akhir = $_POST['kwh_akhir'];
        $kwh = $_POST['kwh_total'];
        $catridge = $_POST['catridge'];
        $garpu = $_POST['garpu'];
        // var_dump($fm);die;
        $sql_melting = "INSERT INTO [PRD].[dbo].[melting]
        (FM
        ,ProductCode
        ,StartTime
        ,FinishTime
        ,TotalTime
        ,KWHAwal
        ,KWHAkhir
        ,KWHTotal
        ,Catridge
        ,GarpuSlug)
        VALUES
        ('$fm'
        ,'$product'
        ,'$start'
        ,'$finish'
        ,'$time'
        ,'$awal'
        ,'$akhir'
        ,'$kwh'
        ,'$catridge'
        ,'$garpu')";
        $stmt_melting = sqlsrv_query($conn, $sql_melting);
        echo '<meta http-equiv="refresh" content="0" />';
    }
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
