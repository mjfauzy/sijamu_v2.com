<?php
  
  session_start();
  include "../koneksi.php";
	$keyword = $_GET['keyword'];

  $search = explode(' ', $keyword);
  $sql = "SELECT * FROM tbl_dokumen WHERE status='Telah Didistribusi' AND ( ";

  $parts = array();
  $kata = array();

  foreach($search as $search_word) {
    $parts[] = 'tgl_upload LIKE "%'.$search_word.'%"';
    $parts[] = 'kode_jenis LIKE "%'.$search_word.'%"';
    $parts[] = 'no_dokumen LIKE "%'.$search_word.'%"';
    $parts[] = 'judul_dokumen LIKE "%'.$search_word.'%"';
    $parts[] = 'keterangan_output LIKE "%'.$search_word.'%"';
    $parts[] = 'tahun_prioritas LIKE "%'.$search_word.'%"';
    $kata[] = $search_word;
  }

  $sql .= implode(' OR ', $parts).')';

?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Hasil Pencarian</h4>
        </div>

        <div class="modal-body">
            <div class="form-group">
              <label for="Keyword">Keyword</label>
              <input type="text" name="keyword" class="form-control" disabled value="<?php echo $keyword; ?>" />
            </div>
            
            <div class="form-group" style="padding-bottom: 20px;">
              <table id="mytable" class="table table-bordered">
                <thead>
                  <th>No.</th>
                  <th>Tanggal Upload</th>
                  <th>Kode Jenis</th>
                  <th>No. Dokumen</th>
                  <th>Judul</th>
                  <th>Keterangan</th>
                  <th>Tahun Prioritas</th>
                  <th>File</th>
                </thead>
                <?php 
                  $result_dokumen = mysqli_query($connect, $sql);
                  $no = 0;
                  
                  if ($result_dokumen) {
                    if ($result_dokumen->num_rows > 0) {
                      while ($row_dokumen = $result_dokumen->fetch_object()) {
                        $no++;
                        echo "<tr class='text-center'>";
                          echo "<td>$no.</td>";
                          echo "<td>$row_dokumen->tgl_upload</td>";
                          echo "<td>$row_dokumen->kode_jenis</td>";
                          echo "<td class='text-left'>$row_dokumen->no_dokumen</td>";
                          echo "<td class='text-left'>$row_dokumen->judul_dokumen</td>";
                          echo "<td class='text-left'>$row_dokumen->keterangan_output</td>";
                          echo "<td>$row_dokumen->tahun_prioritas</td>";
                          echo "<td>";
                            $result_file_distribusi = mysqli_query($connect,"SELECT * FROM tbl_rek_file_distribusi WHERE id_dokumen='$row_dokumen->id' AND kode_salinan='MASTER'");
                            if($result_file_distribusi) {
                              if($result_file_distribusi->num_rows > 0) {
                                while($row_file = $result_file_distribusi->fetch_object()) {
                                  if($row_dokumen->id == $row_file->id_dokumen) {
                                    if($row_file->file == '') {
                                      echo "-";
                                    } else {
                                      echo "<a href='../files/uploads/terkendali/master/$row_file->file' target='_blank' class='btn btn-primary glyphicon glyphicon-file' title='View File'></a>";
                                    }
                                  }
                                }
                              } 
                            }
                          echo "</td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr>";
                        echo "<td class='text-center' colspan='8'>Data Tidak Ditemukan</td>";
                      echo "</tr>";
                    }
                  }
                ?>

                  </table>
                </div>

              <div class="modal-footer">           
                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span>                   
                  Tutup
                </button>
              </div>
        </div>
    </div>
</div>

<?php
	$connect->close();
  exit();
?>