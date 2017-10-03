<?php

require '_header.php';
$id_user = $_SESSION['id'];
$nama_org = $_SESSION['nama_org'];
$eselon = $_SESSION['eselon'];

?>

<div class="container">
  <h2>Dokumen Terkendali</h2>
  <p><b>User Log :</b> <?php echo $_SESSION['nama']." (".$_SESSION['jabatan'].")" ?></p>
  <hr />

  <div class="form-group text-right">
    <form action="action" onsubmit="search(); return false;">
      <input class="form-control-sm" type="text" name="keyword" id="keyword" placeholder="Cari Data Disini" required />
      <button type="submit" class="btn btn-primary glyphicon glyphicon-search" title="Search Engine" style="margin-top: -5px;"></button>
    </form>
  </div>

<table id="mytable" class="table table-bordered">
    <thead>
      <th>No.</th>
      <th>No. Dokumen</th>
      <th>Judul</th>
      <th>Aksi</th>
    </thead>
<?php 
  //menampilkan data mysqli
  include "../koneksi.php";
  $no = 0;
  $result_org = mysqli_query($connect,"SELECT * FROM tbl_organisasi WHERE nama_org='$nama_org'");
  if($result_org) {
    $row_org = $result_org->fetch_object();
    $kode_org = $row_org->kode_org;
  }

  $result_dokumen = mysqli_query($connect,"SELECT * FROM tbl_rek_file_distribusi WHERE kode_org='$kode_org' AND file NOT IN ('')");

  if($result_dokumen) {
    if($result_dokumen->num_rows > 0) {
      while ($row_dokumen = $result_dokumen->fetch_object()) {
          $no++;
          $load_dokumen = mysqli_query($connect,"SELECT no_dokumen,judul_dokumen FROM tbl_dokumen WHERE id='$row_dokumen->id_dokumen' AND status='Telah Didistribusi'");
          if($load_dokumen) {
            if($load_dokumen->num_rows > 0) {
              while($row_load = $load_dokumen->fetch_object()) {
?>

                <tr>
                  <td><?php echo "$no."; ?></td>
                  <td><?php echo $row_load->no_dokumen; ?></td>
                  <td><?php echo $row_load->judul_dokumen; ?></td>
                  <td class="text-center">
                    <a href="#" class="open_modal_detail btn btn-success glyphicon glyphicon-option-horizontal" title="View Details" id="<?php echo $row_dokumen->id_dokumen; ?>"></a>
                    <?php
                      if($nama_org == "Unit Jaminan Mutu") {
                        echo "<a href='../files/uploads/terkendali/master/".$row_dokumen->file."' class='btn btn-success glyphicon glyphicon-file' title='View Document' target='_blank'></a>";
                      } else {
                        echo "<a href='../files/uploads/terkendali/copy/".$row_dokumen->file."' class='btn btn-success glyphicon glyphicon-file' title='View Document' target='_blank'></a>";
                      }
                    ?>
                  </td>
                </tr>
<?php
              }
            } else {
              echo "<tr>";
                echo "<td colspan='4' class='text-center'>Data Tidak Tersedia</td>";
              echo "</tr>";
              break;
            }
          }          
      }
    } else {
      echo "<tr>";
        echo "<td colspan='4' class='text-center'>Data Tidak Tersedia</td>";
      echo "</tr>";
    }
  }
?>

</table>
</div>

<!-- Modal Popup untuk Details--> 
<div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk Search--> 
<div id="ModalSearch" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Javascript untuk popup modal Details--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal_detail").click(function(e) {
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

<!-- Javascript untuk popup modal Search--> 
<script type="text/javascript">
   function search() {
    var keyword = document.getElementById("keyword").value;
    $.ajax({
      url: "modal_search_dokumen.php",
      type: "GET",
      data: {keyword: keyword,},
      success: function (ajaxData) {
        $("#ModalSearch").html(ajaxData);
        $("#ModalSearch").modal('show',{backdrop: 'true'});
      }
    });
   }
</script>

<?php

$connect->close();
require '_footer.php';

?>