
<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Kelola Data Maintenance
		<small>Data Maintenance</small>
	</h1>
	<ol class="breadcrumb">
		<li>
				<b>Enterperise PPC Automation Engineering</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->

		<section class="content">
		<div class="box box-primary">
			<div class="box-header with-border">
				<a href="?page=MyApp/add_maintenance" title="Tambah Data" class="btn btn-primary">
					<i class="glyphicon glyphicon-plus"></i> Tambah Maintenance</a>
				
			</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Produk</th>
							<th>No Order</th>
							<th>PIC</th>
							<th>Kondisi</th>
							<th>Tanggal Mulai</th>
							<th>Waktu</th>								
						</tr>
					</thead>
					<tbody>

					<?php $no = 1; ?>
					<?php foreach ($maintenance as $mainten) : ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>

							<td>
								<?php echo $mainten->product_id; ?>
							</td>
							<td>
								<?php echo $mainten->product_id; ?>
							</td>
							<td>
								<?php echo $mainten->worker_id; ?>
							</td>
							<td>
								<?php echo $mainten->status; ?>
							</td>
							<td>
								<?php echo $mainten->tgl_masuk; ?>
							</td>
							<td>
								<?php echo $mainten->waktu; ?>
							</td>
		

							<td>
								<a href="?page=MyApp/more_maintenance&kode=<?php echo $mainten->maintenance_id; ?>" title="Info"
								 class="btn btn-info">
									<i class="glyphicon glyphicon-info-sign"></i>

								<a href="?page=MyApp/edit_maintenance&kode=<?php echo $mainten->maintenance_id; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								
								<a href="?page=MyApp/del_maintenance&kode=<?php echo $mainten->maintenance_id; ?>" onclick="return confirm('Yakin Hapus Data Maintenance Ini ?')"
								 title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i>
							</td>
						</tr>
					<?php $no++; ?>
					<?php endforeach; ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>