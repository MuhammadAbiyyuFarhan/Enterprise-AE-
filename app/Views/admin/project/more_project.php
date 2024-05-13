

<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		No. Order

		<small>Detail Data Project</small>
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
			<!-- <div class="box-header with-border">
				<a href="?page=MyApp/add_proses_project" title="Tambah Data" class="btn btn-primary">
					<i class="glyphicon glyphicon-plus"></i> Tambah Proses</a>
				
			</div> -->
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>No. Project</th>
							<th>Nama Proses</th>
							<th>Waktu (Jam)</th>
							<th>Status</th>
							<th>Progres</th>
						</tr>
					</thead>
					<tbody>

					<?php $no = 1; ?>
					<?php foreach ($proses_projects as $proses_project) : ?>
					<tr>
						<td>
							<?= $no++; ?>
						</td>

						<td>
							<?= $proses_project->project_id; ?>
						</td>
						<td>
							<?= $proses_project->nama_proses; ?>
						</td>
						<td>
							<?= $proses_project->waktu; ?>
						</td>
						<td>
							<?= $proses_project->status; ?>
						</td>
						<td>
							<?= $proses_project->progress; ?>
						</td>
						<td>
							<?= $proses_project->status; ?>
						</td>
						<?php $no++; ?>
					<?php endforeach ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>