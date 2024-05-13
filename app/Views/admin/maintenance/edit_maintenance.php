<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM maintenance WHERE maintenance_id='".$_GET['kode']."'";
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
		<small>Data Maintenance</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Enterprise PPC Automation Engineering</b>
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
					<h3 class="box-title">Ubah Data Maintenance</h3>

				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<input type='hidden' class="form-control" name="maintenance_id" value="<?php echo $data_cek['maintenance_id']; ?>"/>

						<div class="box-body">
						<div class="form-group">
							<label>Produk</label>
							<input type="text" name="product_id" id="product_id" class="form-control"  value="<?php echo $data_cek['product_id']; ?>">
						</div>

						<div class="form-group">
							<label>No Order</label>
							<input type="text" name="no_order" id="no_order" class="form-control" value="<?php echo $data_cek['product_id']; ?>">
						</div>

						<div class="form-group">
							<label>PIC</label>
							<input type="text" name="worker_id" id="worker_id" class="form-control" value="<?php echo $data_cek['worker_id']; ?>">
						</div>
						<div class="form-group" aria-required>
							<label>Status</label>
							<select type="text" name="status" id="status" class="form-control" value="<?php echo $data_cek['status']; ?>">
								<option value="Repairing">Repairing</option>
								<option value="Good">Good</option>
								<option value="Cancel">Cancel</option>
  							</select>
						</div>
						<div class="form-group">
							<label>Tanggal Masuk</label>
							<input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control"  value="<?php echo $data_cek['tgl_masuk']; ?>">
						</div>
						<div class="form-group">
							<label>Waktu</label>
							<input type="text" name="waktu" id="waktu" class="form-control" value="<?php echo $data_cek['waktu']; ?>" >
						</div>
					</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_maintenance" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE maintenance SET
		product_id='".$_POST['product_id']."',
		worker_id='".$_POST['worker_id']."',
		tgl_masuk='".$_POST['tgl_masuk']."',
		status='".$_POST['status']."',
		waktu='".$_POST['waktu']."'
        WHERE maintenance_id='".$_POST['maintenance_id']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Maintenance Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_maintenance';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Maintenance Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_maintenance';
            }
        })</script>";
    }
}

