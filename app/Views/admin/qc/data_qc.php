
<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Kelola Data Quality Control
		<small>Data Quality Control</small>
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
				<a href="?page=MyApp/add_qc" title="Tambah Data" class="btn btn-primary">
					<i class="glyphicon glyphicon-plus"></i> Tambah QC</a>
				
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
							<th>Status</th>
							<th>Tanggal</th>
							<th>Hasil</th>								
						</tr>
					</thead>
					<tbody>

					<?php $no = 1; ?>
					<?php foreach ($qcs as $qc) : ?>
						<tr>
							<td>
								<?php echo $no++; ?>
							</td>

							<td>
								<?php echo $qc->product_id; ?>
							</td>
							<td>
								<?php echo $qc->product_id; ?>
							</td>
							<td>
								<?php echo $qc->worker_id; ?>
							</td>
							<td>
								<?php echo $qc->status; ?>
							</td>
							<td>
								<?php echo $qc->tgl; ?>
							</td>
							<td>
								<?php echo $qc->hasil; ?>
							</td>

							<td>
								<a href="?page=MyApp/more_qc&kode=<?php echo $qc->qc_id; ?>" title="Info"
								 class="btn btn-info">
									<i class="glyphicon glyphicon-info-sign"></i>

								<a href="?page=MyApp/edit_qc&kode=<?php echo $qc->qc_id; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								
								<a href="?page=MyApp/del_qc&kode=<?php echo $qc->qc_id; ?>" onclick="return confirm('Yakin Hapus QC Ini ?')"
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