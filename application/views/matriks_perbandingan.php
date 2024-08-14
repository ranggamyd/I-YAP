<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <?php
    $colors = ["bg-primary", "bg-success", "bg-danger", "bg-warning", "badge-info"];
    foreach ($penyakit as $pe) :
        $id_penyakit = $pe['id_penyakit'];
        $nama_penyakit = $pe['nama_penyakit'];
    ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perbandingan Alternatif (Gejala) pada Penyakit</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a> -->
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> -> <strong><?= $nama_penyakit ?></strong></h1>
        </div>

        <div class="card shadow mb-3">
            <a href="#penyakit" class="d-block collapsed card-header bg-primary py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="penyakit">
                <h5 class="m-0 font-weight-bold text-light">Analisis Perbandingan Gejala pada Penyakit <?= $nama_penyakit ?></h5>
            </a>

            <div class="collapse show" id="penyakit">
                <div class="card-body">
                    <form action="<?php echo base_url('matriks/analisa/') . $id_penyakit; ?>" method="post">
                        <input type="hidden" value="<?= $id_penyakit ?>" name="id_penyakit">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 35%;">Gejala A</th>
                                    <th style="width: 35%;" class="text-center">Skala Perbandingan</th>
                                    <th style="width: 35%;">Gejala B</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = $id_penyakit;

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

                                    $query = $this->db->select('rule.id_gejala')
                                        ->select('kode_gejala')
                                        ->select('nama_gejala')
                                        ->join('gejala', 'gejala.id_gejala=rule.id_gejala')
                                        ->where('id_penyakit', $a)
                                        ->get('rule');

                                    $rules = $query->result_array();

                                    foreach ($rules as $rl) : //foreach ambil dari Controller (buat Kriteria A)
                                        $re = $key['id_gejala'];
                                        $ra = $rl['id_gejala'];
                                        for ($i = 1; $i <= $re; $i++) {
                                            $jid = $i;
                                            $jo = $jid;

                                            $query = $this->db->select('rule.id_gejala')
                                                ->select('nama_gejala')
                                                ->select('kode_gejala')
                                                ->from('rule')
                                                ->join('gejala', 'gejala.id_gejala=rule.id_gejala')
                                                ->where('rule.id_gejala', $jo)
                                                ->where('rule.id_penyakit', $a)
                                                ->order_by('kode_gejala', 'ASC')
                                                ->get();

                                            $result = $query->result_array();

                                            foreach ($result as $bc) {
                                                if ($i == $ra) { ?>
                                                    <tr hidden>
                                                        <td><input type="hidden" name="C[<?php echo $ra . $jid; ?>]" value="<?php echo $ra; ?>"><?php echo $rl['kode_gejala']; ?></td>
                                                        <td><input type="hidden" name="W[<?php echo $ra . $jid; ?>]" value="1"> </td>
                                                        <td><input type="hidden" id="" name="X[<?php echo $ra . $jid; ?>]" value="<?php echo $jo; ?>"><?php echo $bc['kode_gejala']; ?></td>

                                                        <td><input type="hidden" name="" value="<?php echo $ra . $jid; ?>"></td>
                                                    </tr>
                                                <?php
                                                } else if ($ra < $i) { ?>
                                                    <tr>
                                                        <td style="font-size:15px;"><input type="hidden" name="C[<?php echo $ra . $jid; ?>]" value="<?php echo $ra; ?>" hidden><?php echo $rl['kode_gejala']; ?> - <?php echo $rl['nama_gejala']; ?></td>
                                                        <td><select required class="calculate form-control" id="W<?php echo $ra . $jid; ?>" class="" name="W[<?php echo $ra . $jid; ?>]">
                                                                <option value="">--PILIH SKALA PERBANDINGAN--</option>
                                                                <?php
                                                                $this->db->order_by('id_nilai', 'DESC');
                                                                $this->db->from('nilai');
                                                                $query = $this->db->get();
                                                                $nilt = $query->result();
                                                                foreach ($nilt as $keyval) { ?>
                                                                    <option value="<?php echo $keyval->jum_nilai; ?>"><?php echo $keyval->jum_nilai; ?> - <?php echo $keyval->ket_nilai; ?></option>
                                                                <?php } ?>
                                                            </select></td>
                                                        <td style="font-size:15px;"><input type="hidden" id="" name="X[<?php echo $ra . $jid; ?>]" value="<?php echo $jo; ?>" hidden><?php echo $bc['kode_gejala']; ?> - <?php echo $bc['nama_gejala']; ?></td>

                                                        <td><input type="hidden" id="<?php echo $ra . $jid; ?>" name="" value="<?php echo $ra . $jid; ?>" hidden></td>
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
                                                        <td><input type="hidden" name="C[<?php echo $ra . $jid; ?>]" value="<?php echo $ra; ?>"></td>
                                                        <td><input id="W<?php echo $ra . $jid; ?>" name="W[<?php echo $ra . $jid; ?>]" type="hidden" value=""> </td>
                                                        <td><input type="hidden" name="X[<?php echo $ra . $jid; ?>]" value="<?php echo $jid; ?>"></td>
                                                        <td><input type="hidden" name="" value="<?php echo $ra . $jid; ?>"></td>
                                                    </tr>
                                <?php }
                                            }
                                        }
                                    endforeach;
                                } ?>
                                <tr>
                                    <td colspan="4"><input value="Kalkulasi" type="submit" class="btn btn-fill btn-info" id="<?= $id_penyakit ?>" name="<?= $id_penyakit ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>




        <div class="card shadow mb-3">
            <a href="#matriks" class="d-block collapsed card-header bg-info py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="matriks">
                <h5 class="m-0 font-weight-bold text-light">Matriks Perbandingan Gejala Penyakit <?= $nama_penyakit ?></h5>
            </a>

            <div class="collapse" id="matriks">
                <div class="card-body">

                    <div class="card shadow-sm mb-3">
                        <?php
                        // $this->db->from('gejala');
                        // $query = $this->db->get();
                        // $listKrit = $query->result();
                        $query = $this->db->select('rule.id_gejala')
                            ->select('kode_gejala')
                            ->select('nama_gejala')
                            ->from('rule')
                            ->join('gejala', 'gejala.id_gejala=rule.id_gejala')
                            ->where('rule.id_penyakit', $id_penyakit)
                            ->order_by('kode_gejala', 'ASC')
                            ->get();
                        $listKrit = $query->result();
                        ?>
                        <!-- Analisa -->
                        <div class="card card-header">
                            <h4 class="title">Tabel Analisa Kriteria(Gejala) </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <?php
                                            foreach ($listKrit as $kr) { ?>
                                                <th><?= $kr->kode_gejala; ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listKrit as $bc) :
                                        ?>
                                            <tr>
                                                <?php
                                                $this->db->from('analisa_krit');
                                                $this->db->where('kriteria_x', $bc->id_gejala);
                                                $this->db->where('id_penyakit', $id_penyakit);
                                                $query = $this->db->get();
                                                $anK = $query->result();
                                                ?>
                                                <td><b><?= $bc->kode_gejala; ?></b></td>
                                                <?php foreach ($anK as $at) :
                                                    // $pt = explode("C",$at->kriteria_x);
                                                    // $ps = explode("C",$at->kriteria_y);
                                                    $re = $at->kriteria_y;
                                                    $rf = $at->kriteria_x;
                                                ?>
                                                    <td class="calculate<?= $re; ?>" id="R<?= $re . $rf; ?>"><?= $at->nilai_krit; ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td class="bg-info text-white"><b>Jumlah</b></td>
                                            <?php
                                            foreach ($listKrit as $tt) :
                                                $pt = explode("C", $tt->id_gejala);
                                                $re = $tt->id_gejala;
                                            ?>
                                                <td class="bg-info text-white" id="sumR<?= $re; ?>"></td>
                                                <script type="text/javascript">
                                                    $(document).ready(function() {
                                                        var sumR = 0;
                                                        $('.calculate<?= $re; ?>').each(function(e) {
                                                            sumR += parseFloat($(this).text());
                                                        });
                                                        $('#sumR<?= $re; ?>').html(sumR.toFixed(5));
                                                    });
                                                </script>
                                            <?php endforeach; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Perbandingan -->
                    <div class="card shadow-sm mb-3">
                        <div class="card card-header">
                            <h4 class="title">Tabel Perbandingan Analisa</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <?php
                                            foreach ($listKrit as $kr) { ?>
                                                <th><?= $kr->kode_gejala; ?></th>
                                            <?php } ?>
                                            <th class="bg-info text-white">Jumlah</th>
                                            <th class="bg-success text-white">Prioritas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listKrit as $bc) :
                                            // $pt = explode("C",$bc->id_gejala);
                                            $rx = $bc->id_gejala;
                                        ?>
                                            <tr>
                                                <?php
                                                $this->db->from('analisa_krit');
                                                $this->db->where('kriteria_x', $bc->id_gejala);
                                                $this->db->where('id_penyakit', $id_penyakit);
                                                $query = $this->db->get();
                                                $anK = $query->result();
                                                ?>
                                                <td><b><?= $bc->kode_gejala; ?></b></td>
                                                <?php foreach ($anK as $at) :
                                                    // $pt = explode("C",$at->kriteria_x);
                                                    // $ps = explode("C",$at->kriteria_y);
                                                    $re = $at->kriteria_y;
                                                    $rf = $at->kriteria_x;
                                                ?>
                                                    <td class="calmul<?= $rf; ?>" id="ml<?= $re . $rf; ?>"><?= $at->nilai_krit; ?></td>
                                                    <script type="text/javascript">
                                                        $(document).ready(function() {
                                                            var mlty = 0;
                                                            mlty += parseFloat($('#R<?= $re . $rf; ?>').text()) / parseFloat($('#sumR<?= $re; ?>').text());
                                                            $('#ml<?= $re . $rf; ?>').html(mlty.toFixed(5));
                                                        });
                                                    </script>
                                                <?php endforeach; ?>
                                                <script type="text/javascript">
                                                    $(document).ready(function() {
                                                        var sumAX = 0;
                                                        $('.calmul<?= $rx; ?>').each(function(e) {
                                                            sumAX += parseFloat($(this).text());
                                                        });
                                                        $('#to<?= $rx; ?>').html(sumAX.toFixed(5));
                                                        avgAX = parseFloat($('#to<?= $rx; ?>').text()) / <?= sizeof($listKrit); ?>;
                                                        $('#tav<?= $rx; ?>').html(avgAX.toFixed(5));
                                                        $('#trap<?= $rx; ?>').html(avgAX.toFixed(5));
                                                    });
                                                </script>
                                                <td class="bg-info text-white" id="to<?= $rx; ?>"></td>
                                                <td class="bg-success text-white" id="tav<?= $rx; ?>"></td>
                                                <!-- <td class="bg-warning text-white" id="λmaks<?= $rx; ?>"></td> -->
                                                <script type="text/javascript">
                                                    $(document).ready(function() {
                                                        <?php foreach ($listKrit as $tt) : ?>
                                                            var sumR<?= $tt->id_gejala; ?> = parseFloat($('#sumR<?= $tt->id_gejala; ?>').text());
                                                        <?php endforeach; ?>

                                                        <?php foreach ($listKrit as $bc) : ?>
                                                            var rx<?= $bc->id_gejala; ?> = <?= $bc->id_gejala; ?>;
                                                            var sumAX<?= $bc->id_gejala; ?> = 0;
                                                            $('.calmul<?= $bc->id_gejala; ?>').each(function(e) {
                                                                sumAX<?= $bc->id_gejala; ?> += parseFloat($(this).text());
                                                            });
                                                            $('#to<?= $bc->id_gejala; ?>').html(sumAX<?= $bc->id_gejala; ?>.toFixed(4));
                                                            $('#top<?= $bc->id_gejala; ?>').html(sumAX<?= $bc->id_gejala; ?>.toFixed(4));
                                                            var avgAX<?= $bc->id_gejala; ?> = sumAX<?= $bc->id_gejala; ?> / <?= count($listKrit); ?>;
                                                            $('#tav<?= $bc->id_gejala; ?>').html(avgAX<?= $bc->id_gejala; ?>.toFixed(4));

                                                            // Perhitungan #λmaks
                                                            var λmaks<?= $bc->id_gejala; ?> = avgAX<?= $bc->id_gejala; ?> * sumR<?= $bc->id_gejala; ?>;
                                                            $('#λmaks<?= $bc->id_gejala; ?>').html(λmaks<?= $bc->id_gejala; ?>.toFixed(4));
                                                            $('#λmaks1<?= $bc->id_gejala; ?>').html(λmaks<?= $bc->id_gejala; ?>.toFixed(4));
                                                        <?php endforeach; ?>
                                                    });
                                                </script>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Penjumlahan -->
                    <div class="card shadow-sm mb-3">
                        <div class="card card-header">
                            <h4 class="title">Tabel Analisa Prioritas</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <?php
                                            foreach ($listKrit as $kr) { ?>
                                                <th><?= $kr->kode_gejala; ?></th>
                                            <?php } ?>
                                            <th class="bg-info text-white">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listKrit as $bc) :
                                            // $pt = explode("C",$bc->id_gejala);
                                            $rx = $bc->id_gejala;
                                        ?>
                                            <tr>
                                                <?php
                                                $this->db->from('analisa_krit');
                                                $this->db->where('kriteria_x', $bc->id_gejala);
                                                $this->db->where('id_penyakit', $id_penyakit);
                                                $query = $this->db->get();
                                                $anK = $query->result();
                                                ?>
                                                <td><b><?= $bc->kode_gejala; ?></b></td>
                                                <?php foreach ($anK as $at) :
                                                    // $pt = explode("C",$at->kriteria_x);
                                                    // $ps = explode("C",$at->kriteria_y);
                                                    $re = $at->kriteria_y;
                                                    $rf = $at->kriteria_x;
                                                ?>
                                                    <td class="mtrx<?= $rf; ?>" id="mt<?= $re . $rf; ?>"><?= $at->nilai_krit; ?></td>

                                                    <script type="text/javascript">
                                                        $(document).ready(function() {
                                                            var mml = 0;
                                                            mml += parseFloat($('#R<?= $re . $rf; ?>').text()) * parseFloat($('#tav<?= $re; ?>').text());
                                                            $('#mt<?= $re . $rf; ?>').html(mml.toFixed(5));
                                                        });
                                                    </script>
                                                <?php endforeach; ?>
                                                <script type="text/javascript">
                                                    $(document).ready(function() {
                                                        var tolMX = 0;
                                                        $('.mtrx<?= $rx; ?>').each(function(e) {
                                                            tolMX += parseFloat($(this).text());
                                                        });
                                                        $('#tpri<?= $rx; ?>').html(tolMX.toFixed(5));
                                                        $('#traj<?= $rx; ?>').html(tolMX.toFixed(5));
                                                    });
                                                </script>
                                                <td class="bg-info text-white" id="tpri<?= $rx; ?>"></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Rasio Konsistensi -->
                    <div class="card shadow-sm mb-3">
                        <div class="card card-header">
                            <h4 class="title">Tabel Rasio Konsistensi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form class="" action="<?= base_url('matriks/updateNiKr/') . $id_penyakit; ?>" method="post" onsubmit="return check()">
                                    <table class="table border-1 table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kriteria</th>
                                                <th class="bg-warning text-white">(λ maks)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($listKrit as $bc) :
                                                $rx = $bc->id_gejala;
                                            ?>
                                                <tr>
                                                    <td style="width: 55%;"><b><?= $bc->nama_gejala; ?></b></td>
                                                    <td class="bg-warning text-white" id="λmaks1<?= $rx; ?>"></td>

                                                    <script type="text/javascript">
                                                        $(document).ready(function() {
                                                            var sumAX = 0;
                                                            $('.calmul<?= $rx; ?>').each(function(e) {
                                                                sumAX += parseFloat($(this).text());
                                                            });
                                                            $('#to<?= $rx; ?>').html(sumAX.toFixed(4));
                                                            avgAX = parseFloat($('#to<?= $rx; ?>').text()) / <?= sizeof($listKrit); ?>;
                                                            $('#tav<?= $rx; ?>').html(avgAX.toFixed(4));
                                                            $('#trap<?= $rx; ?>').html(avgAX.toFixed(4));
                                                            $('#trap2<?= $rx; ?>').val(avgAX.toFixed(4));
                                                        });
                                                    </script>
                                                    <td hidden><input id="id_gejala" type="text" name="id_gejala[<?= $rx; ?>]" value="<?= $bc->id_gejala; ?>"></td>
                                                    <td hidden>
                                                        <input type="text" name="id_penyakit" value="<?= $id_penyakit ?>">
                                                    </td>
                                                    <td hidden class="bg-warning text-white w-50">
                                                        <input readonly class="form-control" type="text" name="hasil[<?= $rx; ?>]" id="trap2<?= $rx; ?>" value="">
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <th class="bg-secondary text-light">Jumlah</th>

                                                <th class="bg-secondary text-light" id="sumλmaks"></th>
                                                <script type="text/javascript">
                                                    $(document).ready(function() {
                                                        var sumλmaks = 0;
                                                        $('.bg-warning.text-white').each(function() {
                                                            var val = parseFloat($(this).text());
                                                            if (!isNaN(val)) {
                                                                sumλmaks += val;
                                                            } else {
                                                                console.error("Nilai NaN ditemukan:", $(this).text());
                                                            }
                                                        });

                                                        $('#sumλmaks').html(sumλmaks.toFixed(4));
                                                    });
                                                </script>

                                            </tr>
                                            <tr>
                                                <th class="bg-light">Consistency Index (CI) <span id="cri" style="float: right;"></span></th>

                                                <th class="bg-light ci" id="cr"></th>
                                                <script type="text/javascript">
                                                    $(document).ready(function() {
                                                        var cr = 0,
                                                            a = 0,
                                                            b = 0;

                                                        a = parseFloat($('#sumλmaks').text()) - <?= sizeof($listKrit); ?>;
                                                        b = <?= sizeof($listKrit); ?> - 1;
                                                        cr = a / b;

                                                        $('#cr').append(cr.toFixed(4));
                                                    });
                                                </script>

                                            </tr>
                                            <tr>
                                                <th class="bg-light">Consistency Ratio (CR)</th>
                                                <th class="bg-light" id="finalCR"></th>
                                                <script>
                                                    $(document).ready(function() {
                                                        const RI = {
                                                            1: 0.00,
                                                            2: 0.00,
                                                            3: 0.58,
                                                            4: 0.90,
                                                            5: 1.12,
                                                            6: 1.24,
                                                            7: 1.32,
                                                            8: 1.41,
                                                            9: 1.45,
                                                            10: 1.49
                                                        };

                                                        const CI = $('.ci').text();
                                                        const n = <?= sizeof($listKrit); ?>;

                                                        let RI_value = RI[n];
                                                        if (n > 10) RI_value = RI[10]

                                                        const CR = CI / RI_value;

                                                        console.log("n = " + n);
                                                        console.log("CI = " + CI);
                                                        console.log("RI = " + RI_value);
                                                        console.log("CR = " + CR);

                                                        $('#finalCR').html(CR.toFixed(4));

                                                        if (CR < 0.1) {
                                                            status = 'Konsisten';
                                                            msg = '<span class="float-right badge badge-sm badge-info d-flex align-items-center"><i class="fas fa-check text-white mr-2"></i> <strong>CR KONSISTEN</strong></span>';
                                                        } else {
                                                            status = 'Tidak Konsisten';
                                                            msg = '<span class="float-right badge badge-sm badge-danger d-flex align-items-center"><i class="fas fa-times text-white mr-2"></i> <strong>CR TIDAK KONSISTEN</strong></span>';
                                                        }

                                                        $('#finalCR').append(msg);
                                                    })
                                                </script>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <!-- finish -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>