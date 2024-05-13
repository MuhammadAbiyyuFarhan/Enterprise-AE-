<?php
$format2 = $_SESSION["ses_id"];
$tanggal = date("Y-m-d");


    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tugas WHERE id_tugas='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
	<h1>
	<a href="page.php">
			<i class="fa fa-home"></i>
		</a>
		Edit Tugas
		<small>Data Tugas</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Modul Praktikum Aplikasi Komputasi Awan</b>
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
					<h3 class="box-title">Ubah Tugas</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label>Id Tugas</label>
							<input type='text' class="form-control" name="id_tugas" value="<?php echo $data_cek['id_tugas']; ?>"
							 readonly/>
						</div>

						<div class="form-group">
							<label>NIM</label>
							<input type="text" name="id_anggota" id="id_anggota" class="form-control" value="<?php echo $format2; ?>"
							 readonly/>
						</div>

						<div class="form-group">
							<label>Judul Tugas</label>
							<input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Tugas">
						</div>

						<div class="form-group">
							<label>File Tugas Lama</label>
							<input class="form-control" value="<?php echo $data_cek['file_tugas']; ?>" readonly/>
						</div>

						<div class="form-group">
							<label for="exampleInputFile">Upload Tugas Baru</label>
							<input type="file" name="file_tugas" id="file_tugas">
							<p class="help-block">
								<font color="red">Format file .Pdf"</p>
						</div>


					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_tugas" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

$sumber = @$_FILES['file_tugas']['tmp_name'];
$target = 'pdf/';
$nama_file = @$_FILES['file_tugas']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $pdf= $data_cek['file_tugass'];
            if (file_exists("pdf/$pdf")){
			unlink("pdf/$pdf");}

		$sql_ubah = "UPDATE tugas SET
			judul='".$_POST['judul']."',
			tgl='".$tanggal."',
			file_tugas='".$nama_file."'
			WHERE id_tugas='".$_POST['id_tugas']."'";
   		$query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tugas SET
			judul='".$_POST['judul']."',
			tgl='".$tanggal."'
			WHERE id_tugas='".$_POST['id_tugas']."'";
	   $query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'page.php?page=MyApp/data_tugas';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'page.php?page=MyApp/data_tugas';
            }
        })</script>";
    }
}

