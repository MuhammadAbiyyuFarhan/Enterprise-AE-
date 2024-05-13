<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Kelola Data
		<small>Data Admin</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_user" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Admin</a>
			
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
					<?php foreach ($admins as $admin) : ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $admin->username; ?>
							</td>
							<td>
								<?php echo $admin->password; ?>
							</td>
							<td>
								<?php echo $admin->role; ?>
							</td>
							<td>
								<a href="?page=MyApp/edit_user&kode=<?php  echo $admin->id_user; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=MyApp/del_user&kode=<?php  echo $admin->id_user; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
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