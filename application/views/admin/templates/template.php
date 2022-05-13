<!DOCTYPE html>
<html lang="en">

<?php 

if ($this->session->id_user == '') {
    redirect('', 'refresh');
}


// var_dump($_SESSION);

?>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title ?></title>
    <meta name="baseUrl" content="<?= base_url() ?>">
    <meta name="menu" content="<?= (isset($menu)) ? $menu : null ?>">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url() ?>assets/admin//assets/img/icon.ico" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f1edfd5750.js" crossorigin="anonymous">
    </script>
    <!-- Fonts and icons -->
    <script src="<?= base_url() ?>assets/admin//assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
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
    </script>
    <style>
        .note-editor .btn-toolbar button[data-event="showImageDialog"] {
            display: none !important;
        }

        .note-editor .btn-toolbar button[data-event="showVideoDialog"] {
            display: none !important;
        }
    </style>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin//assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin//assets/css/azzara.min.css">
    <!-- Daterange -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin//assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        <!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
        <div class="main-header" data-background-color="blue">
            <!-- Logo Header -->
            <div class="logo-header">

                <a href="<?= base_url('admin/dashboard') ?>" class="logo">
                    <span class="navbar-brand text-white">Backoffice</span>
                    <!-- <img src="<?= base_url() ?>assets/admin//assets/img/logoazzara.svg" alt="navbar brand" class="navbar-brand"> -->
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg">

                <div class="container-fluid">

                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>


                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="<?= base_url() ?>assets/admin/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="<?= base_url() ?>assets/admin/assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4><?= $_SESSION['nama_user'] ?></h4>
                                            <!-- <p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a> -->
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('admin/pengaturan/profil') ?>">Pengaturan Akun Admin</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('admin/logout') ?>">Logout</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <?php include('sidebar.php') ?>


        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title"><?= $title?> </h4>
                        <div class="btn-group btn-group-page-header ml-auto">

                        </div>
                    </div>
                    <?php $this->load->view($konten) ?>
                </div>
            </div>

        </div>


        <!--   Core JS Files   -->
        <script src="<?= base_url() ?>assets/admin//assets/js/core/jquery.3.2.1.min.js"></script>
        <script src="<?= base_url() ?>assets/admin//assets/js/core/popper.min.js"></script>
        <script src="<?= base_url() ?>assets/admin//assets/js/core/bootstrap.min.js"></script>
        <!-- jQuery UI -->
        <script src="<?= base_url() ?>assets/admin//assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="<?= base_url() ?>assets/admin//assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
        <!-- Bootstrap Toggle -->
        <script src="<?= base_url() ?>assets/admin//assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
        <!-- jQuery Scrollbar -->
        <script src="<?= base_url() ?>assets/admin//assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <!-- Datatables -->
        <script src="<?= base_url() ?>assets/admin//assets/js/plugin/datatables/datatables.min.js"></script>
        <!-- Azzara JS -->
        <script src="<?= base_url() ?>assets/admin//assets/js/ready.min.js"></script>
        <!-- Azzara DEMO methods, don't include it in your project! -->
        <script src="<?= base_url() ?>assets/admin//assets/js/setting-demo.js"></script>

        <!-- DataTables  & Plugins -->
        <script src="<?= base_url() ?>assets/admin/datatable/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/datatable/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/datatable/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/datatable/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/datatable/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/datatable/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/datatable/jszip/jszip.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/datatable/pdfmake/pdfmake.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/datatable/pdfmake/vfs_fonts.js"></script>
        <script src="<?= base_url() ?>assets/admin/datatable/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/datatable/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/datatable/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- Summernote -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


        <script>
            $('#summernote').summernote({
                placeholder: 'Masukan isi konten anda disini',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['undo', 'redo', 'fullscreen', 'help']]
                ]
            });
        </script>


        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>


        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imgView').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#imgInp").change(function() {
                readURL(this);
            });
        </script>


        <!-- Sweet Alert -->
        <script src="<?= base_url() ?>assets/admin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
        <!-- Daterange -->
        <!-- <script src="<?= base_url() ?>assets/admin/daterangepicker/daterangepicker.js"></script> -->

        <script src="<?= base_url('assets/js/Chart.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/page/admin.js') ?>"></script>
        <?= (isset($script)) ? "<script src='" . base_url() . "assets/js/page/" . $script . ".js'></script>" : '' ?>

       

</body>

</html>