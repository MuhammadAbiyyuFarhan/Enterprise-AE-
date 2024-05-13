
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
							<input type="text" name="produk" id="produk" class="form-control" placeholder="Produk" required>
						</div>

						<div class="form-group">
							<label>PIC</label>
							<input type="text" name="pic" id="pic" class="form-control" placeholder="PIC" required>
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
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
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
	