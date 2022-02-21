                           <!-- javascript yang wajib yaa -->
						   
<script src="assets/frontend/js/jquery-2.2.4.min.js"></script>
<script src="assets/frontend/js/main.js"></script>



<!-- Wajib Modal FIX -->
<script src="assets/support/magnific-popup/magnific-popup.js"></script>
<script src="assets/support/ui-elements/examples.modals.js"></script>

<!-- Wajib Bootstrap
<script src="assets/support/bootstrap/js/bootstrap.bundle.min.js"></script>
-->
<script src="assets/support/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/support/bootstrap/js/bootstrap.js"></script>
<script src="assets/support/font_awesome/all.min.js"></script>

<!-- BS 5 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

<!-- Kumpulan Animasi -->
<script src="assets/support/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="assets/support/sweetalert2/sweetalert2.min.js"></script>

<!-- Wajib DataTables -->
<script src="assets/support/datatables/jquery.dataTables.min.js"></script>

<!-- Wajib DataTables Configuration Lengkap dan Banyak -->
<script src="assets/support/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/support/datatables-buttons/js/buttons.flash.min.js"></script>
<script src="assets/support/datatables-jszip/jszip.min.js"></script>
<script src="assets/support/datatables-pdfmake/pdfmake.min.js"></script>
<script src="assets/support/datatables-pdfmake/vfs_fonts.js"></script>
<script src="assets/support/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/support/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/support/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/support/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/support/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/support/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/support/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/support/datatables-SearchBuilder/js/dataTables.searchBuilder.min.js"></script>
<script src="assets/support/datatables-SearchBuilder/js/searchBuilder.bootstrap4.min.js"></script>
<script src="assets/support/datatables-fixedcolumns/js/fixedColumns.bootstrap4.min"></script>
<script src="assets/support/js/dataTables.fixedColumns.min.js"></script>


<!-- CHART JS Plugin -->
<script src="assets/support/chart.js/Chart.min.js"></script>
<script src="assets/support/jquery/jquery.flot.js"></script>
<script src="assets/support/jquery/jquery.flot.resize.min.js"></script>
<script src="assets/support/jquery/jquery.flot.pie.js"></script>
<script src="assets/support/jquery/jquery.flot.pie.min.js"></script>

<!-- Wajib Calendar -->
<script src="assets/frontend/js/bootstrap.min.js"></script>
<script src="assets/frontend/js/moment.min.js"></script>
<script src="assets/frontend/js/fullcalendar.min.js"></script>

<!-- Select2 -->
<script src="assets/support/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="assets/support/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>



