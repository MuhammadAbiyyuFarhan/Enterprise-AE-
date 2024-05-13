
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
					<h3 class="box-title">Tambah QC</h3>
					
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>Produk</label>
							<input type="text" name="produk" id="produk" class="form-control"  placeholder="Pemesan" required>
						</div>

						<div class="form-group">
							<label>No Order</label>
							<input type="text" name="no_order" id="no_order" class="form-control" placeholder="No Order" required>
						</div>

						<div class="form-group">
							<label>PIC</label>
							<input type="text" name="pic" id="pic" class="form-control" placeholder="PIC" required>
						</div>

						<div class="form-group">
							<label>Status</label>
							<select type="text" name="status" id="status" class="form-control">
								<option value="on-progres">On-progres</option>
								<option value="cancel">Cancel</option>
								<option value="hold">Hold</option>
								<option value="done">Done</option>
  							</select>
						</div>

						<div class="form-group">
							<label>Tanggal</label>
							<input type="date" name="tanggal" id="tanggal" class="form-control"  required>
						</div>

						<div class="form-group">
							<label>Hasil</label>
							<select type="text" name="hasil" id="hasil" class="form-control">
								<option value="good">Good</option>
								<option value="notgood">Not Good</option>
  							</select>
						</div>


					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_qc" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php
    if (isset ($_POST['Simpan'])){
		
        $sql_simpan = "INSERT INTO qc (product_id,worker_id,status,tgl,hasil) VALUES (
          '',
		  '".$_POST['produk']."',
		  '".$_POST['no_order']."',
		  '".$_POST['status']."',
		  '".$_POST['tanggal']."'
		  '".$_POST['hasil']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Tambah Data QC Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
			  window.location = 'index.php?page=MyApp/data_qc';
			  }
			})</script>";
			}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data QC Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
			  window.location = 'index.php?page=MyApp/add_qc';
			  }
			})</script>";
		  }
		   //selesai proses simpan data
	  }  
	