<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Gejala</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a> -->
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah_gejala"><i class="fas fa-plus-circle mr-2"></i>Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead class="text-center">
                        <th>#</th>
                        <th>Kode</th>
                        <th>Gejala</th>
                        <th><i class="fas fa-cogs"></i></th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($gejala as $item) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $item['kode_gejala']; ?></span></td>
                                <td><?= $item['nama_gejala']; ?></span></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Opsi">
                                        <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#edit_gejala<?= $item['id_gejala'] ?>" data-toggle="tooltip" data-placement="right" title="Edit gejala"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="<?= base_url('gejala/hapus/' . $item['id_gejala']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus gejala ?')" class="btn btn-sm btn-danger shadow-sm" data-toggle="tooltip" data-placement="right" title="Hapus gejala"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal tambah gejala -->
    <div class="modal fade" id="tambah_gejala" tabindex="-1" role="dialog" aria-labelledby="tambah_gejalaLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah_gejalaLabel">Tambah Data Gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('gejala/tambah') ?>" method="post">
                        <label for="kode_gejala">Kode :</label>
                        <input type="text" class="form-control mb-3" id="kode_gejala" name="kode_gejala" value="<?= $kode_gejala_auto ?>" readonly required>
                        <label for="nama_gejala">Nama Gejala :</label>
                        <textarea name="nama_gejala" id="nama_gejala" cols="30" rows="10" class="form-control" required></textarea>
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

    <!-- Modal edit gejala -->
    <?php foreach ($gejala as $item) { ?>
        <div class="modal fade" id="edit_gejala<?= $item['id_gejala'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_gejalaLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit_gejalaLabel">Edit Data Gejala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('gejala/edit') ?>" method="post">
                            <label for="kode_gejala">Kode :</label>
                            <input type="hidden" class="form-control mb-3" id="id_gejala" name="id_gejala" value="<?= $item['id_gejala'] ?>" required readonly>
                            <input type="text" class="form-control mb-3" id="kode_gejala" name="kode_gejala" value="<?= $item['kode_gejala'] ?>" required readonly>
                            <label for="nama_gejala">Nama Gejala :</label>
                            <textarea name="nama_gejala" id="nama_gejala" cols="30" rows="10" class="form-control" required><?= $item['nama_gejala'] ?></textarea>
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