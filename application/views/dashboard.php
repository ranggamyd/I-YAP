<div class="container-fluid">
    <h1 class="h1 mb-3 text-gray-800" style="font-family: rockwell;">Selamat Datang</h1>
    <h3 class="h3 mb-0 text-gray-800" style="font-family: rockwell;">di Sistem Diagnosis Penyakit Itik</h3><br>
    <h5 class="h5 mb-0 text-gray-800" style="font-family: rockwell;">Metode Analytical Hierarchy Process & Metode Certainty Factor</h5>
    <br><br>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Penyakit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->db->count_all('penyakit') ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-biohazard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Gejala</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->db->count_all('gejala') ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-virus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Riwayat Pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->db->count_all('hasil') ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->db->count_all('admin') ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
</div>