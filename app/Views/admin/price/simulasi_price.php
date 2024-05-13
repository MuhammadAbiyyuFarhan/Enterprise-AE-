<?php
$format = '0';
?>
<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Simulasi Harga
		<small>Detail Harga </small>
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

				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label>Nama Produk</label>
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
						</div>
  
						<div class="form-group">
							<label>Jumlah</label>
							<input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" required>
						</div>

						<div class="form-group">
							<label>PIC</label>
							<input type="text" name="pic" id="pic" class="form-control" placeholder="PIC" required>
						</div>

						<div class="form-group">
							<label>Durasi Pengerjaan</label>
							<input type="text" name="time" id="time" class="form-control" placeholder="Durasi Pengerjaan" required>
						</div>

						<div class="form-group">
							<label>Pajak</label>
							<input type="text" name="pajak" id="pajak" class="form-control" value="11%" readonly>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="simulate" value="simulasi" class="btn btn-info">
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
    
