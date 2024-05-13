
<section class="content-header">
	<h1>
		Maintenance
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
					<h3 class="box-title">Tambah Maintenance</h3>
					
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>Pengujian</label>
							<input type="text" name="proses" id="proses" class="form-control"  placeholder="Pengujian" required>
						</div>

						<div class="form-group">
							<label>Uji</label>
							<input type="text" name="waktu" id="waktu" class="form-control" placeholder="Uji" required>
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
		
        $sql_simpan = "INSERT INTO proses_project_id (proses_project_id,proses,waktu) VALUES (
          '',
		  '".$_POST['proses']."',
		  '".$_POST['waktu']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
			  window.location = 'index.php?page=MyApp/more_qc';
			  }
			})</script>";
			}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
			  window.location = 'index.php?page=MyApp/add_proses_qc';
			  }
			})</script>";
		  }
		   //selesai proses simpan data
	  }  
	