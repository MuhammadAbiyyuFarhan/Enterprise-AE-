<?php $session = session(); ?>

<?= $this->include('layout/header'); ?>

    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url('/'); ?>" class="logo">
                <span class="logo-lg">
                    <b>Polman Bandung</b>
                </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a class="dropdown-toggle">
                                <span>
                                    <b>
                                            Enterprise PPC Automation Engineering
                                    </b>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                </<b>
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="assets/img/SuperAdmin.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?php echo $session->username; ?>
                        </p>
                        <span class="label label-danger">
                            <?php echo $session->role; ?>
                        </span>
                    </div>
                </div>
                </br>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>

                    <!-- Level  -->
                    <?php
          if ($session->role=="SuperAdmin"){
        ?>

                    <li class="treeview">
                        <a href="?page=SuperAdmin">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>

                   <li class="treeview">
                        <a href="?page=MyApp/data_project">
                            <i class="fa fa-users"></i>
                            <span>Project</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>

                    <li class="treeview">
						<a href="?page=MyApp/data_product">
							<i class="fa fa-book"></i>
							<span >Product</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=MyApp/data_worker">
                            <i class="fa fa-play-circle" aria-hidden="true"></i>
							<span>Worker</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

                    
                    <li class="treeview">
                        <a href="?page=MyApp/simulasi_price">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <span>Pricing</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>


                    <li class="treeview">
                        <a href="?page=MyApp/data_qc">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <span>Quality Control</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>


                    <li class="treeview">
                        <a href="?page=MyApp/data_maintenance">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <span>Maintenance</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>

                    <li class="header">SETTING</li>

                    <li class="treeview">
                        <a href="?page=MyApp/data_superadmin">
                            <i class="fa fa-user"></i>
                            <span>Penggelola Sistem</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>

                    <?php
					} 
					?>

                    <li>
                        <a href="logout" onclick="return confirm('Anda yakin keluar dari aplikasi ?')">
                            <i class="fa fa-sign-out"></i>
                            <span>Logout</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>


            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <?php 
      if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
              //Klik Halaman Home Pengguna
              case 'SuperAdmin':
                  include "home/SuperAdmin.php";
                  break;
        
              //SuperAdmin
              case 'MyApp/data_superadmin':
                  include "admin/superadmin/data_superadmin.php";
                  break;
              case 'MyApp/add_superadmin':
                  include "admin/superadmin/add_superadmin.php";
                  break;
              case 'MyApp/edit_superadmin':
                  include "admin/superadmin/edit_superadmin.php";
                  break;
              case 'MyApp/del_superadmin':
                  include "admin/superadmin/del_superadmin.php";
				  break;
				  
              //admin
            case 'MyApp/data_user':
                include "admin/user/data_user.php";
                break;
            case 'MyApp/add_user':
                include "admin/user/add_user.php";
                break;
            case 'MyApp/edit_user':
                include "admin/user/edit_user.php";
                break;
            case 'MyApp/del_user':
                include "admin/user/del_user.php";
                break;

			//project
            case 'MyApp/data_project':
                include "admin/project/data_project.php";
                break;
            case 'MyApp/add_project':
                include "admin/project/add_project.php";
                break;
            case 'MyApp/edit_project':
                include "admin/project/edit_project.php";
                break;
            case 'MyApp/del_project':
                include "admin/project/del_project.php";
                break;
            case 'MyApp/more_project':
                include "admin/project/more_project.php";
                break;
            
            //proses_project
            case 'MyApp/add_proses_project':
                include "admin/proses_project/add_proses_project.php";
                break;    

            //product
            case 'MyApp/data_product':
                include "admin/product/data_product.php";
                break;    
             case 'MyApp/frais':
                include "admin/product/frais.php";
                break;    
            case 'MyApp/polebot':
                include "admin/product/polebot.php";
                break;    
            case 'MyApp/dobot':
                include "admin/product/dobot.php";
                break;   
                
            //price
            case 'MyApp/simulasi_price':
                include "admin/price/simulasi_price.php";
                break;

            //worker
            case 'MyApp/data_worker':
                include "admin/worker/data_worker.php";
                break;
            case 'MyApp/add_worker':
                include "admin/worker/add_worker.php";
                break;
            case 'MyApp/edit_worker':
                include "admin/worker/edit_worker.php";
                break;
            case 'MyApp/del_worker':
                include "admin/worker/del_worker.php";
                break;


            //qc
            case 'MyApp/data_qc':
                include "admin/qc/data_qc.php";
                break;
            case 'MyApp/add_qc':
                include "admin/qc/add_qc.php";
                break;
            case 'MyApp/edit_qc':
                include "admin/qc/edit_qc.php";
                break;
            case 'MyApp/del_qc':
                include "admin/qc/del_qc.php";
                break;
            case 'MyApp/more_qc':
                include "admin/qc/more_qc.php";
                break;

    
			//maintenance
            case 'MyApp/data_maintenance':
                include "admin/maintenance/data_maintenance.php";
                break;
            case 'MyApp/add_maintenance':
                include "admin/maintenance/add_maintenance.php";
                break;
            case 'MyApp/edit_maintenance':
                include "admin/maintenance/edit_maintenance.php";
                break;
            case 'MyApp/del_maintenance':
                include "admin/maintenance/del_maintenance.php";
                break;
            case 'MyApp/more_maintenance':
                include "admin/maintenance/more_maintenance.php";
                break;
 
            //default
              default:
				  echo "<center><br><br><br><br><br><br><br><br><br>
				  <h1> Halaman tidak ditemukan !</h1></center>";
                  break;    
          }
      }else{
        // Auto Halaman Home SuperAdmin
          if($session->role=="SuperAdmin"){
              include "home/SuperAdmin.php";
              }
            }
    ?>

            </section>
            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
            </div>
            <strong>2024 &copy;
                <a href="#" data-toggle="modal" data-target="#staticBackdrop">Automation Engineering</a>
        </footer>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" style="text-align: center;" id="staticBackdropLabel" >About Us</h2>
            </div>
            <!-- <div class="modal-body">
                <h5 class="text-justify">Modul Praktikum Aplikasi Komputasi Awan ini dibuat untuk menyelesaikan tugas mata kuliah praktik Poduction Planning Control. Production Planning Control merupakan serangkaian praktikum yang ditugaskan kepada mahasiswa semester 5 Program Studi Teknologi Rekayasa Otomasi. Pada praktikum PPC 2 - 3, mahasiswa ditugaskan secara berkelompok untuk membantu dosen PIC yang ditunjuk. Adapun Kelompok 4 dari Absen Atas 3 AEB-1 ditugaskan untuk membuat Web Pembelajaran Komputasi Awan. Berikut adalah anggotanya :</h5>
                </b>    
               
                <br>
                <div class="row slideanim" style="text-align: center;">
                <div class="col-sm-4">
                    <img class="img-circle" src="assets/img/Elvyra.png" alt="..." style="width:100px" ; />
                    <h5><strong>Elvyra Jovanka Rozani</h5>
                    <h5 >220441006</h5>
                </div>
                <div class="col-sm-4">
                    <img class="img-circle" src="assets/img/Jody.jpg" alt="..." style="width:100px" ; />
                    <h5 ><strong>Jody Jovantio</h5>
                    <h5 >220441010</h5>
                </div>
                <div class="col-sm-4">
                    <img class="img-circle" src="assets/img/Rafy.jpg" alt="..." style="width:100px" ; />
                    <h5><strong>Muhammad Rafy Rahmatulloh</h5>
                    <h5 >220441012</h5>
                </div>
                </div>
            </div> -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

        <div class="control-sidebar-bg"></div>

        <!-- ./wrapper -->

<?= $this->include('layout/footer'); ?>