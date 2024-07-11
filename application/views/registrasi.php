<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrasi Pasien</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a> -->
    </div>

    <div class="row mb-4">
        <div class="col-8">
            <div class="card shadow-sm ">

                <div class="card-header bg-primary">
                    <!-- <h5 class="text-white">Masukan data yang sesuai</h5> -->
                </div>
                <div class="card-body">
                    <form action="<?= base_url('pasien/tambah') ?>" method="post">
                        <label for="nama">Nama :</label>
                        <input type="text" class="form-control mb-3" id="nama" name="nama" required>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="jenis_kelamin">Jenis Kelamin :</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control mb-3" required>
                                    <option value="" readonly>--PILIH--</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="umur">Umur :</label>
                                <input type="text" class="form-control mb-3" id="umur" name="umur" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="tinggi_badan">Tinggi Badan :</label>
                                <input type="text" class="form-control mb-3" id="tinggi_badan" name="tinggi_badan" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="berat_badan">Berat Badan :</label>
                                <input type="text" class="form-control mb-3" id="berat_badan" name="berat_badan" required>
                            </div>
                        </div>
                        <label for="nama_orangtua">Nama Orangtua :</label>
                        <input type="text" class="form-control mb-3" id="nama_orangtua" name="nama_orangtua" required>
                        <label for="alamat">Alamat :</label>
                        <textarea name="alamat" id="alamat" cols="10" rows="4" class="form-control"></textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i> Simpan</button>
                    <button type="reset" class="btn btn-outline-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>