<script>
  $(function ()
  {
	
	//IN
    $("#absenOnline1").DataTable
	({  
		dom: 'Bfrtip',
        buttons: [
            'copy'
        ],
		paging	: false
			
    });	
	
	$("#cekshift").DataTable
	({  
		
		paging	: true
			
    });	
	
	
	$("#TableParticipant_1").DataTable
	({  
		
		paging	: false
			
    });
	
	$("#indikator").DataTable
	({  
		"responsive": false,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		paging	: true
			
    });
	
	$("#SudahIsi").DataTable
	({  
		"responsive": false,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		paging	: true
			
    });
	
	
	$("#kriteria").DataTable
	({  
		"responsive": false,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		paging	: true
			
    });
	
	$("#ResumeBelumDeklarasi1").DataTable
	({  
		"responsive": false,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		paging	: true
			
    });
	
	$("#ResumeBelumDeklarasi3").DataTable
	({  
		"responsive": false,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		paging	: true
			
    });
	
	$("#ResumeBelumDeklarasi2").DataTable
	({  
		"responsive": false,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		paging	: false
			
    });
	
	$("#ResumeBelumDeklarasi4").DataTable
	({  
		"responsive": false,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		paging	: false
			
    });
	
	$("#TableParticipant_2").DataTable
	({  
		
		paging	: false
			
    });

	//IN
    $("#absenOnline2").DataTable
	({  
		dom: 'Bfrtip',
        buttons: [
            'copy'
        ],
		paging	: false
			
    });
	
	//IN
    $("#absenOnline3").DataTable
	({  
		dom: 'Bfrtip',
        buttons: [
            'copy'
        ],
		paging	: false
			
    });
	
	//IN
    $("#ControlKaryawan").DataTable
	({  
		
		paging : true,
		lengthChange	: true
			
    });
	
	//IN
    $("#absenOnline4").DataTable
	({  
		dom: 'Bfrtip',
        buttons: [
            'copy'
        ],
		paging	: false
			
    });
	  
	//Tabel List 1
    $("#DTlist_1").DataTable
	({  
		"responsive": true,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]			
    });
	
	$("#IzinSakit").DataTable
	({  
		"responsive": false,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]			
    });

	//Tabel List 2
    $("#DTlist_2").DataTable
	({  
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
			
    });

	//Tabel List 2
    $("#DTlist_3").DataTable
	({  
		"responsive": true,
		scrollY			: "400px",
			scrollX			: true,
			scrollCollapse	: false,
			paging			: false,
			fixedColumns	: true,
			lengthChange	: true,
    });
	
	//Tabel List 1
    $("#TableResumeCovid").DataTable
	({  
		"responsive": false,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		paging			: false	
    });
	
	//Tabel List 2
    $("#DTlist_4").DataTable
	({  
		"responsive": false			
    });
	
	//Tabel List 2
    $("#GetData").DataTable
	({  
		"responsive": false			
    });
	
	//Tabel List 2
    $("#GetData1").DataTable
	({  
		"responsive": false			
    });
	
	//Tabel List 2
    $("#Canteen").DataTable
	({  
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		"responsive": true,		
		
		paging			: false,
		 fixedColumns:   {
            leftColumns: 3,
            rightColumns: 0
        },
		lengthChange	: false,		
    });
	
	//Tabel List 2
    $("#CovidResult").DataTable
	({  
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		"responsive": false,
		scrollY			: "600px",
		scrollX			: true,
		scrollCollapse	: true,
		paging			: false,
		 fixedColumns:   {
            leftColumns: 2,
            rightColumns: 0
        },
		lengthChange	: false,		
    });
	
	//Tabel List 2
    $("#ControlKaryawan1").DataTable
	({  
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		"responsive": false,
		scrollY			: "600px",
		scrollX			: true,
		scrollCollapse	: true,
		paging			: false,
		 fixedColumns:   {
            leftColumns: 2,
            rightColumns: 0
        },
		lengthChange	: false,		
    });
	
	//Tabel List 2
    $("#Bus").DataTable
	({  
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		"responsive": false,
		scrollY			: "600px",
		scrollX			: true,
		scrollCollapse	: true,
		paging			: false,
		 fixedColumns:   {
            leftColumns: 3,
            rightColumns: 0
        },
		lengthChange	: false,		
    });
	
	//Tabel List 2
    $("#Bus_1").DataTable
	({  
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		"responsive": false,
		scrollY			: "600px",
		scrollX			: true,
		scrollCollapse	: true,
		paging			: false,
		 fixedColumns:   {
            leftColumns: 3,
            rightColumns: 0
        },
		lengthChange	: false,		
    });
	
	//Tabel List 2
    $("#DTlist_5").DataTable
	({  
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		"responsive": true,
		scrollY			: "600px",
		scrollX			: true,
		scrollCollapse	: true,
		paging			: false,
		fixedColumns	: true,
		lengthChange	: false,
		
    });
	
	//Tabel List 2
    $("#DTlist_6").DataTable
	({  
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		"responsive": true,
		scrollY			: "600px",
		scrollX			: true,
		scrollCollapse	: true,
		paging			: false,
		fixedColumns	: true,
		lengthChange	: false,
		
    });
	  
	//Tabel General
    $("#DT1").DataTable
	({  
		"responsive": true,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		scrollY			: "400px",
		scrollX			: true,
		scrollCollapse	: true		
    });

	$("#DT2").DataTable
	({ 
		searchBuilder: true,
		"responsive": true,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		scrollY			: "400px",
		scrollX			: true,
		scrollCollapse	: true
		
    });	
	
	//Table Full Function
	$(document).ready(function()
	{
		var table = $('#TablePro').DataTable
		({
			searchBuilder: true,
				dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
				],
			scrollY			: "400px",
			scrollX			: true,
			scrollCollapse	: true,
			paging			: true,
			fixedColumns	: true,
			lengthChange	: true,
			"responsive"	: true
		});
		
		
			
		var table = $('#TablePro1').DataTable
		({
			searchBuilder: true,
				dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
				],
			
			scrollX			: false,
			scrollCollapse	: false,
			paging			: false,
			fixedColumns	: false,
			lengthChange	: false,
			"responsive"	: true
		});
		
		table.searchBuilder.container().prependTo(table.table().container());
		table.buttons().container()
			.appendTo( '#example_wrapper .col-md-12:eq(0)' );
		
	});
	
  });
</script>

<script> 
	var table = $('#TablePro3').DataTable
		({
			searchBuilder: true,
				dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
				],
				
			
			scrollX			: false,
			scrollCollapse	: false,
			paging			: false,
			fixedColumns	: false,
			lengthChange	: false,
			"responsive"	: false
			
		});
		
		table.searchBuilder.container().prependTo(table.table().container());
		table.buttons().container()
			.appendTo( '#example_wrapper .col-md-12:eq(0)' ); 	  
 
</script>

<script>

    var table = $('#example').DataTable({
		"responsive": true,
		dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
				],        
		paging : false
    });
	
    // Handle click on "Expand All" button
    $('#btn-show-all-children').on('click', function(){
        // Expand row details
        table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
    });

    // Handle click on "Collapse All" button
    $('#btn-hide-all-children').on('click', function(){
        // Collapse row details
        table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
    });


</script>

<script>
$('#DisplayStatus').DataTable( {
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.childRowImmediate,
            type: ''
        }
    },
	paging : false,
	"searching": false,
	"bInfo" : false,
	 "ordering": false
} );
</script>



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })    
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()  

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>


<footer class="main-footer text-center">
	<strong style="color :black; font-size:14px; font-family: arial;">Copyright &copy; 2020 <a href="http://at-indonesia.co.id"> IT Team - PT. AT Indonesia</a></strong>
</footer>