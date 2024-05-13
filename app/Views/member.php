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
                <img src="assets/img/polman.png" width=160px />
            </center>
            <br>
            <p class="login-box-msg">Login Admin</p>
            <form action="#" method="post">
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
                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="btnLogin"
                            title="Masuk Sistem">
                            <b>Masuk</b>
                        </button>
                        <br>
                        <a href="login/admin" title="Halaman Adminintrator" class="btn btn-default btn-sm">
                            <i class="glyphicon glyphicon-user"></i>
                        </a>
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
