<?php

if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM qc WHERE qc_id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		No. Order
		<?php echo $data_cek['product_id']; ?>

		<small>Detail Data Quality Control</small>
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
				<a href="?page=MyApp/add_proses_qc" title="Tambah Pengujian" class="btn btn-primary">
					<i class="glyphicon glyphicon-plus"></i> Tambah Pengujian</a>
				
			</div> -->
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Pengujian</th>
							<th>Uji</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from qc_project");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>

							<td>
								<?php echo $data['nama_uji']; ?>
							</td>
							<td>
								<?php echo $data['uji']; ?>
							</td>
							<td>
								<?php echo $data['status']; ?>
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