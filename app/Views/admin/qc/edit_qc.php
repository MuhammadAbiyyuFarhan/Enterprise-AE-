<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM qc WHERE qc_id='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Edit QC
		<small>Data QC</small>
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
					<h3 class="box-title">Ubah Data QC</h3>

				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<input type='hidden' class="form-control" name="qc_id" value="<?php echo $data_cek['qc_id']; ?>">

						<div class="form-group">
							<label>Produk</label>
							<input type="text" name="product_id" id="product_id" class="form-control"  value="<?php echo $data_cek['qc_id']; ?>">
						</div>

						<div class="form-group">
							<label>PIC</label>
							<input type="text" name="worker_id" id="worker_id" class="form-control" value="<?php echo $data_cek['product_id']; ?>">
						</div>

						<div class="form-group">
							<label>Status</label>
							<select type="text" name="status" id="status" class="form-control" value="<?php echo $data_cek['status']; ?>">
								<option value="On-progres">On-progres</option>
								<option value="Cancel">Cancel</option>
								<option value="Hold">Hold</option>
								<option value="Done">Done</option>
  							</select>
						</div>

						<div class="form-group">
							<label>Tanggal</label>
							<input type="date" name="tgl" id="tgl" class="form-control"  value="<?php echo $data_cek['tgl']; ?>">
						</div>

						<div class="form-group">
							<label>Hasil</label>
							<select type="text" name="hasil" id="hasil" class="form-control" value="<?php echo $data_cek['hasil']; ?>">
								<option value="good">Good</option>
								<option value="notgood">Not Good</option>
  							</select>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_qc" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    // ubah db
    $sql_ubah = "UPDATE qc SET
		product_id='".$_POST['product_id']."',
		worker_id='".$_POST['worker_id']."',
		status='".$_POST['status']."',
		tgl='".$_POST['tgl']."',
		hasil='".$_POST['hasil']."'
        WHERE qc_id='".$_POST['qc_id']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data QC Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_qc';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data QC Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_qc';
            }
        })</script>";
    }
}

