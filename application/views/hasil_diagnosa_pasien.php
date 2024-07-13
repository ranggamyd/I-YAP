<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <!-- site metas -->
    <title>SPDP Itik - AHP CF</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/front/css/bootstrap.min.css" />
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/front/css/style.css" />
    <!-- Responsive-->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/css/responsive.css" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets') ?>/img/logo_only.png" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/front/css/jquery.mCustomScrollbar.min.css" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet" />
    <!-- owl stylesheets -->

    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css">

    <!-- CUSTOM CSS -->
    <!-- <link href="<?= base_url('assets') ?>/front/css/style.css" rel="stylesheet"> -->
    <link href="<?= base_url('assets') ?>/front/css/wizard.css" rel="stylesheet">
</head>

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">
    <nav class="navbar main-nav shadow-sm navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
        <div class="header_section">
            <div class="" style="background-color: rgba(255, 255, 255, 0.2);">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <a class="logo" href="<?= base_url('landing_page') ?>"><img src="<?= base_url('assets') ?>/img/logo_full2.png" /></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <!-- <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home</a>
                </li> -->
                            </ul>
                            <div class="call_section">
                                <ul>
                                    <div class="nav-item">
                                        <a href="<?= base_url('/') ?>" class="btn btn-outline-warning"><i class="fas fa-check mr-2"></i>Selesai</a>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
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
                            <h4 class="mb-0 text-gray-800">Data Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <?php foreach ($pasien as $item) { ?>
                                    <tr>
                                        <th>Nama:</th>
                                        <td><?= $item['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Umur:</th>
                                        <td><?= $item['umur'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>No. HP:</th>
                                        <td><?= $item['no_hp'] ?></td>
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
                            <h4 class="mb-0 text-gray-800">Gejala yang di alami Pengguna</h4>
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
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">Copyright © 2024. SPDP ITIK - Metode AHP CF</p>
        </div>
    </div>





    <!-- To Top -->
    <div class="scroll-top-to">
        <i class="ti-angle-up"></i>
    </div>

    <!-- JAVASCRIPTS -->
    <script src="<?= base_url('assets') ?>/front/js/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/js/popper.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/js/jquery-3.0.0.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/js/plugin.js"></script>

    <!-- <script src="<?= base_url('assets') ?>/front/js/script.js"></script> -->
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