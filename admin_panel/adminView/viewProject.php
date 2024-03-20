<div>
  <h3>LIST PROJECT</h3>
  <button class="btn btn-primary info-button btn-img" data-toggle="modal" data-target="#myModal" title="Add" style="margin-top: 20px; background-color: transparent; border: none;">
  <img src=".\assets\images\add.png" alt="Add" width="100" height="40">
</button>

<div style="overflow-y: auto; max-height: 800px; margin-top: 30px;">
<table class="table">
<tbody style="overflow-y: auto; max-height: 400px;">
  <!-- Data tabel yang sebenarnya -->
  <style>
        .status-button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            align-items: center; /* Tengah secara vertikal */
            justify-content: center; /* Tengah secara horizontal */
        }

        .cancel, .delay, .hold, .on-progress, .finished {
            text-align: center; /* Tengah secara horizontal */
            vertical-align: middle; /* Tengah secara vertikal */
        }

        .cancel {
            background-color: gray;
            color: white;
        }

        .delay {
            background-color: red;
            color: white;
        }

        .hold {
            background-color: orangered;
            color: black;
        }

        .on-progress {
            background-color: yellow;
            color: black;
        }

        .finished {
            background-color: green;
            color: white;
        }
    </style>
    <thead style="padding-top: 10000px;">
    <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Pemesan</th>
        <th class="text-center">No Order</th>
        <th class="text-center">Produk</th>
        <th class="text-center">PIC</th>
        <th class="text-center">Deadline</th>
        <th class="text-center">Status</th>
        <th class="text-center">Aksi</th>
    </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from project";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["pemesan"]?></td>
      <td><?=$row["No Order"]?></td>
      <td><?=$row["Produk"]?></td>
      <td><?=$row["PIC"]?></td>      
      <td><?=$row["Deadline"]?></td>
      <?php 
        $status = $row['Status'];
        $status_text = "";
        $status_class = "";

        switch ($status) {
            case 0:
                $status_text = "Cancelled";
                $status_class = "cancel";
                break;
            case 1:
                $status_text = "Delay";
                $status_class = "delay";
                break;
            case 2:
                $status_text = "Hold";
                $status_class = "hold";
                break;
            case 3:
                $status_text = "On-progress";
                $status_class = "on-progress";
                break;
            case 4:
                $status_text = "Finished";
                $status_class = "finished";
                break;
            default:
                $status_text = "Unknown";
                break;
      }
      ?>
<td class="text-center"><button class="status-button <?php echo $status_class; ?>"><?php echo $status_text; ?></button></td>

<style>
  /* Menghilangkan border saat tombol ditekan */
  .btn-img {
    padding: 0; /* Menghapus padding */
    border: none; /* Menghapus border */
    background: transparent; /* Menghapus background */
    cursor: pointer; /* Mengubah kursor menjadi tanda tangan saat diarahkan ke tombol */
    outline: none; /* Menghapus outline saat tombol mendapat fokus */
  }

  /* Menghilangkan efek hover pada background */
  .btn-img:hover {
    background: none; /* Menghapus latar belakang saat tombol dihover */
  }

  /* Menghilangkan outline saat tombol ditekan */
  .btn-img:focus {
    outline: none;
    border: none;
    }
  .btn-img:active {
    outline: none;
    background: transparent; /* Menghapus latar belakang saat tombol ditekan */
    box-shadow: none; /* Menghapus shadow saat tombol ditekan */
    border: none; /* Menghapus border saat tombol ditekan */
  }
</style>

<td>
  <!-- Tombol Info -->
  <button class="btn btn-primary info-button btn-img" title="Info Project">
    <img src="./assets/images/info.png" alt="Info" width="30" height="30">
  </button>

  <!-- Tombol Edit -->
  <button class="btn btn-primary edit-button btn-img" data-toggle="modal" data-target="#editModal<?=$row['project_id']?>" title="Edit Project">
    <img src="./assets/images/edit.png" alt="Edit" width="30" height="30">
  </button>
  
  <!-- Tombol Delete -->
  <button class="btn btn-danger btn-img" style="height:40px;" onclick="categoryDelete('<?=$row['project_id']?>')" title="Delete Project">
    <img src="./assets/images/bin.png" alt="Delete" width="30" height="30">
  </button>
</td>
      </tr>
      
