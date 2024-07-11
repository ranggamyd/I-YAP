<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Analisa Kriteria(Gejala) Matriks AHP</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a> -->
    </div>

    <!-- <form method="post" action="<?php echo site_url('controller/simpan_perbandingan_subkriteria'); ?>">
        <div class="table-responsive mb-4">
            <table>
                <thead>
                    <tr class="text-center">
                        <th>Kriteria</th>
                        <?php
                        $this->db->from('rule');
                        $this->db->join('gejala', 'gejala.id_gejala = rule.id_gejala');
                        $this->db->where('rule.id_penyakit', 1);
                        $query = $this->db->get();
                        $result = $query->result_array();

                        foreach ($result as $k) { ?>
                            <th><?php echo $k['kode_gejala']; ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $k1) { ?>
                        <tr class="text-center">
                            <th><?php echo $k1['kode_gejala']; ?></th>
                            <?php foreach ($result as $k2) { ?>
                                <td>
                                    <input class="hitung" type="number" name="perbandingan[<?php echo $k1['kode_gejala']; ?>][<?php echo $k2['kode_gejala']; ?>]" id="perbandingan[<?php echo $k1['kode_gejala']; ?>][<?php echo $k2['kode_gejala']; ?>]" min="1" max="9" required>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4"><button type="submit" class="btn btn-fill btn-info mt-3"><i class="fas fa-calculator"></i>&nbsp&nbspKalkulasi</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form> -->

    <?php
    $no = 1;
    $colors = ["bg-primary", "bg-success", "bg-danger", "bg-warning", "badge-info"];
    foreach ($penyakit as $item) {
    ?>
        <div class="card shadow mb-3">
            <a href="#penyakit<?= $item['id_penyakit'] ?>" class="d-block collapsed card-header <?= $colors[array_rand($colors)] ?> py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="penyakit<?= $item['id_penyakit'] ?>">
                <h6 class="m-0 font-weight-bold text-light"><?= $item['nama_penyakit'] ?></h6>
            </a>

            <div class="collapse" id="penyakit<?= $item['id_penyakit'] ?>">
                <div class="card-body">
                    <form action="<?php echo base_url('matriks/analisa'); ?>" method="post">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 35%;">Kriteria A</th>
                                    <th style="width: 35%;" class="text-center">Syarat</th>
                                    <th style="width: 35%;">Kriteria B</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = $item['id_penyakit'];

                                $query = $this->db->select('rule.id_gejala')
                                    ->select('kode_gejala')
                                    ->from('rule')
                                    ->join('gejala', 'gejala.id_gejala=rule.id_gejala')
                                    ->where('rule.id_penyakit', $a)
                                    ->order_by('kode_gejala', 'DESC')
                                    ->limit(1)
                                    ->get();

                                $result = $query->result_array();

                                // var_dump($result);
                                foreach ($result as $key) { //foreach ambil dari tabel atas (ngambil array terakhir)

                                    $query = $this->db->join('gejala', 'gejala.id_gejala=rule.id_gejala')
                                        ->where('id_penyakit', $a)
                                        ->get('rule');

                                    $rules = $query->result_array();

                                    foreach ($rule as $rl) : //foreach ambil dari Controller (buat Kriteria A)
                                        $re = $key['id_gejala'];
                                        $ra = $rl['id_gejala'];
                                        for ($i = 1; $i <= $re; $i++) {
                                            $jid = ($i);
                                            $jo = $jid;

                                            $query = $this->db->select('rule.id_gejala')
                                                ->select('nama_gejala')
                                                ->select('kode_gejala')
                                                ->from('rule')
                                                ->join('gejala', 'gejala.id_gejala=rule.id_gejala')
                                                ->where('rule.id_gejala', $jo)
                                                ->where('rule.id_penyakit', $a)
                                                ->get();

                                            $result = $query->result_array();

                                            foreach ($result as $bc) {
                                                if ($i == $ra) { ?>
                                                    <tr hidden>
                                                        <td><input type="text" name="C[<?php echo $ra . $jid; ?>]" value="<?php echo $ra; ?>"><?php echo $rl['id_gejala']; ?></td>
                                                        <td><input type="text" name="W[<?php echo $ra . $jid; ?>]" value="1"> </td>
                                                        <td><input type="text" id="" name="X[<?php echo $ra . $jid; ?>]" value="<?php echo $jo; ?>"><?php echo $bc['id_gejala']; ?></td>
                                                        <!--input id-->
                                                        <td><input type="text" name="" value="<?php echo $ra . $jid; ?>"></td>
                                                    </tr>
                                                <?php
                                                } else if ($ra < $i) { ?>
                                                    <tr>
                                                        <td style="font-size:15px;"><input type="text" name="C[<?php echo $ra . $jid; ?>]" value="<?php echo $ra; ?>" hidden><?php echo $rl['kode_gejala']; ?> - <?php echo $rl['nama_gejala']; ?></td>
                                                        <td><select required class="calculate form-control" id="W<?php echo $ra . $jid; ?>" class="" name="W[<?php echo $ra . $jid; ?>]">
                                                                <!-- <option value="">--</option> -->
                                                                <?php
                                                                $this->db->from('nilai');
                                                                $query = $this->db->get();
                                                                $nilt = $query->result();
                                                                foreach ($nilt as $keyval) { ?>
                                                                    <option value="<?php echo $keyval->jum_nilai; ?>"><?php echo $keyval->jum_nilai; ?> - <?php echo $keyval->ket_nilai; ?></option>
                                                                <?php } ?>
                                                            </select></td>
                                                        <td style="font-size:15px;"><input type="text" id="" name="X[<?php echo $ra . $jid; ?>]" value="<?php echo $jo; ?>" hidden><?php echo $bc['kode_gejala']; ?> - <?php echo $bc['nama_gejala']; ?></td>
                                                        <!--buat input id-->
                                                        <td><input type="text" id="<?php echo $ra . $jid; ?>" name="" value="<?php echo $ra . $jid; ?>" hidden></td>
                                                        <script type="text/javascript">
                                                            $(document).ready(function() {
                                                                $('.calculate').bind("change", function(e) {
                                                                    var st = parseFloat($('#W<?php echo $ra . $jid; ?>').val()) || 0;
                                                                    var value = 1 / st;
                                                                    if (!isNaN(value) && value !== Infinity) {
                                                                        $('#W<?php echo $jid . $ra; ?>').val(value);
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                    </tr>
                                                <?php
                                                } else {
                                                ?>
                                                    <tr hidden>
                                                        <td><input type="text" name="C[<?php echo $ra . $jid; ?>]" value="<?php echo $ra; ?>"></td>
                                                        <td><input id="W<?php echo $ra . $jid; ?>" name="W[<?php echo $ra . $jid; ?>]" type="text" value=""> </td>
                                                        <td><input type="text" name="X[<?php echo $ra . $jid; ?>]" value="<?php echo $jid; ?>"></td>
                                                        <td><input type="text" name="" value="<?php echo $ra . $jid; ?>"></td>
                                                    </tr>
                                <?php }
                                            }
                                        }
                                    endforeach;
                                } ?>
                                <tr>
                                    <td colspan="4"><input value="Kalkulasi" type="submit" class="btn btn-fill btn-info" id="<?= $item['id_penyakit'] ?>" name="<?= $item['id_penyakit'] ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>

    <?php } ?>

    <!-- <div class=" card shadow-sm mb-3">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="<?php echo base_url('matriks/analisa'); ?>" method="post">
                <div class="row">
                    <div class="col-2">
                        <h4>Pilih Penyakit:</h4>
                    </div>
                    <div class="col-6">
                        <select name="id_penyakit" id="id_penyakit" class="form-control" onchange="myfunction()">
                            <option value="" readonly>--PILIH--</option>
                            <?php foreach ($penyakit as $p) : ?>
                                <option value="<?= $p['id_penyakit'] ?>"><?= $p['nama_penyakit'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <hr>
                <?php
                if (isset($_GET['a'])) {
                    $val = $_GET['a'];
                } else {
                    $val = 0;
                }
                $this->db->select('nama_penyakit');
                $this->db->from('penyakit');
                $this->db->where('id_penyakit', $val);
                $query = $this->db->get();
                $nm = $query->result_array();
                ?>
                <?php foreach ($nm as $nmp) : ?>
                    <h4>Analisa perbandingan Gejala Penyakit <b class="text-primary"><?= $nmp['nama_penyakit'] ?></b></h4>
                <?php endforeach ?>
                <hr>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th style="width: 35%;">Kriteria A</th>
                            <th style="width: 35%;" class="text-center">Syarat</th>
                            <th style="width: 35%;">Kriteria B</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['a'])) {
                            $val = $_GET['a'];
                        } else {
                            $val = 0;
                        }
                        //tabel gejala
                        $this->db->select('id_gejala');
                        $this->db->from('rule');
                        $this->db->where('rule.id_penyakit', $val);
                        $this->db->order_by('id_gejala', 'DESC');
                        $this->db->limit(1);
                        $query = $this->db->get();
                        $result = $query->result_array();
                        foreach ($result as $key) { //foreach ambil dari tabel atas (ngambil array terakhir)
                            foreach ($gejala as $rl) : //foreach ambil dari Controller (buat Kriteria A)
                                $re = $key['id_gejala'];
                                $ra = $rl['id_gejala'];
                                for ($i = 1; $i <= $re; $i++) {
                                    $jid = ($i);
                                    $jo = $jid;
                                    $this->db->select('rule.id_gejala');
                                    $this->db->from('rule');
                                    $this->db->join('gejala', 'gejala.id_gejala = rule.id_gejala');
                                    $this->db->where('rule.id_gejala', $jo);
                                    // $this->db->where('rule.id_penyakit', $val);
                                    $query = $this->db->get();
                                    $result = $query->result_array();
                                    foreach ($result as $bc) {
                                        if ($i == $ra) {
                        ?>
                                            <tr hidden>
                                                <td><input type="text" name="C[<?php echo $ra . $jid; ?>]" value="<?php echo $ra; ?>"><?php echo $rl['id_gejala']; ?></td>
                                                <td><input type="text" name="W[<?php echo $ra . $jid; ?>]" value="1"> </td>
                                                <td><input type="text" id="" name="X[<?php echo $ra . $jid; ?>]" value="<?php echo $jo; ?>"><?php echo $bc['id_gejala']; ?></td>
                                                <td><input type="text" name="" value="<?php echo $ra . $jid; ?>"></td>
                                            </tr>
                                        <?php
                                        } else if ($ra < $i) { ?>
                                            <tr>
                                                <td style="font-size:15px;"><input type="text" name="C[<?php echo $ra . $jid; ?>]" value="<?php echo $ra; ?>" hidden><?php echo $rl['nama_gejala']; ?></td>
                                                <td><select required class="calculate form-control" id="W<?php echo $ra . $jid; ?>" class="" name="W[<?php echo $ra . $jid; ?>]">
                                                        <?php
                                                        $this->db->from('nilai');
                                                        $query = $this->db->get();
                                                        $nilt = $query->result();
                                                        foreach ($nilt as $keyval) { ?>
                                                            <option value="<?php echo $keyval->jum_nilai; ?>"><?php echo $keyval->jum_nilai; ?> - <?php echo $keyval->ket_nilai; ?></option>
                                                        <?php } ?>
                                                    </select></td>
                                                <td style="font-size:15px;"><input type="text" id="" name="X[<?php echo $ra . $jid; ?>]" value="<?php echo $jo; ?>" hidden><?php echo $bc['nama_gejala']; ?></td>
                                                <td><input type="text" id="<?php echo $ra . $jid; ?>" name="" value="<?php echo $ra . $jid; ?>" hidden></td>
                                                <script type="text/javascript">
                                                    $(document).ready(function() {
                                                        $('.calculate').bind("change", function(e) {
                                                            var st = parseFloat($('#W<?php echo $ra . $jid; ?>').val()) || 0;
                                                            var value = 1 / st;
                                                            if (!isNaN(value) && value !== Infinity) {
                                                                $('#W<?php echo $jid . $ra; ?>').val(value);
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </tr>
                                        <?php
                                        } else {
                                        ?>
                                            <tr hidden>
                                                <td><input type="text" name="C[<?php echo $ra . $jid; ?>]" value="<?php echo $ra; ?>"></td>
                                                <td><input id="W<?php echo $ra . $jid; ?>" name="W[<?php echo $ra . $jid; ?>]" type="text" value=""> </td>
                                                <td><input type="text" name="X[<?php echo $ra . $jid; ?>]" value="<?php echo $jid; ?>"></td>
                                                <td><input type="text" name="" value="<?php echo $ra . $jid; ?>"></td>
                                            </tr>
                        <?php }
                                    }
                                }
                            endforeach;
                        } ?>
                        <tr>
                            <td colspan="4"><button type="submit" class="btn btn-fill btn-info"><i class="fas fa-calculator"></i>&nbsp&nbspKalkulasi</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div> -->

</div>

<!-- <script>
    $(document).ready(function() {
        // Fungsi untuk menghitung matriks perbandingan subkriteria
        function hitungMatriks() {
            var rows = $('tbody tr');
            var matriks = [];

            // Loop melalui setiap baris tabel
            rows.each(function() {
                var row = $(this);
                var nilai = [];

                // Loop melalui setiap kolom pada baris saat ini
                row.find('input').each(function() {
                    var input = $(this);
                    nilai.push(parseInt(input.val()));
                });

                matriks.push(nilai);
            });

            var totalKolom = matriks[0].length;
            var totalBaris = matriks.length;
            var totalBobot = [];

            // Hitung total bobot per kolom
            for (var kolom = 0; kolom < totalKolom; kolom++) {
                var bobotKolom = 0;

                for (var baris = 0; baris < totalBaris; baris++) {
                    bobotKolom += matriks[baris][kolom];
                }

                totalBobot.push(bobotKolom);
            }

            // Hitung matriks normalisasi
            var matriksNormalisasi = [];

            for (var baris = 0; baris < totalBaris; baris++) {
                var nilaiNormalisasi = [];

                for (var kolom = 0; kolom < totalKolom; kolom++) {
                    var bobotKolom = totalBobot[kolom];
                    var nilai = matriks[baris][kolom] / bobotKolom;
                    nilaiNormalisasi.push(nilai);
                }

                matriksNormalisasi.push(nilaiNormalisasi);
            }

            // Tampilkan hasil pada console
            console.log('Matriks Perbandingan Subkriteria:');
            console.log(matriks);
            console.log('Total Bobot:');
            console.log(totalBobot);
            console.log('Matriks Normalisasi:');
            console.log(matriksNormalisasi);
        }

        // Panggil fungsi hitungMatriks saat tombol submit ditekan
        $('form').on('submit', function(event) {
            event.preventDefault();
            hitungMatriks();
        });
    });
</script> -->