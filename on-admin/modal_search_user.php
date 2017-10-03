<?php
  
  session_start();
  include "../koneksi.php";
	$keyword = $_GET['keyword'];

  $search = explode(' ', $keyword);
  $sql = "SELECT * FROM tbl_user WHERE ( ";

  $parts = array();
  $kata = array();

  foreach($search as $search_word) {
    $parts[] = 'nama LIKE "%'.$search_word.'%"';
    $parts[] = 'username LIKE "%'.$search_word.'%"';
    $parts[] = 'jabatan LIKE "%'.$search_word.'%"';
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
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
                </thead>
                <?php 
                  $result_user = mysqli_query($connect, $sql);
                  $no = 0;
                  
                  if ($result_user) {
                    if ($result_user->num_rows > 0) {
                      while ($row_user = $result_user->fetch_object()) {
                        $no++;
                        echo "<tr class='text-center'>";
                          echo "<td>$no.</td>";
                          echo "<td class='text-left'>";
                            echo nl2br(str_replace($keyword, "<b>".$keyword."</b>", $row_user->nama));
                          echo "</td>";
                          echo "<td class='text-left'>$row_user->username</td>";
                          echo "<td class='text-left'>";
                            $result_org = mysqli_query($connect,"SELECT * FROM tbl_organisasi WHERE kode_org='$row_user->kode_org'");
                            if($result_org) {
                              if($result_org->num_rows > 0) {
                                $row_org = $result_org->fetch_object();
                                echo $row_user->jabatan." ".$row_org->nama_org;
                              }
                            }
                          echo "</td>";
                          echo "<td>";
                            echo "<a href='#' class='open_modal_detail btn btn-success glyphicon glyphicon-option-horizontal' data-dismiss='modal' title='Details' id='$row_user->id' data-toggle='modal'></a> ";
                            echo "<a href='#' class='open_modal_edit btn btn-success glyphicon glyphicon-pencil' title='Edit' id='$row_user->id' data-dismiss='modal' aria-hidden='true'></a> ";
                            echo "<a href='#' onclick=\"confirm_modal('proses_delete_user.php?&id=$row_user->id');\" class='btn btn-danger glyphicon glyphicon-trash' title='Delete'></a>";
                          echo "</td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr>";
                        echo "<td class='text-center' colspan='5'>Data Tidak Ditemukan</td>";
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

<!-- Modal Popup untuk Details--> 
<div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="ModalDelete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Anda Yakin Ingin Menghapus User Ini?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link"><span class="glyphicon glyphicon-ok"></span> Ya</a>
        <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Tidak</button>
      </div>
    </div>
  </div>
</div>

<!-- Javascript untuk popup modal Detail--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal_detail").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "modal_detail_user.php",
             type: "GET",
             data : {id_user: m,},
             success: function (ajaxData){
               $("#ModalDetail").html(ajaxData);
               $("#ModalDetail").modal('show',{backdrop: 'true'});
             }
           });
        });
      });
</script>

<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal_edit").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "modal_edit_user.php",
             type: "GET",
             data : {id_user: m,},
             success: function (ajaxData){
               $("#ModalEdit").html(ajaxData);
               $("#ModalEdit").modal('show',{backdrop: 'true'});
             }
           });
        });
      });
</script>

<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#ModalDelete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<?php
	$connect->close();
  exit();
?>