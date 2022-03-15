<!-- Modal Edit -->
<div class="modal fade" id="modal_edit<?php echo $row_pouring['RecID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input class="form-control mt-2" id="fm" name="fm" value="<?php echo $row_pouring['FM']; ?>"></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_product">PRODUCT</button>
                                <input class="form-control mt-2" id="product" name="product" value="<?php echo $row_pouring['ProductCode']; ?>"></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_op">OPERATOR</button>
                                <input class="form-control mt-2" id="op" name="op" value="<?php echo $row_pouring['OperatorID']; ?>"></input>
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
                                        aria-describedby="inputGroup-sizing-default" id="start" name="start" value="<?php echo substr($row_pouring['StartTime'], 0,5); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>FINISH TIME</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="get_finish">FINISH</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="finish" name="finish" value="<?php echo substr($row_pouring['FinishTime'], 0,5); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>POUR NG</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" onclick="addPourNG();">POUR NG</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="pour_ng" name="pour_ng" value="<?php echo $row_pouring['PourNG']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>MOLD NG</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" onclick="addMoldNG();">MOLD NG</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="mold_ng" name="mold_ng" value="<?php echo $row_pouring['MoldNG']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>EMPTY</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" onclick="addEmpty();">EMPTY</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" id="empty" name="empty" value="<?php echo $row_pouring['Empty']; ?>">
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
                                <input type="number" class="form-control" id="temp" name="temp" value="<?php echo $row_pouring['Temperature']; ?>"></input>
                            </div>
                            <!-- <div class="form-group">
                <button type="button" class="btn btn-secondary mt-2" data-bs-toggle="modal" data-bs-target="#">PIN</button>
                <input class="form-control mt-2" id="pin" name="pin"></input>
              </div> -->
                            <div class="form-group">
                                <label>CHILL</label>
                                <input type="number" class="form-control" id="chill" name="chill" value="<?php echo $row_pouring['PanjangChill']; ?>"></input>
                            </div>
                            <div class="form-group">
                                <label>MOLD</label>
                                <input type="number" class="form-control" id="mold" name="mold" value="<?php echo $row_pouring['Mold']; ?>"></input>
                            </div>
                            <div class="form-group">
                                <label>TOTAL</label>
                                <input type="number" class="form-control" id="total" name="total" value="<?php echo $row_pouring['TotalMold']; ?>"></input>
                            </div>
                            <div class="form-group">
                                <label>FDT</label>
                                <input type="text" class="form-control" id="fdt" name="fdt" value="<?php echo $row_pouring['FaddingTime']; ?>"></input>
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
                    <button type="submit" class="btn btn-primary" id="edit_data" name="edit_data">SIMPAN DATA</button>
                </div>
            </form>
            <?php
                if(isset($_POST["edit_data"])){
                // $RecID = $_POST['RecID'];
                $fm = $_POST['fm'];
                $product = $_POST['product'];
                $start = $_POST['start'];
                $finish = $_POST['finish'];
                $temp = $_POST['temp'];
                $chill = $_POST['chill'];
                $mold = $_POST['mold'];
                $total = $_POST['total'];
                $mold_ng = $_POST['mold_ng'];
                $pour_ng = $_POST['pour_ng'];
                $empty = $_POST['empty'];
                $op = $_POST['op'];
                $fdt = $_POST['fdt'];
                $problem = $_POST['problem'];
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