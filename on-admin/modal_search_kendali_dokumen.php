<?php
  
  session_start();
  include "../koneksi.php";
	$keyword = $_GET['keyword'];

  $search = explode(' ', $keyword);
  $sql = "SELECT * FROM tbl_dokumen WHERE status NOT IN ('Tidak Berlaku','Telah Dihapus') AND ( ";

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
                  <th>Aksi</th>
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
                            $status = $row_dokumen->status;
                            if($status == 'Draf') {
                              echo "Terperiksa Oleh yang Berwenang";
                            } elseif($status == 'Telah Diperiksa') {
                              echo "Tersahkan Oleh yang Berwenang";
                            } elseif($status == 'Telah Disahkan') {
                              echo "<a href='#' class='open_modal_distribusi btn btn-success' data-dismiss='modal' id='$row_dokumen->id'><span class='glyphicon glyphicon-list'></span> Distribusi Dokumen</a>";
                            } elseif($status == 'Telah Didistribusi') {
                              echo "Terdistribusi";
                              echo " | <a href='#' class='open_modal_distribusi btn btn-success' data-dismiss='modal' id='$row_dokumen->id'><span class='glyphicon glyphicon-list'></span> Distribusi Dokumen</a>";
                            } elseif($status == 'Terkendali') {
                              echo "Terkendali";
                              echo " | <a href='files/uploads/terkendali/$row_dokumen->file' class='btn btn-success' target='_blank'><span class='glyphicon glyphicon-file'></span> Lihat Dokumen</a>";
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

<!-- Modal Popup untuk Detail--> 
<div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk Tracking--> 
<div id="ModalTracking" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk Distribusi--> 
<div id="ModalDistribusi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk Search--> 
<div id="ModalSearch" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Javascript untuk popup modal Details--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal_details").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "modal_detail_dokumen.php",
             type: "GET",
             data : {id: m,},
             success: function (ajaxData){
               $("#ModalDetail").html(ajaxData);
               $("#ModalDetail").modal('show',{backdrop: 'true'});
             }
           });
        });
      });
</script>

<!-- Javascript untuk popup modal Tracking--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal_tracking").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "modal_tracking.php",
             type: "GET",
             data : {id: m,},
             success: function (ajaxData){
               $("#ModalTracking").html(ajaxData);
               $("#ModalTracking").modal('show',{backdrop: 'true'});
             }
           });
        });
      });
</script>

<!-- Javascript untuk popup modal Distribusi--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal_distribusi").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "modal_distribusi.php",
             type: "GET",
             data : {id: m,},
             success: function (ajaxData){
               $("#ModalDistribusi").html(ajaxData);
               $("#ModalDistribusi").modal('show',{backdrop: 'true'});
             }
           });
        });
      });
</script>

<?php
	$connect->close();
  exit();
?>