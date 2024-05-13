
<section class="content-header">
	<h1>
	<a href="page.php">
			<i class="fa fa-home"></i>
		</a>
		Kelola Tugas
		<small>Data Tugas</small>
	</h1>
	<ol class="breadcrumb">
		<li>
		
				<b>Modul Praktikum Aplikasi Komputasi Awan</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_tugas" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i>Kumpulkan Tugas</a>
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
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
						<th>No</th>
							<th>ID Tugas</th>
							<th>NIM</th>
							<th>Judul Tugas</th>
							<th>Tgl Upload</th>
							<th>Nama File</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tugas WHERE id_anggota= '". $_SESSION["ses_id"]."' ");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_tugas']; ?>
							</td>
							<td>
								<?php echo $data['id_anggota']; ?>
							</td>
							<td>
								<?php echo $data['judul']; ?>
							</td>
							<td>
								<?php echo $data['tgl']; ?>
							</td>
							<td>
								<?php echo $data['file_tugas']; ?>
							</td>

							<td>
								<a href="?page=reading&kode=<?php echo $data['id_tugas']; ?>" title="File PDF"
								 class="btn btn-primary">
									<i class="fa fa-book"></i>
								</a>

								<a href="?page=MyApp/edit_tugas&kode=<?php echo $data['id_tugas']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=MyApp/del_tugas&kode=<?php echo $data['id_tugas']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i>
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>