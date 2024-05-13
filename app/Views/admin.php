<?php $session = session();?>

<?= $this->include('layout/header_login'); ?>


	<div class="login-box">
		<div class="login-logo">
			<h3>
				<font color="">
					<b>Enterprise PPC Automation Engineering</b>
				</font>
			</h3>
			</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<center>
				<img src="<?= base_url('assets/img/polman.png'); ?>" width=160px />
			</center>
			<br>
			<p class="login-box-msg">Login Super Admin</p>
			<form action="<?= base_url('login/auth'); ?>" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="username" placeholder="Username" required>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">

					</div>
					<!-- /.col -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
							<b>Masuk</b>
						</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
			<!-- /.social-auth-links -->

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->


<?= $this->include('layout/footer_login'); ?>

<?php 
	if ($session->flash_massage)
	{
		echo $session->flash_massage;
	}

	$session->remove('flash_massage');
?>
	
<?php 
// if (isset($_POST['btnLogin'])) { 
// 	$username=mysqli_real_escape_string($koneksi,$_POST['username']);
// 	$password=mysqli_real_escape_string($koneksi,$_POST['password']);		

// 	$sql_login = "SELECT * FROM users WHERE BINARY username='$username' AND password='$password' AND id_role='1'";
// 	$query_login = mysqli_query($koneksi, $sql_login);
// 	$data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
// 	$jumlah_login = mysqli_num_rows($query_login);

// 		if ($jumlah_login == 1 ){
// 			$ses_login = [
// 				'ses_id'  => $data_login["id_user"],
// 				'ses_username' => $data_login["username"],
// 				'ses_password' => $data_login["password"],
// 				'ses_role' => $data_login["id_role"]
// 			];
// 			$session->set($ses_login);
			
// 			echo "<script>
// 				Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
// 				}).then((result) => {
// 					if (result.value) {
// 						window.location = '".base_url('/')."';
// 					}
// 				})</script>";
// 		} else {
// 			echo "<script>
// 				Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
// 				}).then((result) => {
// 					if (result.value) {
// 						location = 'admin';
// 					}
// 				})</script>";
// 		}
// }
?>
