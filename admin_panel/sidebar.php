<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
<img src="./assets/images/logo.png" width="80" height="80" alt="Swiss Collection" style="border-radius: 50%;">
    <?php
        // Check if the user is logged in
        if(isset($_SESSION['username'])) {
            // Display the logged-in user's name
            echo "<h5 style='margin-top:10px;'>Hello, {$_SESSION['username']}</h5>";         
        }          
        ?>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    
    <?php
    //Level user
    include_once "./config/dbconnect.php";
      // Ambil data dari database berdasarkan username sesi
      $username = $_SESSION['username'];
      $query = "SELECT role FROM users WHERE username = '$username'";
      $result = $conn->query($query);
  
      // Periksa apakah query berhasil dieksekusi
      if ($result) {
          // Ambil nilai role dari hasil query
          $row = $result->fetch_assoc();
          $role = $row['role'];
  
          // Periksa apakah role sama dengan "SuperAdmin"
          if ($role == "SuperAdmin") {
              echo '<a href="#users" onclick="showUsers()"><i class="fa fa-users"></i> Users</a>';
          }
      } else {
          // Penanganan kesalahan jika query tidak berhasil dieksekusi
          echo "Error: " . $conn->error;
      }
    ?>
    <a href="./index.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#project"   onclick="showProject()" ><i class="fa fa-th-large"></i> Project</a>
    <a href="#products"   onclick="showProductItems()" ><i class="fa fa-th"></i> Products</a>
    <a href="#worker"   onclick="showWorker()" ><i class="fa fa-th"></i> Worker</a>  
    <a href="#orders" onclick="showOrders()"><i class="fa fa-list"></i> Pricing</a>
    <a href="#qualitycontrol" onclick="showQualityControl()"><i class="fa fa-list"></i> Quality Control</a>
    <a href="#productsizes"   onclick="showProductSizes()" ><i class="fa fa-th-list"></i> Maintain</a>   
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>