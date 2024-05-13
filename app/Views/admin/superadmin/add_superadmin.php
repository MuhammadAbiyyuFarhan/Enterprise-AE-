<?php
$format = 'SuperAdmin';
?>

<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Pengelola Sistem
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				
			</a>
		</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Super Admin</h3>
					
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password" required> 
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Role</label>
							<input type="level" name="role" id="role" class="form-control" value="<?php echo $format; ?>"
							 readonly/>
						</div>						
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_superadmin" title="Kembali" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php
    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO users (id_user,username,password,role) VALUES (
        '',
        '".$_POST['usernamesa']."',
        '".$_POST['passwordsa']."',
		'".$_POST['role']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
        window.location = 'index.php?page=MyApp/data_superadmin';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
        window.location = 'index.php?page=MyApp/add_superadmin';
        }
      })</script>";
    }
     //selesai proses simpan data
}