
<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Kelola Project
		<small>Data Project</small>
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
				<a href="?page=MyApp/add_project" title="Tambah Data" class="btn btn-primary">
					<i class="glyphicon glyphicon-plus"></i> Tambah SPK</a>
				
			</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Pemesan</th>
							<th>No Order</th>
							<th>Produk</th>
							<th>PIC</th>
							<th>Deadline</th>
							<th>Status</th>								
						</tr>
					</thead>
					
					<tbody>
					<?php $no = 1; ?>
					<?php foreach ($projects as $project) : ?>
						<tr>
							<td>
								<?= $no++; ?>
							</td>

							<td>
								<?= $project->pemesan; ?>
							</td>
							<td>
								<?= $project->no_order; ?>
							</td>
							<td>
								<?= $project->product_id; ?>
							</td>
							<td>
								<?= $project->worker_id; ?>
							</td>
							<td>
								<?= $project->deadline; ?>
							</td>
							<td>
								<?= $project->status; ?>
							</td>

							<td>
								<a href="?page=MyApp/more_project&kode=<?= $project->project_id; ?>" title="Info"
								 class="btn btn-info">
									<i class="glyphicon glyphicon-info-sign"></i>
								
								<a href="?page=MyApp/edit_project&kode=<?= $project->project_id; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								
								<a href="?page=MyApp/del_project&kode=<?= $project->project_id; ?>" onclick="return confirm('Yakin Hapus Project Ini ?')"
								 title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i>
							</td>
						</tr>
					<?php $no++; ?>
					<?php endforeach ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>