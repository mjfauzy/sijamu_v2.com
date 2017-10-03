<?php
	include "../koneksi.php";
	$id = $_GET['id'];
	$status = "Telah Dihapus";
	$tanggal = date('d-m-Y, H:i:s');

	$select = mysqli_query($connect,"SELECT no_dokumen FROM tbl_dokumen WHERE id='$id'");
	if($select) {
		if($select->num_rows > 0) {
			while($row_select = $select->fetch_object()) {
				$no_dokumen = $row_select->no_dokumen;
				$remove_from_daftar_induk = mysqli_query($connect,"DELETE FROM tbl_rek_daftar_induk_dokumen WHERE no_dokumen='$no_dokumen'");
			}
		}
	}

	$delete = mysqli_query($connect,"UPDATE tbl_dokumen set status='$status' WHERE id='$id'");
	$move_file = mysqli_query($connect,"SELECT file FROM tbl_dokumen WHERE id='$id'");
	if($move_file) {
		if($move_file->num_rows > 0) {
			while($row = $move_file->fetch_object()) {
				$file = $row->file;
				rename('../files/uploads/draf/'.$file,'../files/trash/'.$file);
			}
		}
	}

	$connect->close();
	header('location:menu_0.php');
	exit();
?>