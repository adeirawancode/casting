<?php
$id_edit_pouring = $_SESSION['RecID'];
$get_edit = "SELECT * FROM [PRD].[dbo].[pouring] WHERE RecID = '$id_edit_pouring'";
$stmt_edit = sqlsrv_query($conn, $get_edit);
while($row_edit = sqlsrv_fetch_array($stmt_edit, SQLSRV_FETCH_ASSOC))
{
    $fm = $row_edit['FM'];
    $product = $row_edit['ProductCode'];
    $op = $row_edit['OperatorID'];
    $start =  $row_edit['StartTime'];
    $finish = $row_edit['FinishTime'];
    $pour = $row_edit['PourNG'];
    $mold_ng = $row_edit['MoldNG'];
    $empty = $row_edit['Empty'];
    $chill = $row_edit['PanjangChill'];
    $total_mold = $row_edit['TotalMold'];
    $mold = $row_edit['Mold'];
    $fdt = $row_edit['FaddingTime'];
    $temp = $row_edit['Temperature'];
}
?>
<form method="POST">
    <div class="modal-body">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modal_fmx">FURNACE</button>
                    <input class="form-control mt-2" id="fmx" name="fmx" value="<?php echo $fm ?>"></input>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modal_productx">PRODUCT</button>
                    <input class="form-control mt-2" id="productx" name="productx" value="<?php echo $product ?>"></input>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modal_opx">OPERATOR</button>
                    <input class="form-control mt-2" id="opx" name="opx" value="<?php echo $op ?>"></input>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>START TIME</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-primary" id="get_startx"><i class="fas fa-clock"></i></button>
                        </div>
                        <input type="text" class="form-control" aria-label="Default"
                            aria-describedby="inputGroup-sizing-default" id="startx" name="startx" value="<?php echo substr($start, 11,5); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>FINISH TIME</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-primary" id="get_finishx"><i class="fas fa-clock"></i></button>
                        </div>
                        <input type="text" class="form-control" aria-label="Default"
                            aria-describedby="inputGroup-sizing-default" id="finishx" name="finishx" value="<?php echo substr($finish, 11,5); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>POUR NG</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-primary" onclick="addPourNGx();"><i class="fas fa-plus"></i></button>
                        </div>
                        <input type="text" class="form-control" id="pour_ngx" name="pour_ngx" value="<?php echo $pour ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>MOLD NG</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-primary" onclick="addMoldNGx();"><i class="fas fa-plus"></i></button>
                        </div>
                        <input type="text" class="form-control" aria-label="Default"
                            aria-describedby="inputGroup-sizing-default" id="mold_ngx" name="mold_ngx" value="<?php echo $mold_ng ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>EMPTY</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-primary" onclick="addEmptyx();"><i class="fas fa-plus"></i></button>
                        </div>
                        <input type="text" class="form-control" aria-label="Default"
                            aria-describedby="inputGroup-sizing-default" id="emptyx" name="emptyx" value="<?php echo $empty ?>">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>TEMP.</label>
                    <input type="number" class="form-control" id="tempx" name="tempx" value="<?php echo $temp ?>"></input>
                </div>
                <div class="form-group">
                    <label>CHILL</label>
                    <input type="number" class="form-control" id="chillx" name="chillx" value="<?php echo $chill ?>"></input>
                </div>
                <div class="form-group">
                    <label>MOLD</label>
                    <input type="number" class="form-control" id="moldx" name="moldx" value="<?php echo $mold ?>"></input>
                </div>
                <div class="form-group">
                    <label>TOTAL</label>
                    <input type="number" class="form-control" id="totalx" name="totalx" value="<?php echo $total_mold ?>"></input>
                </div>
                <div class="form-group">
                    <label>FDT</label>
                    <input type="text" class="form-control" id="fdtx" name="fdtx" value="<?php echo $fdt ?>"></input>
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
        <button type="submit" class="btn btn-lg btn-primary" id="edit_data" name="edit_data">SIMPAN DATA</button>
    </div>
    <div class="row mt-2">
        <a href="pages.php?p=module/pouring/checksheet_pouring.php"><button type="button" class="btn btn-secondary btn-lg btn-block" id="" name="">KEMBALI</button></a>
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

<script>
    function addMoldNGx() {
		let value = parseInt(document.getElementById('mold_ngx').value, 10);
    	value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('mold_ngx').value = value;
    }
	function addPourNGx() {
		
        var PourNGparse = parseInt(document.getElementById('pour_ngx').value, 10);
    	PourNGparse = isNaN(PourNGparse) ? 0 : PourNGparse;
        PourNGparse++;
        document.getElementById('pour_ngx').value = PourNGparse;
    }
	function addEmptyx() {
		let value = parseInt(document.getElementById('emptyx').value, 10);
    	value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('emptyx').value = value;
    }
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
		$(document).on('click', '#get_productx', function() {	
			var prd_id = $(this).data('prdid');	
			$('#productx').val(prd_id);			
			$('#modal_productx').modal('hide');
		})
		$(document).on('click', '#get_fmx', function() {	
			var fm_id = $(this).data('fmid');	
			$('#fmx').val(fm_id);			
			$('#modal_fmx').modal('hide');
		})
		$(document).on('click', '#get_opx', function() {
			var op = $(this).data('empid');	
			$('#opx').val(op);				
			$('#modal_opx').modal('hide');	
		})
	});
</script>