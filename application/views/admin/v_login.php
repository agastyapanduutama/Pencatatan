<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url() ?>assets/admin/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?= base_url() ?>assets/admin/assets/js/plugin/webfont/webfont.min.js"></script>
    <!-- <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['<?= base_url() ?>assets/admin/assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script> -->

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/azzara.min.css">
</head>

<body class="login">
    <div class="wrapper wrapper-login">
        <form action="<?= base_url('admin/login/aksi') ?>" method="POST">
            <div class="container container-login animated fadeIn">
                <h3 class="text-center">Silakan masukan Nama Pengguna dan Kata Sandi anda</h3>
                <?php 

                if ($this->session->flashdata('warning')) {
                echo '<div class="alert alert-warning">';
                echo $this->session->flashdata('warning');
                echo '</div>';
                }

                if ($this->session->flashdata('success')) {
                echo '`<div class="alert alert-success">';
                echo $this->session->flashdata('success');
                echo '</div>';
                }

                ?>
                <div class="login-form">
                    <div class="form-group">
                        <label for="username" class="placeholder"><b>Nama Pengguna</b></label>
                        <input id="username" name="username" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Kata Sandi</b></label>
                        <div class="position-relative">
                            <input id="password" name="password" type="password" class="form-control" required>
                            <div class="show-password">
                                <i class="flaticon-interface"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-action-d-flex mb-3">
                        <button type="submit" class="btn btn-primary col-md-12 float-right mt-3 mt-sm-0 fw-bold">Masuk</button>
                    </div>
                    <!-- 				<div class="form-action">
					<a href="#" class="btn btn-primary btn-rounded btn-login">Sign In</a>
				</div> -->

                </div>
        </form>
    </div>

    </div>
    <script src="<?= base_url() ?>assets/admin/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/ready.js"></script>
</body>

</html>