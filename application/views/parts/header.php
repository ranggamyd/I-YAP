<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPDP Itik - Admin</title>

    <script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        function myfunction() {
            a = document.getElementById('id_penyakit').value;
            location.href = "?a=" + a;
        }
    </script>
    <!-- <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/sb-admin-2.min.js"></script> -->

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/magnific-popup/magnific-popup.css">
    <!-- <link rel="shortcut icon" href="<?= base_url('assets') ?>/img/logo_bkipm2.png"> -->
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets') ?>/img/logo_only.png" />

    <!-- select2 -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/select2/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/select2/select2-bootstrap4.min.css">

    <!-- Perpage CSS -->
    <?php if (isset($style['css'])) : ?>
        <link rel="stylesheet" href="<?= base_url('assets') ?>/css/<?= $style['css'] ?>">
    <?php endif ?>
    <style>
        .float {
            background: #4e73df;
            color: white;
            border-top: 0;
            border-left: 0;
            border-right: 0;
            text-decoration: none;
            font-family: Helvetica;
            font-size: 12pt;
            position: fixed;
            width: 150px;
            height: 50px;
            bottom: 40px;
            right: 40px;
            background-color: #4e73df;
            color: #FFF;
            border-radius: 15px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
            margin-top: 32px;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
                <!-- <div class="sidebar-brand-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SP Diagnosa Penyakit ITIK</div> -->
                <img src="<?= base_url('assets') ?>/img/logo_full.png" class="w-100">
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <!-- <div class="sidebar-heading">Master Data</div> -->
            <li class="nav-item <?= ($this->uri->segment(1) == 'penyakit') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('penyakit') ?>">
                    <i class="fas fa-fw fa-biohazard"></i>
                    <span>Data Penyakit</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'gejala') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('gejala') ?>">
                    <i class="fas fa-fw fa-virus"></i>
                    <span>Data Gejala</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- <div class="sidebar-heading">Options</div> -->
            <li class="nav-item <?= ($this->uri->segment(1) == 'rule') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('rule') ?>">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Rule Penyakit</span>
                </a>
            </li>

            <li class="nav-item <?= ($this->uri->segment(1) == 'matriks') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('matriks') ?>">
                    <i class="fas fa-fw fa-square-root-alt"></i>
                    <span>Matriks AHP</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- <div class="sidebar-heading">Misc</div> -->
            <li class="nav-item <?= ($this->uri->segment(1) == 'pasien' && $this->uri->segment(2) == '') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('pasien') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pengguna</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'admin') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('admin') ?>">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Data Admin</span>
                </a>
            </li>

            <li class="nav-item <?= ($this->uri->segment(1) == 'laporan') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('laporan') ?>">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Laporan Hasil</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                $admin = $this->db->get_where('admin', ['admin.id_admin' => $this->session->userdata('id_admin')])->row()
                                ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= strtok($admin->nama, ' ') ?></span>
                                <!-- <img class="img-profile rounded-circle" src="<?= base_url('assets/img/' . $admin->avatar) ?>">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span> -->
                                <img class="img-profile rounded-circle" src="<?= base_url('assets') ?>/img/default_avatar.jpg" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('admin') ?>">
                                    <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Setting
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->