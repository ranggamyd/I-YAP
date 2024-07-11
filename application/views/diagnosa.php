<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cek Diagnosa</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a> -->
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"></h4>
        <p><i class="fas fa-exclamation-triangle mr-1"></i><b>Perhatian !</b></p>
        <p class="mb-0">Silahkan memilih gejala sesuai dengan kondisi pada anak, anda dapat memilih
            kepastian kondisi pada anak dari pasti tidak sampai pasti ya, jika sudah tekan tombol proses di
            bawah untuk melihat hasil.</p>
    </div>

    <div class="card shadow-sm mb-3">
        <form action="<?= base_url('diagnosa/cek_diagnosa') ?>" method="post">
            <div class="card-header">
                <!-- <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah_diagnosa"><i
                    class="fas fa-plus-circle mr-2"></i>Tambah data</a> -->
                <div class="row">
                    <div class="col-md-6">
                        <select name="id_pasien" id="id_pasien" class="form-control" required>
                            <!-- <option value="" readonly>--PILIH--</option> -->
                            <?php foreach ($pasien as $p) : ?>
                                <option value="<?= $p['id_pasien'] ?>"><?= $p['nama'] ?></option>
                            <?php endforeach ?>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-6">
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
                                    <td><?= $item['nama_gejala'] ?></td>
                                    <td>
                                        <select name="kondisi[]" id="kondisi[]" class="form-control">
                                            <option value="0" readonly>-- PILIH --</option>
                                            <?php foreach ($kondisi as $k) : ?>
                                                <option value="<?= $item['id_gejala'] . '_' . $k['id_kondisi']; ?>"><?= $k['nama_kondisi']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <button class="float" type="submit" data-toggle="tooltip" data-placement="top" title="Klik disini untuk melihat hasil diagnosa" name="submit"><i class="fas fa-search mr-2"></i>Diagnosa</button>
                    </table>
                </div>
            </div>
        </form>
    </div>

</div>