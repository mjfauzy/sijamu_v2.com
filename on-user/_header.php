<?php

session_start();

if(!isset($_SESSION['nama']) && $_SESSION['nama'] == '') {
  header('location:../index.php');
} elseif($_SESSION['level'] != 'user') {
  session_destroy();
  header('location:../index.php');
}

$id_user = $_SESSION['id'];
$eselon = $_SESSION['eselon'];
$jabatan = $_SESSION['jabatan'];
$nama_org = $_SESSION['nama_org'];

?>

<!doctype html>
<html lang="en">
<head>
  <title>SIJAMU - Sistem Informasi Jaminan Mutu</title>
  <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
  <meta content="MJFauzy" name="author"/>
  <link href="../css/bootstrap.css" rel="stylesheet">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src="../images/logo.jpg" /> SIJAMU</a>
    </div> 
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
      <li class="dropdown">
      	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-folder-open"></span> Data Dokumen <span class="caret"></span></a>
      	<ul class="dropdown-menu">
          <?php
            if($eselon == "Eselon IV" || $jabatan == "Operator Alat $nama_org" || $jabatan == "Staf $nama_org") {
              echo "<li><a href='menu_1.php'><span class='glyphicon glyphicon-plus'></span> Tambah Dokumen</a></li>";
            } 

            if($eselon == "Eselon II" || $eselon == "Eselon III" || $jabatan == "Penanggungjawab Alat $nama_org" || ($eselon == "Eselon IV" && $nama_org == "Sub Bag. PKDI") || ($eselon == "Eselon IV" && $nama_org == "Sub Bag. Keuangan") || ($eselon == "Eselon IV" && $nama_org == "Sub Bag. Perlengkapan")) {
              echo "<li><a href='menu_2.php'><span class='glyphicon glyphicon-inbox'></span> Dokumen Masuk</a></li>";
            }
          ?>
          <li><a href="menu_3.php"><span class="glyphicon glyphicon-list-alt"></span> Dokumen Terkendali</a></li>
          <?php
            if($eselon != "Eselon II") {
              echo "<li><a href='menu_4.php'><span class='glyphicon glyphicon-file'></span> Usulan Dokumen</a></li>";
              echo "<li><a href='menu_5.php'><span class='glyphicon glyphicon-download-alt'></span> Unduh Template</a></li>";
            }
          ?>
      	</ul>
      </li>
      <li><a href="menu_data_user.php"><span class="glyphicon glyphicon-user"></span> Data User</a></li>
      <li><a href="files/panduan/PANDUAN_SIJAMU.pdf" target="_blank"><span class="glyphicon glyphicon-book"></span> Panduan</a></li> 
      <li><a href="#" data-toggle="modal" data-target="#ModalLogout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>


<!-- Modal Login Form -->
    <div id="ModalLogout" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title text-center">Anda Yakin Ingin Logout?</h4>
          </div>
          <div class="modal-body text-center">
          	<a href="check-logout.php" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Ya</a>
          	<button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Tidak</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->