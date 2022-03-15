<?php
require "config/query/Q_pouring.php";
?>
<!-- <div class="row">
    <div class="col-4">
        <div class="form-group">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal_fm">TANGGAL</button>
            <input class="form-control mt-2" id="fm" name="fm"></input>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal_product">SHIFT</button>
            <input class="form-control mt-2" id="product" name="product"></input>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal_op">OPERATOR</button>
            <input class="form-control mt-2" id="op" name="op"></input>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="form-group">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal_fm">FURNACE</button>
            <input class="form-control mt-2" id="fm" name="fm"></input>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal_product">PRODUCT</button>
            <input class="form-control mt-2" id="product" name="product"></input>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal_op">CHARGING</button>
            <input class="form-control mt-2" id="op" name="op"></input>
        </div>
    </div>
</div> -->

<button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#fc">FC</button>
<button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#fcd450">FCD 450</button>
<button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#fcd500">FCD 500</button>
<button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#fcd600">FCD 600</button>
<button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#highmn">HIGH MN</button>
<button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#lowmn">LOW MN</button>
<button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#chips">CHIPS</button>
<button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#stblock">ST BLOCK</button>
<button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#pig">PIG IRON</button>

<table class="table mt-2">
    <thead class="thead-dark">
    <tr>
        <th>NO CHARGING</th>
        <th>FM</th>
        <th>NAMA PRODUK</th>
        <th>MATERIAL</th>
        <th>JUMLAH</th>
    </tr>
    </thead>
</table>

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

<!-- Modal FC -->
<div class="modal fade" id="fc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RETURN SCRAP FC</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea type="number" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
        <button type="button" class="btn btn-primary">SIMPAN</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="fcd450" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RETURN SCRAP FCD 450</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea type="number" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
        <button type="button" class="btn btn-primary">SIMPAN</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="fcd500" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RETURN SCRAP FCD 500</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea type="number" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
        <button type="button" class="btn btn-primary">SIMPAN</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="fcd600" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RETURN SCRAP FCD 600</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea type="number" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
        <button type="button" class="btn btn-primary">SIMPAN</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="highmn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">STEEL SCRAP HIGH MN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea type="number" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
        <button type="button" class="btn btn-primary">SIMPAN</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="lowmn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">STEEL SCRAP LOW MN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea type="number" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
        <button type="button" class="btn btn-primary">SIMPAN</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="chips" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CHIPS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea type="number" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
        <button type="button" class="btn btn-primary">SIMPAN</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="stblock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ST BLOCK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea type="number" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
        <button type="button" class="btn btn-primary">SIMPAN</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pig" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PIG IRON</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea type="number" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
        <button type="button" class="btn btn-primary">SIMPAN</button>
      </div>
    </div>
  </div>
</div>