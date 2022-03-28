<?php
require "config/query/Q_pouring.php";
?>
<div class="modal fade" id="modal_productx" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SET PRODUCT</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <table id="data-productx" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Nama Produk</th>
                </tr>
                </thead>
                <tbody>
                    
                    <?php
                    while($row_product = sqlsrv_fetch_array($stmt_product, SQLSRV_FETCH_ASSOC)) { ?>
                        <tr > <td>
                        <button type="button" class="btn btn-secondary btn-block"  id="get_productx" data-prdidx="<?php echo $row_product['PartName']; ?>">
                                
                                <?php echo $row_product['PartName']; ?>
                            
                        </button>
                        </td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
	  $('#data-productx').DataTable
      ({
			searchBuilder: true,
			scrollX			: false,
			scrollCollapse	: false,
			paging			: false,
			fixedColumns	: false,
			lengthChange	: false,
		});
	});
    $(document).ready(function() {
		$(document).on('click', '#get_productx', function() {	
			var prd_id = $(this).data('prdidx');	
			$('#productx').val(prd_id);			
			$('#modal_productx').modal('hide');
		})
	});
</script>