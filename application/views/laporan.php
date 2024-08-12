<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Hasil Diagnosis</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a> -->
    </div>
    <div class="card shadow-sm mb-3">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped diagnosa" id="dataTable">
                    <thead class="text-center">
                        <th>#</th>
                        <th>Pasien</th>
                        <th>Tanggal</th>
                        <th>Penyakit</th>
                        <th>Nilai</th>
                        <th><i class="fas fa-cogs"></i></th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($hasil as $item) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $item['nama']; ?></td>
                                <td><?= $item['tanggal']; ?></td>
                                <td><?= $item['nama_penyakit']; ?></td>
                                <td class="text-center">
                                    <span class="badge badge-light"><?= $item['hasil_nilai'] * 100; ?>%</span> -
                                    <span class="badge badge-dark"><?= round($item['hasil_nilai'], 3); ?></span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Opsi">
                                        <a href="<?= base_url('laporan/detail/' . $item['id_hasil']) ?>" class="btn btn-sm btn-success shadow-sm" data-toggle="tooltip" data-placement="right" title="Lihat detail"><i class="fa fa-fw fa-eye"></i></a>
                                        <?php if ($this->session->userdata('id_admin') == 1) : ?>
                                            <a href="<?= base_url('laporan/hapus/' . $item['id_hasil']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus hasil ?')" class="btn btn-sm btn-danger shadow-sm" data-toggle="tooltip" data-placement="right" title="Hapus hasil"><i class="fas fa-trash-alt"></i></a>
                                        <?php endif ?>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- 
<?php
$offset = $this->input->get('offset');
$limit = 15;
if (empty($offset)) {
    $offset = 0;
}

$sqlgjl = $this->db->get('gejala')->result_array();
foreach ($sqlgjl as $rgjl) {
    $argjl[$rgjl['kode_gejala']] = $rgjl['nama_gejala'];
}

$sqlpkt = $this->db->get('penyakit')->result_array();
foreach ($sqlpkt as $rpkt) {
    $arpkt[$rpkt['kode_penyakit']] = $rpkt['nama_penyakit'];
    $ardpkt[$rpkt['kode_penyakit']] = $rpkt['det_penyakit'];
    $arspkt[$rpkt['kode_penyakit']] = $rpkt['srn_penyakit'];
}

$tampil = $this->db->get('hasil')->num_rows();
if ($tampil > 0) {
    echo "<div class='row'>
    <div class='col-md-8'>
        <table class='table table-bordered table-striped riwayat' style='overflow-x=auto' cellpadding='0' cellspacing='0'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Penyakit</th>
                    <th nowrap>Nilai CF</th>
                    <th width='21%' class='text-center'>Aksi</th>
                </tr>
            </thead>
            <tbody>";
    $hasil = $this->db->get('hasil', $limit, $offset)->result_array();
    $no = $offset + 1;
    $counter = 1;
    foreach ($hasil as $r) {
        if ($r['hasil_id'] > 0) {
            if ($counter % 2 == 0) {
                $warna = "dark";
            } else {
                $warna = "light";
            }
            echo "<tr class='" . $warna . "'>
                    <td align='center'>$no</td>
                    <td>$r[tanggal]</td>
                    <td>" . $arpkt[$r['hasil_id']] . "</td>
                    <td><span class='label label-default'>" . $r['hasil_nilai'] . "</span></td>
                    <td align='center'>
                        <a type='button' class='btn btn-default btn-xs' target='_blank' href='riwayat-detail/$r[id_hasil]'><i class='fa fa-eye' aria-hidden='true'></i> Detail </a> &nbsp;
                    </td>
                </tr>";
            $no++;
            $counter++;
        }
    }
    echo "</tbody>
        </table>
    </div>";

    echo "<div class='col-md-4'>
        <div class='box box-success box-solid'>
            <div class='box-header with-border'>
                <i class='fa fa-pie-chart'></i>
                <h3 class='box-title'>Grafik</h3>
                <div class='box-tools pull-right'>
                    <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                    <button type='button' class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                </div>
            </div>
            <div class='box-body'>
                <div id='donut-chart' class='chart' style='width:100%;height:250px;'></div>
                <hr>
                <div id='legend-container'></div>
            </div>
        </div>
    </div>";

    echo "
</div>
<div class='col-md-12'>
    <div class='row'>
        <div class='paging'>";

    if ($offset != 0) {
        $prevoffset = $offset - $limit;
        echo "<span class='prevnext'> <a href='index.php?module=riwayat&offset=$prevoffset'>Back</a></span>";
    } else {
        echo "<span class='disabled'>Back</span>";
    }

    $halaman = ceil($tampil / $limit);

    for ($i = 1; $i <= $halaman; $i++) {
        $newoffset = $limit * ($i - 1);
        if ($offset != $newoffset) {
            echo "<a href='index.php?module=riwayat&offset=$newoffset'>$i</a>";
        } else {
            echo "<span class='current'>" . $i . "</span>";
        }
    }
    if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {
        $newoffset = $offset + $limit;
        echo "<span class='prevnext'><a href='index.php?module=riwayat&offset=$newoffset'>Next</a>";
    } else {
        echo "<span class='disabled'>Next</span>";
    }
    echo "</div></div></div>";
} else {
    echo "<br><b>Data Kosong !</b>";
} ?>

<script>
    $(function() {
        var donutData = <?php echo json_encode($arr); ?>;

        function legendFormatter(label, series) {
            return '<div class="text text-primary margin4">' + label + ' ' + Math.round(series.percent) + '%';
        }

        $.plot('#donut-chart', donutData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.3,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: function(label, series) {
                            return '<div class="badge bg-navy color-pallete">' + Math.round(series.percent) + '%</div>';
                        },
                        threshold: 0.01
                    }
                }
            },
            legend: {
                show: true,
                container: $("#legend-container"),
                labelFormatter: legendFormatter,
            }
        });
    });

    function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
            label +
            '<br>' +
            Math.round(series.percent) + '%</div>';
    }
</script> -->