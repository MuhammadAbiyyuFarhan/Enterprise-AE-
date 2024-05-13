
<section class="content-header">
	<h1>
		Master Data
		<small>Enterprise PPC Automation Engineering</small>
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
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Maintenance</h3>
					
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>Produk</label>
							<input type="text" name="product_id" id="product_id" class="form-control"  placeholder="Produk" required>
						</div>

						<div class="form-group">
							<label>No Order</label>
							<input type="text" name="no_order" id="no_order" class="form-control" placeholder="No Order" required>
						</div>

						<div class="form-group">
							<label>PIC</label>
							<input type="text" name="pic" id="pic" class="form-control" placeholder="PIC" required>
						</div>
						<div class="form-group" aria-required>
							<label>Status</label>
							<select type="text" name="status" id="status" class="form-control">
								<option value="Repairing">Repairing</option>
								<option value="Good">Good</option>
								<option value="Cancel">Cancel</option>
  							</select>
						</div>
						<div class="form-group">
							<label>Tanggal Masuk</label>
							<input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control"  required>
						</div>
						<div class="form-group">
							<label>Waktu</label>
							<input type="text" name="waktu" id="waktu" class="form-control" placeholder="Waktu Pengerjaan" >
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_maintenance" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php
    if (isset ($_POST['Simpan'])){
		
        $sql_simpan = "INSERT INTO maintenance (maintenance_id,product_id,worker_id,status,tgl_masuk,waktu) VALUES (
          '',
		  '".$_POST['product_id']."',
		  '".$_POST['pic']."',
		  '".$_POST['status']."',
		  '".$_POST['tgl_masuk']."',
		  '".$_POST['waktu']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Tambah Data Maintenance Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
			  window.location = 'index.php?page=MyApp/data_maintenance';
			  }
			})</script>";
			}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data Maintenance Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
			  window.location = 'index.php?page=MyApp/add_maintenance';
			  }
			})</script>";
		  }
		   //selesai proses simpan data
	  }  
	