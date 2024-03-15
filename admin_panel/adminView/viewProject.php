<div >
  <h3>Project</h3>
  <table class="table ">
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
    <thead>
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
                $status_text = "Cancel";
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

      <td><button class="btn btn-primary" >Edit</button><button class="btn btn-danger" style="height:40px" onclick="categoryDelete('<?=$row['project_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Project
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Project</h4>
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
              <input type="text" class="form-control" name="Deadline" required>
            </div>
            <div class="form-group">
              <label for="Status">Status:</label>
              <input type="text" class="form-control" name="Status" required>
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