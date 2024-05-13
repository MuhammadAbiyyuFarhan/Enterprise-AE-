
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

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from project");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>

							<td>
								<?php echo $data['pemesan']; ?>
							</td>
							<td>
								<?php echo $data['no_order']; ?>
							</td>
							<td>
								<?php echo $data['product_id']; ?>
							</td>
							<td>
								<?php echo $data['worker_id']; ?>
							</td>
							<td>
								<?php echo $data['deadline']; ?>
							</td>
							<td>
								<?php echo $data['status']; ?>
							</td>

							<td>
								<a href="?page=MyApp/more_project&kode=<?php echo $data['project_id']; ?>" title="Info"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								
								<a href="?page=MyApp/edit_project&kode=<?php echo $data['project_id']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								
								<a href="?page=MyApp/del_project&kode=<?php echo $data['project_id']; ?>" onclick="return confirm('Yakin Hapus Project Ini ?')"
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