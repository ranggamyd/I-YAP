<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Rule</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a> -->
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah_rule"><i class="fas fa-plus-circle mr-2"></i>Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead class="text-center">
                        <th>#</th>
                        <th>Penyakit</th>
                        <th>Gejala</th>
                        <th>CF Pakar</th>
                        <!-- <th>CF User (Bobot AHP)</th> -->
                        <th><i class="fas fa-cogs"></i></th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($rule as $item) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $item['kode_penyakit']; ?> - <?= $item['nama_penyakit']; ?></span></td>
                                <td><?= $item['kode_gejala'] ?> - <?= $item['nama_gejala'] ?></td>
                                <td class="text-center"><?= $item['cf_pakar'] ?></td>
                                <!-- <td class="text-center"><?= $item['cf_pakar'] ?></td> -->
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Opsi">
                                        <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#edit_rule<?= $item['id_rule'] ?>" data-toggle="tooltip" data-placement="right" title="Edit rule"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="<?= base_url('rule/hapus/' . $item['id_rule']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus rule ?')" class="btn btn-sm btn-danger shadow-sm" data-toggle="tooltip" data-placement="right" title="Hapus rule"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal tambah rule -->
    <div class="modal fade" id="tambah_rule" tabindex="-1" role="dialog" aria-labelledby="tambah_ruleLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah_ruleLabel">Tambah Data Rule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('rule/tambah') ?>" method="post">
                    <div class="modal-body">
                        <label for="nama">Penyakit :</label>
                        <select name="id_penyakit" id="addRule" id="id_penyakit" class="form-control mb-3" required>
                            <option value="" readonly>-- PILIH --</option>
                            <?php foreach ($penyakit as $p) : ?>
                                <option value="<?= $p['id_penyakit'] ?>"><?= $p['kode_penyakit']; ?> - <?= $p['nama_penyakit'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <label for="nama" class="mt-3">Gejala :</label>
                        <?php foreach ($gejala as $g) : ?>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="id_gejala[]" value="<?= $g['id_gejala'] ?>" class="custom-control-input" id="<?= $g['id_gejala'] ?>">
                                <label class="custom-control-label" for="<?= $g['id_gejala'] ?>"><?= $g['kode_gejala']; ?> - <?= $g['nama_gejala'] ?></label>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-secondary"><i class="fas fa-undo mr-1"></i>
                            Reset</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal edit rule -->
    <?php foreach ($rule as $item) { ?>
        <div class="modal fade" id="edit_rule<?= $item['id_rule'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_ruleLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit_ruleLabel">Edit Data Rule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('rule/edit') ?>" method="post">
                        <div class="modal-body">
                            <input type="hidden" class="form-control mb-3" id="id_rule" value="<?= $item['id_rule'] ?>" name="id_rule" required>
                            <label for="nama">Penyakit :</label>
                            <select name="id_penyakit" id="id_penyakit" class="form-control mb-3" required>
                                <option value="<?= $item['id_penyakit'] ?>"><?= $item['kode_penyakit']; ?> - <?= $item['nama_penyakit'] ?></option>
                                <option value="" readonly>-- PILIH --</option>
                                <?php foreach ($penyakit as $p) : ?>
                                    <option value="<?= $p['id_penyakit'] ?>"><?= $p['kode_penyakit']; ?> - <?= $p['nama_penyakit'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <label for="nama" class="mt-1">Gejala :</label>
                            <?php foreach ($gejala as $g) : ?>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="id_gejala" value="<?= $g['id_gejala'] ?>" class="custom-control-input" id="edit-<?= $g['id_gejala'] ?>" <?= $item['id_gejala'] == $g['id_gejala'] ? 'checked' : '' ?>>
                                    <label class="custom-control-label" for="edit-<?= $g['id_gejala'] ?>"><?= $g['kode_gejala']; ?> - <?= $g['nama_gejala'] ?></label>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-outline-secondary"><i class="fas fa-undo mr-1"></i>
                                Reset</button>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>

</div>