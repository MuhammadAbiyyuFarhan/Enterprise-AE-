<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM worker WHERE worker_id='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Edit Worker
		<small>Data Worker</small>
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
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Worker</h3>
					
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">


						<input type='hidden' class="form-control" name="worker_id" value="<?php echo $data_cek['worker_id']; ?>"/>

						<div class="form-group">
							<label>Nama</label>
							<input type='text' class="form-control" name="nama" value="<?php echo $data_cek['nama']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>Salary</label>
							<input type='text' class="form-control" name="salary" value="<?php echo $data_cek['salary']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>Jumlah Project</label>
							<input type="text" class="form-control" name="jumlah_project"   value="<?php echo $data_cek['jumlah_project'];  ?>" readonly> 
						</div>


					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_worker" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE worker SET
		nama='".$_POST['nama']."',
		salary='".$_POST['salary']."',
		jumlah_project='".$_POST['jumlah_project']."'
        WHERE worker_id='".$_POST['worker_id']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Admin Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_worker';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Admin Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_worker';
            }
        })</script>";
    }
}