<!-- Edit Modal -->
<div class="modal fade" id="editModal<?=$row['project_id']?>" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Project</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype='multipart/form-data'action="./controller/updateCatController.php" method="POST">
                    <!-- Input fields with current project data -->
                    <input type="hidden" name="project_id" value="<?=$row['project_id']?>">
                    <div class="form-group">
                        <label for="pemesan">Pemesan:</label>
                        <input type="text" class="form-control" id="pemesan_<?=$row['project_id']?>" name="pemesan" value="<?=$row['pemesan']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="No_Order">No Order:</label>
                        <input type="text" class="form-control" id="No_Order_<?=$row['project_id']?>" name="No_Order" value="<?=$row['No Order']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="Produk">Produk:</label>
                        <input type="text" class="form-control" id="Produk_<?=$row['project_id']?>" name="Produk" value="<?=$row['Produk']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="PIC">PIC:</label>
                        <input type="text" class="form-control" id="PIC_<?=$row['project_id']?>" name="PIC" value="<?=$row['PIC']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="Deadline">Deadline:</label>
                        <input type="text" class="form-control datetimepicker" id="Deadline_<?=$row['project_id']?>" name="Deadline" value="<?=$row['Deadline']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="Status">Status:</label>
                        <select class="form-control" id="Status_<?=$row['project_id']?>" name="Status" required>
                            <option value="">Pilih Status</option>
                            <option value="0" <?=($row['Status'] == 0) ? 'selected' : ''?>>Cancel</option>
                            <option value="1" <?=($row['Status'] == 1) ? 'selected' : ''?>>Delay</option>
                            <option value="2" <?=($row['Status'] == 2) ? 'selected' : ''?>>Hold</option>
                            <option value="3" <?=($row['Status'] == 3) ? 'selected' : ''?>>On-progress</option>
                            <option value="4" <?=($row['Status'] == 4) ? 'selected' : ''?>>Finished</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="update-project-btn" data-project-id="<?=$row['project_id']?>"  name="tes" style="height:40px">Update Project</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
            </div>
        </div>
    </div>
</div>

    <?php
            $count=$count+1;
          }
        }
      ?>
</tbody>
  </table>
</div>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <!-- Add Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add a New Project</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form  enctype='multipart/form-data' action="./controller/addCatController.php" method="POST">
                    <div class="form-group">
                        <label for="Pemesanan">Pemesan:</label>
                        <input type="text" class="form-control" name="pemesan" required>
                    </div>
                    <div class="form-group">
                        <label for="No_Order">No Order:</label>
                        <input type="text" class="form-control" name="No_Order" required>
                    </div>
                    <div class="form-group">
                        <label for="Produk">Produk:</label>
                        <input type="text" class="form-control" name="Produk" required>
                    </div>
                    <div class="form-group">
                        <label for="PIC">PIC:</label>
                        <input type="text" class="form-control" name="PIC" required>
                    </div>
                    <div class="form-group">
                        <label for="Deadline">Deadline:</label>
                        <input type="text" class="form-control datetimepicker" name="Deadline" required>
                    </div>
                    <div class="form-group">
                        <label for="Status">Status:</label>
                        <select class="form-control" name="Status" required>
                            <option value="">Pilih Status</option>
                            <option value="0">Cancel</option>
                            <option value="1">Delay</option>
                            <option value="2">Hold</option>
                            <option value="3">On-progress</option>
                            <option value="4">Finished</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Project</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // Ketika tombol "Update Project" di klik
        $(document).on('click', '.update-project-btn', function(){
            // Ambil nilai input dari form modal
            dd = false;
            var projectId = $(this).data('project_id');
            var pemesan = $('#pemesan_'+ projectId).val();
            var noOrder = $('#No_Order_'+ projectId).val();
            var produk = $('#Produk_'+ projectId).val();
            var pic = $('#PIC_'+ projectId).val();
            var deadline = $('#Deadline_'+ projectId).val();
            var status = $('#Status_'+ projectId).val();

            // Kirim data ke server menggunakan AJAX
            $.ajax({
                url: './controller/updateCatController.php', // Ganti URL sesuai dengan URL yang benar
                type: 'POST',
                data:{
                    project_id: projectId,
                    pemesan: pemesan,
                    No_Order: noOrder,
                    Produk: produk,
                    PIC: pic,
                    Deadline: deadline,
                    Status: status,
                    dd: true
                },
                success: function(data) {
                    // Tampilkan pesan sukses atau lakukan sesuatu setelah berhasil memperbarui
                    alert('Data Berhasil Diedit');
                    $('form').trigger('reset');
                    location.reload(); // Memuat ulang halaman setelah penghapusan berhasil
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika ada
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat memperbarui project.');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(".datetimepicker").datepicker({
            dateFormat: 'yy-mm-dd' // Format tanggal yang diinginkan (yyyy-mm-dd)
        });
    });
</script>
</div>