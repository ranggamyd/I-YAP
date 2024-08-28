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

</head>

<body>
    <!--header section start -->
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
                        </ul>
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
        <!--banner section start -->
        <div class="banner_section layout_padding">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 72.35vh;">
                        <div class="container mb-2">
                            <div class="banner_taital_main">
                                <div class="row mb-5">
                                    <div class="col-md-6 mb-5">
                                        <h3 class="banner_taital">Selamat Datang di I-YAP<br />(Itik Healthy App)</h3>
                                        <p class="banner_text mb-4">Menggunakan Metode AHP & CF</p>
                                        <br />
                                        <!-- <p class="banner_text">Malnutrisi adalah salah satu kondisi yang berbahaya, yakni ketika seseorang mengalami ketidakseimbangan nutrisi dalam tubuhnya.</p> -->
                                        <div class="btn_main">
                                            <div class="about_bt"><a href="<?= base_url('landing_page/diagnosa') ?>">Mulai Diagnosis</a></div>
                                            <!-- <div class="quote_bt"><a href="#">Get A Quote</a></div> -->
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <div class="image_1 mb-5" style="width: 100%"><img src="<?= base_url('assets') ?>/img/gratisography-duck-doctor-free-stock-photo.jpg" /></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--banner section end -->
    </div>

    <!-- copyright section start -->
    <div class="fixed-bottom" style="background-color: rgba(255, 255, 255, 0.2);">
        <div class="container">
            <p class="copyright_text text-light">Copyright &copy; Itik Healthy App - 2024</p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="<?= base_url('assets') ?>/front/js/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/js/popper.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/js/jquery-3.0.0.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="<?= base_url('assets') ?>/front/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= base_url('assets') ?>/front/js/custom.js"></script>
    <!-- javascript -->
    <script src="<?= base_url('assets') ?>/front/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>