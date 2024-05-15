
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
					<h3 class="box-title">Tambah SPK</h3>
					
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>Pemesan</label>
							<input type="text" name="pemesan" id="pemesan" class="form-control"  placeholder="Pemesan" required>
						</div>

						<div class="form-group">
							<label>No Order</label>
							<input type="text" name="no_order" id="no_order" class="form-control" placeholder="No Order" required>
						</div>

						<div class="form-group">
							<label>Produk</label>
							<select name="produk" id="produk" class="form-control" required>
								<option value="">Pilih Produk</option>
								<?php
								// Koneksi ke database
								$koneksi = mysqli_connect("localhost", "root", "", "swiss_collection");

								// Periksa koneksi
								if (mysqli_connect_errno()) {
									echo "Koneksi database gagal: " . mysqli_connect_error();
									exit();
								}

								// Query untuk mengambil data produk dari tabel 'product'
								$query_product = "SELECT product_name FROM product";
								$result_product = mysqli_query($koneksi, $query_product);

								// Periksa apakah query berhasil dijalankan
								if ($result_product) {
									// Tampilkan nama-nama produk sebagai opsi dalam dropdown list
									while ($row_product = mysqli_fetch_assoc($result_product)) {
										echo "<option value='" . $row_product['product_name'] . "'>" . $row_product['product_name'] . "</option>";
									}
								} else {
									echo "Query gagal: " . mysqli_error($koneksi);
								}

								// Tutup koneksi database
								mysqli_close($koneksi);
								?>
							</select>
						</div>


						<div class="form-group">
									<label>PIC</label>
									<select name="pic" id="pic" class="form-control" required>
										<option value="">Pilih PIC</option>
										<?php
										$koneksi = mysqli_connect("localhost","root","","swiss_collection");
										if (mysqli_connect_errno()) {
											echo "Koneksi database gagal: " . mysqli_connect_error();
											exit();
										}
										$query_worker = "SELECT nama FROM worker";
										$result_worker = mysqli_query($koneksi, $query_worker);
										if ($result_worker) {
											while ($row_worker = mysqli_fetch_assoc($result_worker)) {
												echo "<option value='" . $row_worker['nama'] . "'>" . $row_worker['nama'] . "</option>";
											}
										} else {
											echo "Query gagal: " . mysqli_error($koneksi);
										}

										// Tutup koneksi database
										mysqli_close($koneksi);
										?>
									</select>
								</div>


						<div class="form-group">
							<label>Deadline</label>
							<input type="date" name="deadline" id="deadline" class="form-control"  required>
						</div>

						<div class="form-group">
							<label>Status</label>
							<select type="text" name="status" id="status" class="form-control">
								<option value="On-progres">On-progres</option>
								<option value="Cancel">Cancel</option>
								<option value="Hold">Hold</option>
								<option value="Done">Done</option>
  							</select>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_project" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php
    if (isset ($_POST['Simpan'])){
		
        $sql_simpan = "INSERT INTO project (project_id,pemesan,no_order,product_id,worker_id,deadline,status) VALUES (
          '',
		  '".$_POST['pemesan']."',
		  '".$_POST['no_order']."',
		  '".$_POST['produk']."',
		  '".$_POST['pic']."',
		  '".$_POST['deadline']."',
		  '".$_POST['status']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',iDcon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
			  window.location = 'index.php?page=MyApp/data_project';
			  }
			})</script>";
			}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
			  window.location = 'index.php?page=MyApp/add_project';
			  }
			})</script>";
		  }
		   //selesai proses simpan data
	  }  
	