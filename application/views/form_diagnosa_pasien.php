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
    <title>I-YAP</title>
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
                            <div class="call_section">
                                <ul>
                                    <div class="nav-item">
                                        <a href="<?= base_url('auth') ?>" class="btn btn-outline-warning"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </nav>

    <!--==============================
    =            Services            =
    ===============================-->
    <section class="service pt-4">
        <div class="container">
            <div class="row justify-content-center" id="cek">
                <div class="col-12 text-center">
                    <div class="card">
                        <h1 id="heading" class="mt-2">Registrasi</h1>
                        <form id="msform" action="<?= base_url('landing_page/diagnosa') ?>" method="post">
                            <div class="form-card">
                                <div class="row">
                                    <div class="col">
                                        <label for="nama">Nama Itik :</label>
                                        <input type="text" class="form-control main-form mb-3" id="nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="umur">Umur Itik :</label>
                                        <select class="form-control main-form mb-3" id="umur" name="umur" required>
                                            <option value=""></option>
                                            <?php for ($i = 1; $i <= 96; $i++) { ?>
                                                <option value="<?= $i ?>"><?= $i == 1 ? '<=' : '' ?><?= $i ?> Minggu</option>
                                            <?php } ?>
                                        </select>
                                        <label for="no_hp">No. Telp Pemilik :</label>
                                        <input type="text" class="form-control main-form mb-3" id="no_hp" name="no_hp" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="alamat">Alamat :</label>
                                        <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control main-form" required></textarea>
                                    </div>
                                </div>

                            </div>
                            <h1 id="heading" class="mt-2">Pilih Gejala yang sedang dialami Itik</h1>
                            <div class="form-card">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">

                                        <thead class="text-center">
                                            <th>#</th>
                                            <th>Kode</th>
                                            <th>Gejala</th>
                                            <th>Pilihan</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($gejala as $item) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $item['kode_gejala']; ?></td>
                                                    <td>Apakah <b><?= $item['nama_gejala'] ?>?</b></td>
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

                                    </table>
                                </div>
                            </div>
                            <input type="submit" class="finish action-button-finish" data-toggle="tooltip" data-placement="top" title="Klik disini untuk melihat hasil diagnosa" name="submit" value="Diagnosis" style="font-family:Arial, FontAwesome">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====  End of Services  ====-->

    <!--============================
    =            Footer            =
    =============================-->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">Copyright &copy; Itik Healthy App - 2024</p>
        </div>
    </div>

    <!-- Button trigger modal -->

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
                alert('Pilih Tingkat Keyakinan pada Gejala yang dialami Minimal Satu');
                event.preventDefault();
            } else {
                event.submit();
            }
        });
    </script>
</body>

</html>