<?php
$tanggal = date("Y-m-d");

$format2 = $_SESSION["ses_id"];
//kode

$carikode = mysqli_query($koneksi,"SELECT id_tugas FROM tugas order by id_tugas desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_tugas'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
$format = "T"."00".$tambah;
 	}elseif (strlen($tambah) == 2){
 	$format = "B"."0".$tambah;
			}elseif (strlen($tambah) == 3)
			$format = "B".$tambah			
?>

<section class="content-header">
	<h1>
	<a href="page.php">
			<i class="fa fa-home"></i>
		</a>
		Master Data
		<small>Data Buku</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Perpustakaan Digital</b>
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
					<h3 class="box-title">Tambah Buku</h3>
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
							<label>ID Tugas</label>
							<input type="text" name="id_tugas" id="id_tugas" class="form-control" value="<?php echo $format; ?>"
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
							<label for="exampleInputFile">Upload Tugas</label>
							<input type="file" name="file_tugas" id="file_tugas">
							<p class="help-block">
								<font color="red">Format file .Pdf"</p>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
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

    if (isset ($_POST['Simpan'])){
		
		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tugas (id_tugas,id_anggota,judul,tgl,file_tugas) VALUES (
           '".$_POST['id_tugas']."',
          '".$_POST['id_anggota']."',
		  '".$_POST['judul']."',
		  '".$tanggal."',
          '".$nama_file."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'page.php?page=MyApp/data_tugas';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'page.php?page=MyApp/add_tugas';
          }
	  })</script>";
		}
		}elseif(empty($sumber)){
		echo "<script>
		Swal.fire({title: 'Gagal, File Buku Kosong',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'page.php?page=MyApp/add_tugas';
			}
		})</script>";}}

