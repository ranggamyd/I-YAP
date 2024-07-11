<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SP - Malnutrisi</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Bootstrap App Landing Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Small Apps Template v1.0">

    <!-- theme meta -->
    <meta name="theme-name" content="small-apps" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets') ?>/front/images/malnutrisi.png" />

    <!-- PLUGINS CSS STYLE -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/plugins/slick/slick.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/plugins/slick/slick-theme.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/plugins/aos/aos.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/select2/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/select2/select2-bootstrap4.min.css">

    <!-- CUSTOM CSS -->
    <link href="<?= base_url('assets') ?>/front/css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/front/css/wizard.css" rel="stylesheet">

</head>

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">


    <nav class="navbar main-nav shadow-sm navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
        <div class="container">
            <!-- <a class="navbar-brand" href="index.html"><img src="<?= base_url('assets') ?>/front/images/logo.png" alt="logo"></a> -->
            <a class="navbar-brand" href="<?= base_url('landing_page') ?>"><i class="fas fa-heartbeat mr-3 text-danger"></i>SISTEM PAKAR - MALNUTRISI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item @@about">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            About
                        </a>
                        <!-- <a class="nav-link" href="#">About</a> -->
                    </li>
                    <li class="nav-item @@contact">
                        <button class="h-100 bg-transparent border-0">
                            <a class="btn btn-outline-primary" href="<?= base_url('auth') ?>"><i class="fas fa-lock mr-2"></i><span>Login</span></a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="service pt-4">
        <!-- Begin Page Content -->
        <div class="container">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h4 id="heading">Cek Diagnosa Pasien </h2>
                    <a href="<?= base_url('landing_page/diagnosa') ?>" class="d-none d-sm-inline-block btn btn-sm btn-link shadow-sm">Belum Registrasi ?</a>
            </div>

            <!-- <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"></h4>
        <p><i class="fas fa-exclamation-triangle mr-1"></i><b>Perhatian !</b></p>
        <p class="mb-0">Silahkan memilih gejala sesuai dengan kondisi pada anak, anda dapat memilih
            kepastian kondisi pada anak dari pasti tidak sampai pasti ya, jika sudah tekan tombol proses di
            bawah untuk melihat hasil.</p>
    </div> -->

            <div class="card shadow-sm mb-3">
                <form action="<?= base_url('landing_page/diagnosa_pasien') ?>" method="post" id="myForm">
                    <div class="card-header">
                        <!-- <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah_diagnosa"><i
                    class="fas fa-plus-circle mr-2"></i>Tambah data</a> -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="id_pasien">Pasien :</label>
                                <select name="id_pasien" id="id_pasien" class="form-control" required>
                                    <option value="" readonly>--PILIH--</option>
                                    <?php foreach ($pasien as $p) : ?>
                                        <option value="<?= $p['id_pasien'] ?>"><?= $p['nama'] ?></option>
                                    <?php endforeach ?>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tgl_diagnosa">Tanggal :</label>
                                <input type="date" class="form-control" name="tgl_diagnosa" id="tgl_diagnosa" value="<?php echo date('Y-m-d') ?>">
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">

                                <thead class="text-center">
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama Gejala</th>
                                    <th>Pilih Kondisi</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($gejala as $item) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <!-- <td><input type="text" name="kode_gejala[]" id="kode_gejala[]" class="form-control text-center border-0" style="width: 70px; background-color:  hsla(0 0% 0% / 0);" value="<?= $item['kode_gejala']; ?>" readonly></span></td> -->
                                            <td><?= $item['kode_gejala']; ?></td>
                                            <td>Apakah anak anda mengalami <b><?= $item['nama_gejala'] ?></b></td>
                                            <td>
                                                <select name="kondisi[]" id="kondisi[]" class="form-control select-item">
                                                    <option value="0" readonly>-- PILIH --</option>
                                                    <?php foreach ($kondisi as $k) : ?>
                                                        <option value="<?= $item['id_gejala'] . '_' . $k['id_kondisi']; ?>"><?= $k['nama_kondisi']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <!-- <input class="float" type="submit" data-toggle="tooltip" data-placement="top" title="Klik disini untuk melihat hasil diagnosa" name="submit" value="Cek Diagnosa" style="font-family:Arial, FontAwesome"> -->
                                <!-- <button class="float" type="submit" data-toggle="tooltip" data-placement="top" title="Klik disini untuk melihat hasil diagnosa" name="submit"><i class="fas fa-search mr-2"></i>Diagnosa</button> -->
                            </table>
                            <input type="submit" class="btn btn-primary w-100" data-toggle="tooltip" data-placement="top" title="Klik disini untuk melihat hasil diagnosa" name="submit" value="Cek Diagnosa" style="font-family:Arial, FontAwesome">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">About</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <div class="pl-5 pr-5">
                            <h6><b>SISTEM PAKAR DIAGNOSA PENYAKIT MALNUTRISI PADA BALITA MENGGUNAKAN METODE ANALITYCAL HIERARCHY PROCESS (AHP) DAN CERTAINTY FACTOR (STUDI KASUS UPT PUSKESMAS KARANGSARI)</b></h6>
                            <h6>EXPERT SYSTEM FOR DIAGNOSE MALNUTRITION TODDLERS USING ANALITYCAL HIERARCHY PROCESS (AHP) AND CERTAINTY FACTOR METHODS (CASE STUDY UPT PUSKESMAS KARANGSARI)</h6>
                        </div>
                        <h6><b>SKRIPSI</b></h6>
                        <br>
                        <img style="width: 25%;" src="<?= base_url('assets') ?>/front/images/umc.png" alt="screenshot">
                        <br><br>
                        <h6><b>Agnes Andani <br>
                                190511079</b>
                        </h6>
                        <h6>PROGRAM STUDI TEKNIK INFORMATIKA <br>
                            FAKULTAS TEKNIK <br>
                            UNIVERSITAS MUHAMMADIYAH CIREBON <br>
                            2023/1444 H <br>
                        </h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-outline-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- To Top -->
    <div class="scroll-top-to">
        <i class="ti-angle-up"></i>
    </div>

    <!-- JAVASCRIPTS -->
    <script src="<?= base_url('assets') ?>/front/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/plugins/slick/slick.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/plugins/fancybox/jquery.fancybox.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/plugins/syotimer/jquery.syotimer.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/plugins/aos/aos.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
    <script src="<?= base_url('assets') ?>/front/plugins/google-map/gmap.js"></script>

    <script src="<?= base_url('assets') ?>/front/js/script.js"></script>
    <script src="<?= base_url('assets') ?>/front/js/wizard.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/select2/select2.min.js"></script>

    <!-- select2-bootstrap4-theme -->
    <script src="<?= base_url('assets') ?>/vendor/select2/script.js"></script>

    <script>
        var form = document.getElementById('msform');
        var selectDropdowns = form.getElementsByClassName('select-item');

        form.addEventListener('submit', function(event) {

            let allZero = true;
            Array.from(selectDropdowns).forEach(function(selectDropdown) {
                if (selectDropdown.value !== '0') {
                    allZero = false;
                }
            });

            if (allZero) {
                alert('Harap memilih salah satu gejala');
                event.preventDefault();
            } else {
                event.submit();
            }
        });
    </script>


    <script>
        var form = document.getElementById('myForm');
        var selectDropdowns = form.getElementsByClassName('select-item');

        form.addEventListener('submit', function(event) {

            let allZero = true;
            Array.from(selectDropdowns).forEach(function(selectDropdown) {
                if (selectDropdown.value !== '0') {
                    allZero = false;
                }
            });

            if (allZero) {
                alert('Harap memilih salah satu gejala');
                event.preventDefault();
            } else {
                event.submit();
            }
        });
    </script>

</body>

</html>