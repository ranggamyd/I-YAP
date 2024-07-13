<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a> -->
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah_pasien"><i class=" fas fa-plus-circle mr-2"></i>Tambah data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead class="text-center">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th><i class="fas fa-cogs"></i></th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pasien as $item) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $item['nama']; ?></span></td>
                                <td><?= $item['umur'] ?></td>
                                <td><?= $item['no_hp'] ?></td>
                                <td><?= $item['alamat'] ?></td>
                                <td class="text-center">
                                    <?php if ($this->session->userdata('id_admin') == 1) : ?>
                                        <div class="btn-group" role="group" aria-label="Opsi">
                                            <!-- <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#edit_pasien<?= $item['id_pasien'] ?>" data-toggle="tooltip" data-placement="right" title="Edit pasien"><i class="fa fa-fw fa-edit"></i></a> -->
                                            <a href="<?= base_url('pasien/hapus/' . $item['id_pasien']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus pasien ini ?')" class="btn btn-sm btn-danger shadow-sm" data-toggle="tooltip" data-placement="right" title="Hapus pasien"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal tambah pasien -->
    <div class="modal fade" id="tambah_pasien" tabindex="-1" role="dialog" aria-labelledby="tambah_pasienLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah_pasienLabel">Tambah pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pasien/tambah1') ?>" method="post">
                        <label for="nama">Nama :</label>
                        <input type="text" class="form-control mb-3" id="nama" name="nama" required>
                        <label for="umur">Umur :</label>
                        <input type="text" class="form-control mb-3" id="umur" name="umur" required>
                        <label for="no_hp">No. HP :</label>
                        <input type="text" class="form-control mb-3" id="no_hp" name="no_hp" required>
                        <label for="alamat">Alamat :</label>
                        <textarea name="alamat" id="alamat" cols="10" rows="4" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal edit pasien -->
    <!-- <?php foreach ($pasien as $item) { ?>
        <div class="modal fade" id="edit_pasien<?= $item['id_pasien'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_pasienLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit_pasienLabel">Edit pasien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('pasien/edit') ?>" method="post">
                            <label for="nama">Nama :</label>
                            <input type="hidden" class="form-control mb-3" id="id_pasien" name="id_pasien" value="<?= set_value('id_pasien', $item['id_pasien']) ?>" required>
                            <input type="text" class="form-control mb-3" id="nama" name="nama" value="<?= set_value('nama', $item['nama']) ?>" required>
                            <label for="umur">Umur :</label>
                            <input type="text" class="form-control mb-3" id="umur" name="umur" value="<?= set_value('umur', $item['umur']) ?>" required>
                            <label for="no_hp">No. HP :</label>
                            <input type="text" class="form-control mb-3" id="no_hp" name="no_hp" value="<?= set_value('no_hp', $item['nama_orangtua']) ?>" required>
                            <label for="alamat">Alamat :</label>
                            <textarea name="alamat" id="alamat" cols="10" rows="4" class="form-control"><?= $item['alamat'] ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i> Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?> -->
</div>