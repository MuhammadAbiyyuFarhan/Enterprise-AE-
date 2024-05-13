<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tugas WHERE id_tugas='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

    }
?>

<section class="content-header">
    <h1>
	Lihat Tugas
	</h1>
	<ol class="breadcrumb">
		<li>
		<a href="page.php">
			<i class="fa fa-home"></i>
		</a>
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
					<h3 class="box-title">
						Tugas :
						<?php echo $data_cek['judul'];?>
					</h3>
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

				<div class="box-body">

					<object type="application/pdf" data="pdf/<?php echo $data_cek['file_tugas'];?>#toolbar=0&navpanes=0&scrollbar=0"
					 width="100%" height="500px">
					</object>

				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<b>Modul Praktikum Aplikasi Komputasi Awan</b>
				</div>
			</div>
			<!-- /.box -->
</section>