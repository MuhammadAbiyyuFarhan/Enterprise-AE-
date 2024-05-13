<?php
	$sql = $koneksi->query("SELECT count(project_id) as allorder from project");
	while ($data= $sql->fetch_assoc()) {
		$allorder=$data['allorder'];
	}

	$sql = $koneksi->query("SELECT count(project_id) as onprogress from project WHERE status='cancel'");
	while ($data= $sql->fetch_assoc()) {
		$onprogress=$data['onprogress'];
	}

	$sql = $koneksi->query("SELECT count(project_id) as done from project WHERE status='done'");
	while ($data= $sql->fetch_assoc()) {
	$done=$data['done'];
	}

	$sql = $koneksi->query("SELECT count(project_id) as delay from project WHERE status='delay'");
	while ($data= $sql->fetch_assoc()) {
		$delay=$data['delay'];
	}

	$sql = $koneksi->query("SELECT count(project_id) as hold from project WHERE status='hold'");
	while ($data= $sql->fetch_assoc()) {
		$hold=$data['hold'];
	}

	$sql = $koneksi->query("SELECT count(project_id) as cancel from project WHERE status='cancel'");
	while ($data= $sql->fetch_assoc()) {
		$cancel=$data['cancel'];
	}
?>


<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<a href="index.php">
			<i class="fa fa-home"></i>
		</a>
		Dashboard
		<small>Admin</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">		
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h2>
						<b>
						<br>
						</b>
					</h2>
					<p>Product</p>
				</div>
				<div class="icon">
				<img class="bg-img" src="assets/img/product.png" alt="..." style="width:100px" ; />
				<!-- <i class="fa fa-tags" aria-hidden="true"></i> -->
				</div>
				<a href="?page=MyApp/data_product" class="small-box-footer">View
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		
	

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h2>
						<b>
						<br>
						</b>
					</h2>
					<p>Worker</p>
				</div>
				<div class="icon">
				<img class="bg-img" src="assets/img/worker.png" alt="..." style="width:150px" ; />		
				<!-- <i class="fa fa-users" aria-hidden="true"></i> -->
				</div>
				<a href="?page=MyApp/data_worker" class="small-box-footer"> More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>


		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h2>
						<b>
						<?= $allorder; ?>	
						</b>
					</h2>
					<p>All Orders</p>
				</div>
				<div class="icon">
				<img class="bg-img" src="assets/img/allorder.png" alt="..." style="width:100px" ; />
				<!-- <i class="fa fa-list" aria-hidden="true"></i> -->
				</div>

				<a href="?page=MyApp/data_project" class="small-box-footer"> More info
				<i class="fa fa-arrow-circle-right"></i>
					</br>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h2>
						<b>
						<?= $onprogress; ?>
						</b>
					</h2>
					<p>On Progress</p>
				</div>
				<div class="icon">
				<img class="bg-img" src="assets/img/onprogres.png" alt="..." style="width:150px" ; />
				<!-- <i class="fa fa-clipboard" aria-hidden="true"></i> -->
				</div>
				<a  class="small-box-footer"> 
					</br>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h2>
						<b>
						<?= $done; ?>
						</b>
					</h2>
					<p>Done</p>
				</div>
				<div class="icon">
				<img class="bg-img" src="assets/img/done.png" alt="..." style="width:100px" ; />
				<!-- <i class="fa fa-check" aria-hidden="true"></i> -->
				</div>
				<a  class="small-box-footer"> 
					</br>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h2>
						<b>
						<?= $delay; ?>
						</b>
					</h2>
					<p>Delay</p>
				</div>
				<div class="icon">
				<img class="bg-img" src="assets/img/delay.png" alt="..." style="width:100px" ; />
				<!-- <i class="fa fa-rotate-right" aria-hidden="true"></i> -->
				</div>
				<a  class="small-box-footer"> 
					</br>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h2>
						<b>
						<?= $hold; ?>
						</b>
					</h2>
					<p>Hold</p>
				</div>
				<div class="icon">
				<img class="bg-img" src="assets/img/hold.png" alt="..." style="width:150px" ; />
				<!-- <i class="fa fa-book" aria-hidden="true"></i> -->
				</div>
				<a  class="small-box-footer"> 
					</br>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h2>
						<b>
						<?= $cancel; ?>
						</b>
					</h2>
					<p>Cancel</p>
				</div>
				<div class="icon">
				<img class="bg-img" src="assets/img/cancel.png" alt="..." style="width:100px" ; />
				<!-- <i class="fa fa-trash" aria-hidden="true"></i> -->
				</div>
					<a  class="small-box-footer"> 
					</br>	
				</a>
			</div>
		</div>

