<div >
  <h2>All Users</h2>
  <!-- Tombol untuk membuka modal -->
  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addUserModal" style="height: 40px;">Add User</button>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Username </th>
        <th class="text-center">Password</th>
        <th class="text-center">Role</th>
        <th class="text-center">Actions</th> <!-- Kolom baru untuk aksi -->
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from users where username=0";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["username"]?> 
      <td><?=$row["password"]?></td>
      <td><?=$row["role"]?></td>
      <td>
      <form method="POST" action="./controller/deleteUsersController.php">
        <input type="hidden" name="user_id" value="<?=$row["user_id"]?>"> <!-- Hidden input untuk menyimpan ID pengguna -->
        <button type="submit" class="btn btn-danger btn-sm">Delete</button> <!-- Tombol hapus -->
      </form>
      </td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
    
  </table>
  <!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulir untuk menambahkan pengguna -->
        <form enctype='multipart/form-data' action="./controller/process_add_user.php" method="POST">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" id="role" class="form-control" required>
              <option value="Admin">Admin</option>
              <option value="SuperAdmin">Super Admin</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </div>
      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <p id="modal-message"></p>
        </div>
      </div>
    </div>
  </div>
</div>
