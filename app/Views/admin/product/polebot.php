

<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Mobile Robot PoleBot
					
		<small>Detail Mobile Robot PoleBot</small>
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
							<th>Komponen</th>
							<th>Jumlah</th>
							<th>Harga Satuan</th>
							<th>Harga Total</th>
							<th>Spesifikasi</th>
						</tr>
					</thead>
					<tbody>

					<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from bom_product Where bom_product_id BETWEEN 15 AND 35");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>

							<td>
								<?php echo $data['komponen']; ?>
							</td>
							<td>
								<?php echo $data['jumlah']; ?>
							</td>
							<td>
								<?php echo $data['harga_satuan']; ?>
							</td>
							<td>
								<?php echo $data['harga_total']; ?>
							</td>
							<td>
								<?php echo $data['spek']; ?>
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
