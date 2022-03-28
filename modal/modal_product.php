<?php
require "config/query/Q_pouring.php";
?>
<div class="modal fade" id="modal_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SET PRODUCT</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <table id="data-product" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Nama Produk</th>
                </tr>
                </thead>
                <tbody>
                    
                    <?php
                    while($row_product = sqlsrv_fetch_array($stmt_product, SQLSRV_FETCH_ASSOC)) { ?>
                        <tr>
                            <td>
                                <button style ="text-align : center; font-size : 30px; font-weight : bold;" type="button" class="btn btn-secondary btn-block"  id="get_product" data-prdid="<?php echo $row_product['PartName']; ?>">
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
	  $('#data-product').DataTable
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
		$(document).on('click', '#get_product', function() {	
			var prd_id = $(this).data('prdid');	
			$('#product').val(prd_id);			
			$('#modal_product').modal('hide');
		})
	});
</script>