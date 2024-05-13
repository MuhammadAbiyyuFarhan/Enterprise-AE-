<?php
$format = '0';
?>
<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Tambah Worker
		<small>Data Worker </small>
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
					<h3 class="box-title">Tambah Admin</h3>
					
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
						</div>

						<div class="form-group">
							<label>Salary</label>
							<input type="text" name="salary" id="salary" class="form-control" placeholder="Salary" required>
						</div>
  
						<div class="form-group">
							<label>Jumlah Project</label>
							<input type="text" name="jumlah_project" id="jumlah_project" class="form-control" value="<?php echo $format; ?>" readonly> 
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_worker" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

    if (isset ($_POST['Simpan'])){
    
        $sql_simpan = "INSERT INTO worker (worker_id,nama,salary,jumlah_project) VALUES (
        	'',
          '".$_POST['nama']."',
		  '".$_POST['salary']."',
          '".$_POST['jumlah_project']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Worker Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_worker';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Worker Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_worker';
          }
      })</script>";
    }
  }
    
