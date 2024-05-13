<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM users WHERE id_user='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Edit Admin
		<small>Data Admin</small>
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
					<h3 class="box-title">Ubah Data Admin</h3>
					
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">


						<input type='hidden' class="form-control" name="id_user" value="<?php echo $data_cek['id_user']; ?>"/>

						<div class="form-group">
							<label>Username</label>
							<input type='text' class="form-control" name="username" value="<?php echo $data_cek['username']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type='text' class="form-control" name="password" value="<?php echo $data_cek['password']; ?>"
							/>
						</div>


					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_user" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE users SET
		username='".$_POST['username']."',
		password='".$_POST['password']."'
        WHERE id_user='".$_POST['id_user']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Admin Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_user';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Admin Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_user';
            }
        })</script>";
    }
}

