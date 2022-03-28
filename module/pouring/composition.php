<?php
session_start();
require "../../config/dbkoneksi.php";

$fm_cms = $_GET['fm']; // GET VARIABEL
$sample = $_GET['sample'];
$laddle = $_GET['laddle'];
$qty = $_GET['qty'];
$analyst = $_GET['analyst'];

$qty_result = str_replace(':0-','&',$qty);
$qty_result_ = str_replace(':0','&',$qty_result);

$c = substr($qty_result_, 2,4);
$si = substr($qty_result_, 10,4);
$mn = substr($qty_result_, 18,4);
$p = substr($qty_result_, 25,4);
$s = substr($qty_result_, 33,5);
$cu = substr($qty_result_, 42,5);
$sn = substr($qty_result_, 51,5);
$mg = substr($qty_result_, 60,5);
$ti = substr($qty_result_, 69,5);
$cr = substr($qty_result_, 78,5);
$ni = substr($qty_result_, 87,5);
$al = substr($qty_result_, 96,5);
$mo = substr($qty_result_, 105,5);
$v = substr($qty_result_, 113,5);
$zn = substr($qty_result_, 122,5);
$sb = substr($qty_result_, 131,5);
$fe1 = substr($qty_result_, 141,6);
$fe2 = substr($qty_result_, 152,6);

// var_dump($fm_cms);die;
// echo ($si);die;
// $_SESSION[$fid[$i]];

$sql_comp_pouring = "UPDATE [PRD].[dbo].[pouring]
   SET 
    C = '$c'
    ,Si = '$si'
    ,Mn = '$mn'
    ,Ti = '$ti'
    ,Ni = '$ni'
    ,Al = '$al'
    ,V = '$v'
    ,Zn = '$zn'
    ,Sb = '$sb'
    ,Mo = '$mo'
    ,S = '$s'
    ,Cu = '$cu'
    ,Sn = '$sn'
    ,Mg = '$mg'
    ,Cr = '$cr'
    ,P = '$p'
    ,Fe1 = '$fe1'
    ,Fe2 = '$fe2'
 WHERE FM = '$fm_cms'";
 $stmt_comp_pouring = sqlsrv_query($conn, $sql_comp_pouring);

$sql_comp_melting = "UPDATE [PRD].[dbo].[melting]
   SET 
   TimeAnalyst = '$analyst'
   ,CAct = '$c'
   ,SiAct = '$si'
   ,MnAct = '$mn'
   ,TiAct = '$ti'
   ,NiAct = '$ni'
   ,AlAct = '$al'
   ,ZnAct = '$zn'
   ,SbAct = '$sb'
   ,SAct = '$s'
   ,CuAct = '$cu'
   ,SnAct = '$sn'
   ,CrAct = '$cr'
   ,PAct = '$p'
   WHERE FM = '$fm_cms'";
 $stmt_comp_melting = sqlsrv_query($conn, $sql_comp_melting);
//  var_dump($sql_composition);die;

$_SESSION['loadpage'] = 'module/pouring/composition.php'; // REGISTER NEXT PAGE
		
header('Location: ../../echecksheet'); // INDEX

?>