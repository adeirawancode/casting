<div class="modal fade" id="modal_edit<?php echo $row_melting['RecID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORM E-CHECKSHEET</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
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
                          <button type="button" class="btn btn-success btn-block mt-2" >CAIRAN BALIK</button>
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control mt-2" id="fm" name="fm" value="<?php echo $row_melting['FM']; ?>" readonly>
                          <input type="text" class="form-control mt-2" id="product" name="product" placeholder="Nama Produk" value="<?php echo $row_melting['ProductCode']; ?>" readonly>
                          <input type="text" class="form-control mt-2" id="start" name="start" placeholder="Start Time" value="<?php echo $row_melting['StartTime']; ?>" readonly>
                          <input type="text" class="form-control mt-2" id="finish" name="finish" placeholder="Finish Time" value="<?php echo $row_melting['FinishTime']; ?>" readonly>
                          <input type="text" class="form-control mt-2" id="total_time" name="total_time" placeholder="Total Time" value="<?php echo $row_melting['TotalTime']; ?>" readonly>
                          <input type="text" class="form-control mt-2 kwh" id="kwh_awal" name="kwh_awal" placeholder="KWH Awal" value="<?php echo $row_melting['KWHAwal']; ?>">
                          <input type="text" class="form-control mt-2 kwh" id="kwh_akhir" name="kwh_akhir" placeholder="KWH Akhir" value="<?php echo $row_melting['KWHAkhir']; ?>">
                          <input type="text" class="form-control mt-2 total" id="kwh_total" name="kwh_total" onchange="totalKWH();" placeholder="KWH Total" value="<?php echo $row_melting['KWHTotal']; ?>" readonly>
                          <input type="text" class="form-control mt-2" id="catridge" name="catridge" placeholder="Catridge" value="<?php echo $row_melting['Catridge']; ?>" readonly>
                          <input type="text" class="form-control mt-2" id="garpu" name="garpu" placeholder="Garpu Slug" value="<?php echo $row_melting['GarpuSlug']; ?>" readonly>
                          <input type="text" class="form-control mt-2" id="cairan" name="cairan" placeholder="Cairan Balik" value="<?php echo $row_melting['CairanBalik']; ?>">
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
                          <input type="text" class="form-control mt-2" id="rs_fc" placeholder="RS FC" value="<?php echo $row_melting['FC']; ?>">
                          <input type="text" class="form-control mt-2" id="fcd_450" placeholder="RS FCD 450" value="<?php echo $row_melting['FCD450']; ?>">
                          <input type="text" class="form-control mt-2" id="fcd_500" placeholder="RS FCD 500" value="<?php echo $row_melting['FCD500']; ?>">
                          <input type="text" class="form-control mt-2" id="fcd_600" placeholder="RS FCD 600" value="<?php echo $row_melting['FCD600']; ?>">
                          <input type="text" class="form-control mt-2" id="high_mn" placeholder="Steel Scrap High Mn" value="<?php echo $row_melting['HighMn']; ?>">
                          <input type="text" class="form-control mt-2" id="low_mn" placeholder="Steel Scrap Low Mn" value="<?php echo $row_melting['LowMn']; ?>">
                          <input type="text" class="form-control mt-2" id="potong" placeholder="Steel Scrap Potong" value="<?php echo $row_melting['Potong']; ?>">
                          <input type="text" class="form-control mt-2" id="chips" placeholder="Chips" value="<?php echo $row_melting['Chips']; ?>">
                          <input type="text" class="form-control mt-2" id="start_block" placeholder="Start Block" value="<?php echo $row_melting['STBlock']; ?>">
                          <input type="text" class="form-control mt-2" id="pig_iron" placeholder="Pig Iron" value="<?php echo $row_melting['PigIron']; ?>">
                          <input type="text" class="form-control mt-2" id="kawul" placeholder="Kawul" value="<?php echo $row_melting['Kawul']; ?>">
                          <input type="text" class="form-control mt-2" id="cairan_balik" placeholder="Cairan Balik" value="<?php echo $row_melting['CairanBalik']; ?>">
                          <input type="text" class="form-control mt-2" id="total_charging" placeholder="Total Charging" value="<?php echo $row_melting['TotalCharging']; ?>">
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
                          <button type="button" class="btn btn-success btn-block mt-2">OTHER</button>
                          <button type="button" class="btn btn-success btn-block mt-2">TEMPERATURE</button>
                          <button type="button" class="btn btn-success btn-block mt-2" id="get_sample">TIME SAMPLE</button>
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control mt-2" id="asbury" name="asbury" placeholder="Carbon Asbury" value="<?php echo $row_melting['Asbury']; ?>">
                          <input type="text" class="form-control mt-2" id="sacrab" name="sacrab" placeholder="Carbon Sacrab" value="<?php echo $row_melting['Sacrab']; ?>">
                          <input type="text" class="form-control mt-2" id="fesi" name="fesi" placeholder="Fe-Si" value="<?php echo $row_melting['FeSi']; ?>">
                          <input type="text" class="form-control mt-2" id="sic" name="sic" placeholder="Si-C" value="<?php echo $row_melting['SiC']; ?>">
                          <input type="text" class="form-control mt-2" id="simn" name="simn" placeholder="Si-Mn" value="<?php echo $row_melting['SiMn']; ?>">
                          <input type="text" class="form-control mt-2" id="sn" name="sn" placeholder="Sn" value="<?php echo $row_melting['Sn']; ?>">
                          <input type="text" class="form-control mt-2" id="s" name="s" placeholder="S" value="<?php echo $row_melting['S']; ?>">
                          <input type="text" class="form-control mt-2" id="cu" name="cu" placeholder="Cu" value="<?php echo $row_melting['Cu']; ?>">
                          <input type="text" class="form-control mt-2" id="other" name="other" placeholder="Other" value="<?php echo $row_melting['Other']; ?>">
                          <input type="text" class="form-control mt-2" id="temp" name="temp" placeholder="Temp." value="<?php echo $row_melting['Temperature']; ?>">
                          <input type="text" class="form-control mt-2" id="time_sample" name="time_sample" placeholder="Time Sample" value="<?php echo $row_melting['TimeSample']; ?>" readonly>
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
                          <button type="button" class="btn btn-success btn-block mt-2" data-bs-toggle="modal" data-bs-target="#modal_composition">ACTUAL</button>
                          <input type="text" class="form-control mt-2" id="c_act" placeholder="C" value="<?php echo $row_melting['CAct']; ?>">
                          <input type="text" class="form-control mt-2" id="si_act" placeholder="Si" value="<?php echo $row_melting['SiAct']; ?>">
                          <input type="text" class="form-control mt-2" id="mn_act" placeholder="Mn" value="<?php echo $row_melting['MnAct']; ?>">
                          <input type="text" class="form-control mt-2" id="s_act" placeholder="S" value="<?php echo $row_melting['SAct']; ?>">
                          <input type="text" class="form-control mt-2" id="cu_act" placeholder="Cu" value="<?php echo $row_melting['CuAct']; ?>">
                          <input type="text" class="form-control mt-2" id="sn_act" placeholder="Sn" value="<?php echo $row_melting['SnAct']; ?>">
                          <input type="text" class="form-control mt-2" id="cr_act" placeholder="Cr" value="<?php echo $row_melting['CrAct']; ?>">
                          <input type="text" class="form-control mt-2" id="p_act" placeholder="P" value="<?php echo $row_melting['PAct']; ?>">
                          <input type="text" class="form-control mt-2" id="zn_act" placeholder="Zn" value="<?php echo $row_melting['ZnAct']; ?>">
                          <input type="text" class="form-control mt-2" id="al_act" placeholder="Al" value="<?php echo $row_melting['AlAct']; ?>">
                          <input type="text" class="form-control mt-2" id="ti_act" placeholder="Ti" value="<?php echo $row_melting['TiAct']; ?>">
                          <input type="text" class="form-control mt-2" id="ni_act" placeholder="Ni" value="<?php echo $row_melting['NiAct']; ?>">
                          <input type="text" class="form-control mt-2" id="sb_act" placeholder="Sb" value="<?php echo $row_melting['SbAct']; ?>">
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
                $fm = $_POST['fmx'];
                $product = $_POST['productx'];
                $start = $_POST['startx'];
                $finish = $_POST['finishx'];
                $temp = $_POST['tempx'];
                $chill = $_POST['chillx'];
                $mold = $_POST['moldx'];
                $total = $_POST['totalx'];
                $mold_ng = $_POST['mold_ngx'];
                $pour_ng = $_POST['pour_ngx'];
                $empty = $_POST['emptyx'];
                $op = $_POST['opx'];
                $fdt = $_POST['fdtx'];
                $problem = $_POST['problemx'];
                $sql_edit = "UPDATE [PRD].[dbo].[pouring]
                SET
                FM = '$fm'
                ,ProductCode = '$product'
                ,StartTime = '$start'
                ,FinishTime = '$finish'
                ,Temperature = '$temp'
                -- ,PinSample = '$pin'
                ,PanjangChill = '$chill'
                ,Mold = '$mold'
                ,TotalMold = '$total'
                ,MoldNG = '$mold_ng'
                ,PourNG = '$pour_ng'
                ,Empty = '$empty'
                ,OperatorID = '$op'
                ,FaddingTime = '$fdt'
                ,StopLineID =  '$problem'
                WHERE StartTime = '$start'";
                $stmt_edit = sqlsrv_query($conn, $sql_edit);
                echo '<meta http-equiv="refresh" content="0" />';
                // var_dump($stmt_edit);die;
                }
            ?>
        </div>
    </div>
</div>