<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Super Admin
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Enterprise PPC Automation Engineering</b>
			</a>
		</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<a href="?page=MyApp/add_superadmin" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Super Admin</a>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Password</th>
							<th>Role</th>
						</tr>
					</thead>
					<tbody>

					<?php $no = 1; ?>
					<?php foreach ($superadmins as $superadmin) : ?>
						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $superadmin->username; ?>
							</td>
							<td>
								<?php echo $superadmin->password; ?>
							</td>
							<td>
								<?php echo $superadmin->role; ?>
							</td>
							<td>
								<a href="?page=MyApp/edit_superadmin&kode=<?php echo $superadmin->id_user; ?>"
								 title="Ubah" class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=MyApp/del_superadmin&kode=<?php echo $superadmin->id_user; ?>"
								 onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i>
									</>
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