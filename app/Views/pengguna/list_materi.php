
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	    <a href="page.php">
			<i class="fa fa-home"></i>
		</a>
		Dashboard
		<small>Mahasiswa</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h2>
					</h2>
					<p>APLIKASI KOMPUTASI AWAN 1</p>
				</div>
				<div class="icon">
					<i class="ion-ios-book"></i>
				</div>
				<a href="?page=aka1" class="small-box-footer">Info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h2>
					</h2>
					<p>APLIKASI KOMPUTASI AWAN 2</p>
				</div>
				<div class="icon">
					<i class="ion-ios-book"></i>
				</div>
				<a href="?page=aka2" class="small-box-footer">Info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<?php 
		if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
              //materi 1
              case 'aka1':
                  include "pengguna/aka1.php";
                  break;
        
              //materi 2
              case 'aka2':
                  include "pengguna/aka2.php";
				  break;	     	           
				}
			}
		?>

