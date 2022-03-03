<!--Untuk Header HTML-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="ATI" content="ATI">
<meta name="author" content="">
<link rel="icon" type="ico" href="assets/images/icon/ATI_bg.ico">
<title>ATI | e-Checksheet</title>

<!-- Desain Utama -->
<link rel="stylesheet" href="assets/frontend/css/main.css">
<link rel="stylesheet" href="assets/frontend/css/main.min.css">
<link rel="stylesheet" href="assets/frontend/css/fullcalendar.css">

<!-- BS 5-->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> -->
<script src="assets/frontend/js/bootstrap.bundle.min.js"></script>

<!-- Bahan Pendukung Desain -->
<link rel="stylesheet" href="assets/support/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="assets/support/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="assets/support/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<link rel="stylesheet" href="assets/support/css/google.font.css">

<!-- Desain DataTables -->
<link rel="stylesheet" href="assets/support/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/support/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="assets/support/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="assets/support/datatables-SearchBuilder/css/searchBuilder.bootstrap4.min.css">
<link rel="stylesheet" href="assets/support/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css">


<!-- Desain Modal Fix -->	
<link rel="stylesheet" href="assets/support/magnific-popup/magnific-popup.css" /> 

<!-- Select -->
<link rel="stylesheet" href="assets/support/select2/css/select2.min.css">
<link rel="stylesheet" href="assets/support/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="assets/support/sweetalert2/sweetalert2.min.js"></script>
<script src="assets/js/jquery-2.2.1.min.js"></script>
<script src="assets/frontend/js/jquery-2.2.1.min.js"></script>


<!-- Auto Sum JQuery -->
<script src="assets/frontend/js/jquery-1.7.1.min.js"></script>

<style type="text/css">
.preloader {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: +100000;
background-color:rgba(0, 0, 0, 0.65);
}
.preloader .loading {
position: fixed;
left: 50%;
top: 50%;
transform: translate(-50%,-50%);
font: 14px arial;
}
</style>


<script>
    $(window).bind("load", function() {
      $(".preloader").slideUp(100);
    });
</script>

<style>
@media screen {
  #printSection {
      display: none;
	  size: landscape;
  }
}
@media print {
  body * {
    visibility:hidden;
	
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}
</style>


  
 <style>
 
.buttonAbsenFinish {
  background-color: grey;
  border: none;
  color: white;
   padding: 40px 29px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;  
  font-family: arial;
  margin: 4px 2px;
  border-radius: 50%;
}
 
 .buttonAbsenOUT {
  background-color: red;
  border: none;
  color: white;
  padding: 36px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 25px;
  
  font-weight: bold;
  font-family: arial;
  margin: 4px 2px;
  border-radius: 50%;
}

.buttonAbsenIN {
  background-color: lime;
  border: none;
  color: white;
  padding: 30px 39px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 30px;
  font-weight: bold;
  font-family: arial;
  margin: 4px 2px;
  border-radius: 50%;
}
.buttonRd {
  background-color: #ff0000;
  border: none;
  color: white;
  padding: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  border-radius: 50%;
}
.buttonGr {
  background-color: #00ff00;
  border: none;
  color: white;
  padding: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  border-radius: 50%;
}
.buttonYL {
  background-color: #ffff00;
  border: none;
  color: yellow;
  padding: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  border-radius: 50%;
	border-radius: 50%;
}
.buttonhijau {
  background-color: #248f24;
  border: none;
  color: white;
  padding: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  font-weight: bold;
  margin: 4px 2px;
border-radius: 2px;
	border-radius: 2px;	
}
.buttonbirumuda {
  background-color: #00bfff;
  border: none;
  color: white;
  padding: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  font-weight: bold;
  margin: 4px 2px;
border-radius: 2px;
	border-radius: 2px;	
}
.buttonungu {
  background-color: purple;
  border: none;
  color: white;
  padding: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  font-weight: bold;
  margin: 4px 2px;
border-radius: 2px;
	border-radius: 2px;	
}
.buttonmerah {
  background-color: #ff0000;
  border: none;
  color: white;
  padding: 15px;
  text-align: center;
  text-decoration: yes;
  display: inline-block;
  font-size: 14px;
  font-weight: bold;
  margin: 4px 2px;
  border-radius: 2px;
	border-radius: 2px;	
}
.buttonBrown {
  background-color: Brown;
  border: none;
  color: white;
  padding: 15px;
  text-align: center;
  text-decoration: yes;
  display: inline-block;
  font-size: 14px;
  font-weight: bold;
  margin: 4px 2px;
  border-radius: 2px;
	border-radius: 2px;	
}
</style>
<!-- END CSS Button Custom -->  


