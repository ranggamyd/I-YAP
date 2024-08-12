<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Analisis Perbandingan Berdasarkan Penyakit</h1>
    </div>

    <div class="row">
        <div class="col-10">
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-primary">

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="dataTable">
                            <thead>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Penyakit</th>
                                <th>Analisis</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($penyakit as $item) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item['kode_penyakit'] ?></td>
                                        <td><?= $item['nama_penyakit'] ?></td>
                                        <td><a href="<?= base_url('matriks/perbandingan/' . $item['id_penyakit']) ?>" class="btn btn-sm btn-outline-primary shadow-sm" data-toggle="tooltip" data-placement="right" title="Matriks perbandingan"><i class="fa fa-fw fa-eye mr-2"></i>Analisis Perbandingan</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>