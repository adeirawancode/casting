<!-- Modal Edit -->
<div class="modal fade" id="modal_edit<?php echo $row_pouring['RecID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
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
                                    data-bs-target="#modal_fmx">FURNACE</button>
                                <input class="form-control mt-2" id="fmx" name="fmx" value="<?php echo $row_pouring['FM']; ?>"></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_productx">PRODUCT</button>
                                <input class="form-control mt-2" id="productx" name="productx" value="<?php echo $row_pouring['ProductCode']; ?>"></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_opx">OPERATOR</button>
                                <input class="form-control mt-2" id="opx" name="opx" value="<?php echo $row_pouring['OperatorID']; ?>"></input>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>START TIME</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="get_startx">START</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="startx" name="startx" value="<?php echo substr($row_pouring['StartTime'], 0,5); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>FINISH TIME</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="get_finishx">FINISH</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="finishx" name="finishx" value="<?php echo substr($row_pouring['FinishTime'], 0,5); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>POUR NG</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-primary" onclick="addPourNGx();">POUR NG</button>
                                    </div>
                                    <input type="text" class="form-control" id="pour_ngx" name="pour_ngx" value="<?php echo $row_pouring['PourNG']; ?>">
                                    <input type="hidden" class="form-control" value="<?php echo $row_pouring['RecID']; ?>" id="recID" name="recID">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>MOLD NG</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" onclick="addMoldNGx();">MOLD NG</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="mold_ngx" name="mold_ngx" value="<?php echo $row_pouring['MoldNG']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>EMPTY</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" onclick="addEmptyx();">EMPTY</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="emptyx" name="emptyx" value="<?php echo $row_pouring['Empty']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>TEMP.</label>
                                <input type="number" class="form-control" id="tempx" name="tempx" value="<?php echo $row_pouring['Temperature']; ?>"></input>
                            </div>
                            <div class="form-group">
                                <label>CHILL</label>
                                <input type="number" class="form-control" id="chillx" name="chillx" value="<?php echo $row_pouring['PanjangChill']; ?>"></input>
                            </div>
                            <div class="form-group">
                                <label>MOLD</label>
                                <input type="number" class="form-control" id="moldx" name="moldx" value="<?php echo $row_pouring['Mold']; ?>"></input>
                            </div>
                            <div class="form-group">
                                <label>TOTAL</label>
                                <input type="number" class="form-control" id="totalx" name="totalx" value="<?php echo $row_pouring['TotalMold']; ?>"></input>
                            </div>
                            <div class="form-group">
                                <label>FDT</label>
                                <input type="text" class="form-control" id="fdtx" name="fdtx" value="<?php echo $row_pouring['FaddingTime']; ?>"></input>
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
                        <textarea class="form-control mt-2" id="problemx" name="problemx"></textarea>
                    </div>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-lg btn-danger" id="alert" name="alert" onclick="alertXX();">ALERT</button>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-lg btn-primary" id="edit_data" name="edit_data">SIMPAN DATA</button>
                </div>
            </form>
            <?php
                if(isset($_POST["edit_data"])){
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

