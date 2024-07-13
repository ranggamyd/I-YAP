<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SPDP Itik - AHP CF</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Bootstrap App Landing Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Small Apps Template v1.0">

    <!-- theme meta -->
    <meta name="theme-name" content="small-apps" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets') ?>/img/logo_only.png" />

    <!-- PLUGINS CSS STYLE -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/plugins/slick/slick.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/plugins/slick/slick-theme.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/plugins/aos/aos.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css">

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
        <div class="container">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h3 class="mb-0 text-gray-800">Hasil Diagnosis</h3>
                <a href="#" id="print" onClick="window.print();" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="tooltip" data-placement="right" title="Klik tombol ini untuk mencetak hasil diagnosa"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header">
                            <h4 class="mb-0 text-gray-800">Data Pasien</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <?php foreach ($pasien as $item) { ?>
                                    <tr>
                                        <th>Nama:</th>
                                        <td><?= $item['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin:</th>
                                        <td><?= $item['jenis_kelamin'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Umur:</th>
                                        <td><?= $item['umur'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Orang Tua:</th>
                                        <td><?= $item['nama_orangtua'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat:</th>
                                        <td><?= $item['alamat'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Diagnosa:</th>
                                        <td><?= $tanggal ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <!-- 
                            <?php foreach ($pasien as $item) { ?>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="nama">Nama :</label><br>
                                        <input type="text" class="form-control bg-light mb-3" value="<?= $item['nama'] ?>" disabled>
                                        <label for="jk">Jenis Kelamin :</label>
                                        <input type="text" class="form-control bg-light mb-2" value="<?= $item['jenis_kelamin'] ?>" disabled>
                                    </div>
                                    <div class="col-4">
                                        <label for="umur">Umur :</label><br>
                                        <input type="text" class="form-control bg-light mb-3" value="<?= $item['umur'] ?>" disabled>
                                        <label for="ortu">Nama Orang Tua :</label>
                                        <input type="text" class="form-control bg-light mb-2" value="<?= $item['nama_orangtua'] ?>" disabled>
                                    </div>
                                    <div class="col-4">
                                        <label for="alamat">Alamat :</label><br>
                                        <input type="text" class="form-control bg-light mb-3" value="<?= $item['alamat'] ?>" disabled>
                                        <label for="tgl">Tanggal Diagnosa :</label>
                                        <input type="text" class="form-control bg-light mb-2" value="<?= $tanggal ?>" disabled>
                                    </div>
                                </div>
                            <?php } ?> -->
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header">
                            <h4 class="mb-0 text-gray-800">Gejala yang di alami pasien</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped diagnosa">
                                <tr>
                                    <th width="8%">No</th>
                                    <th width="10%">Kode</th>
                                    <th>Gejala yang dialami (keluhan)</th>
                                    <th width="20%">Pilihan</th>
                                </tr>
                                <?php
                                $ig = 0;
                                foreach ($argejala as $key => $value) {
                                    $kondisi = $value;
                                    $ig++;
                                    $gejala = $key;
                                    $r4 = $this->db->where('id_gejala', $key)->get('gejala')->row_array();
                                    echo '<tr><td>' . $ig . '</td>';
                                    echo '<td>' . str_pad($r4['kode_gejala'], 3, '0', STR_PAD_LEFT) . '</td>';
                                    echo '<td><span class="hasil text text-primary">' . $r4['nama_gejala'] . "</span></td>";
                                    echo '<td><span class="kondisipilih">' . $arkondisitext[$kondisi] . "</span></td></tr>";
                                }

                                // $np = 0;
                                // foreach ($arpenyakit as $key => $value) {
                                //     $np++;
                                //     $idpkt[$np] = $key;
                                //     $nmpkt[$np] = $arpkt[$key];
                                //     $vlpkt[$np] = $value;
                                // }
                                // if ($arpkt[$idpkt[1]]) {
                                //     $gambar = 'gambar/penyakit/' . $argpkt[$idpkt[1]];
                                // } else {
                                //     $gambar = 'gambar/noimage.png';
                                // }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-3 text-center">
                <!-- <img class="card-img-top img-bordered-sm" style="float:right; margin-left:15px;" src="<?php echo base_url($argpkt[$idpkt1[1]]); ?>" height="200"> -->
                <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Hasil Diagnosa</h4>
                </div>
                <div class="card-body">
                    <h5>Jenis penyakit yang disebabkan oleh gejala tersebut adalah : </h5>
                    <?php
                    $key = 0;
                    foreach ($arpenyakit as $key => $value) {
                        $idpkt1[1] = $key;
                        $vlpkt1[1] = $value;
                    ?>
                        <b>
                            <h4 class="text text-success">
                                <?php
                                if ($arpkt[$idpkt1[1]] == NULL) {
                                    echo 0;
                                } else {
                                    echo $arpkt[$idpkt1[1]];
                                }
                                ?>

                        </b> / <?php echo $vlpkt1[1] * 100; ?> % (<?php echo round($vlpkt1[1], 3); ?>)<br></h4>
                    <?php if ($key++ > 0) break;
                    } ?>

                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header">
                            <h4 class="mb-0 text-gray-800">Solusi</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            $key = 0;
                            foreach ($arpenyakit as $key => $value) {
                                $idpkt1[1] = $key;
                            ?>
                                <h4><?php echo $arspkt[$idpkt1[1]]; ?></h4>

                            <?php if ($key++ > 1) break;
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header">
                            <h4 class="mb-0 text-gray-800">Kemungkinan lain</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            $i = 0;
                            foreach ($arpenyakit as $key => $value) {
                                // var_dump($i);
                                if ($i++ > 0) {
                                    $idpkt[1] = $key;
                                    $vlpkt[1] = $value;
                            ?>
                                    <b>
                                        <h4 class="text text-info"> -
                                            <?php
                                            if ($arpkt[$idpkt[1]] == NULL) {
                                                echo 0;
                                            } else {
                                                echo $arpkt[$idpkt[1]];
                                            }
                                            ?>

                                    </b> / <?php echo $vlpkt[1] * 100; ?> % (<?php echo round($vlpkt[1], 3); ?>)<br></h4>
                            <?php if ($i++ > 5) break;
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--<div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Saran</h3>
            </div>
            <div class="box-body">
                <h4><?php echo $arspkt[$idpkt1[1]]; ?></h4>
            </div>
        </div>-->



        </div>
    </section>
    <footer>
        <div class="text-center bg-dark py-4">
            <small class="text-secondary">Copyright &copy; <script>
                    document.write(new Date().getFullYear())
                </script>. Sistem Pakar Malnutrisi - Template Dev By <a href="https://themefisher.com/"> Themefisher</a></small class="text-secondary">
        </div>
    </footer>

    <!-- Button trigger modal -->


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
</body>

</html>