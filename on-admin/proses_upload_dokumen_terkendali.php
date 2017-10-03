<?php
	include "../koneksi.php";

	$id = $_POST['id'];

	$file_terkendali = "MASTER".$_FILES['file_upload']['name'];
	$file_loc = $_FILES['file_upload']['tmp_name'];
	$file_size = $_FILES['file_upload']['size'];
	$file_type = $_FILES['file_upload']['type'];
	$folder = "files/uploads/terkendali/";

	$status = "Terkendali";
	$tanggal = date('d-m-Y, H:i:s');

	$search = mysqli_query($connect,"SELECT kode_dokumen,file FROM tbl_dokumen where id='$id'");

	if($search) {
		if($search->num_rows > 0) {
			while($row = $search->fetch_object()) {
				$kode_dokumen = $row->kode_dokumen;
				$approve = mysqli_query($connect,"UPDATE tbl_dokumen AS a,tbl_rek_daftar_induk_dokumen AS b SET a.status='$status',a.file='$file_terkendali',a.file_type='$file_type',a.file_size='$file_size',a.last_edited='$tanggal',b.status='$status' WHERE a.kode_dokumen='$kode_dokumen' AND b.kode_dokumen='$kode_dokumen' AND a.status IN ('Disahkan') AND b.status IN ('Disahkan')");
				$file = $row->file;
				unlink('files/uploads/disahkan/'.$file);
				move_uploaded_file($file_loc,$folder.$file_terkendali);
			}
		}
	}

	$connect->close();
	header('location:menu_2.php');
	exit();
?>