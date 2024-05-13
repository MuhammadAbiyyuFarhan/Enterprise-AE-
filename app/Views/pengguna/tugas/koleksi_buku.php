<section class="content-header">
	<h1>
	<a href="page.php">
			<i class="fa fa-home"></i>
		</a>
		Koleksi Buku
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="page.php">
				<i class="fa fa-home"></i>
				<b>Perpustakaan Digital</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="page.php" class="btn btn-primary">
				<i class="fa fa-home"></i>
			</a>
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
							<th>Id Buku</th>
							<th>Judul Buku</th>
							<th>Penerbit</th>
							<th>Read</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_buku");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_buku']; ?>
							</td>
							<td>
								<?php echo $data['judul_buku']; ?>
							</td>
							<td>
								<?php echo $data['penerbit']; ?>
							</td>

							<td>
								<a href="?page=reading&kode=<?php echo $data['id_buku']; ?>" title="File PDF"
								 class="btn btn-danger">
									<i class="fa fa-file"></i> Pdf
								</a>

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