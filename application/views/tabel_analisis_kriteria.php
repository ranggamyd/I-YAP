<!-- Begin Page Content -->
<div class="container-fluid text-dark">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tabel Analisa Kriteria(Gejala) Matriks AHP</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a> -->
    </div>
    <div class="card shadow-sm mb-3">
        <?php
        $query = $this->db->select('rule.id_gejala')
            ->select('kode_gejala')
            ->select('nama_gejala')
            ->from('rule')
            ->join('gejala', 'gejala.id_gejala=rule.id_gejala')
            ->where('rule.id_penyakit', 5)
            ->order_by('kode_gejala', 'ASC')
            ->get();
        $listKrit = $query->result();
        ?>
        <!-- Analisa -->
        <div class="card card-header">
            <h4 class="title">Tabel Analisa Kriteria(Gejala)</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <?php
                            foreach ($listKrit as $kr) { ?>
                                <th><?php echo $kr->kode_gejala; ?></th>
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
                                $query = $this->db->get();
                                $anK = $query->result();
                                ?>
                                <td><b><?php echo $bc->kode_gejala; ?></b></td>
                                <?php foreach ($anK as $at) :
                                    // $pt = explode("C",$at->kriteria_x);
                                    // $ps = explode("C",$at->kriteria_y);
                                    $re = $at->kriteria_y;
                                    $rf = $at->kriteria_x;
                                ?>
                                    <td class="calculate<?php echo $re; ?>" id="R<?php echo $re . $rf; ?>"><?php echo $at->nilai_krit; ?></td>
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
                                <td class="bg-info text-white" id="sumR<?php echo $re; ?>"></td>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        var sumR = 0;
                                        $('.calculate<?php echo $re; ?>').each(function(e) {
                                            sumR += parseFloat($(this).text());
                                        });
                                        $('#sumR<?php echo $re; ?>').html(sumR.toFixed(5));
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
                                <th><?php echo $kr->kode_gejala; ?></th>
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
                                $query = $this->db->get();
                                $anK = $query->result();
                                ?>
                                <td><b><?php echo $bc->kode_gejala; ?></b></td>
                                <?php foreach ($anK as $at) :
                                    // $pt = explode("C",$at->kriteria_x);
                                    // $ps = explode("C",$at->kriteria_y);
                                    $re = $at->kriteria_y;
                                    $rf = $at->kriteria_x;
                                ?>
                                    <td class="calmul<?php echo $rf; ?>" id="ml<?php echo $re . $rf; ?>"><?php echo $at->nilai_krit; ?></td>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            var mlty = 0;
                                            mlty += parseFloat($('#R<?php echo $re . $rf; ?>').text()) / parseFloat($('#sumR<?php echo $re; ?>').text());
                                            $('#ml<?php echo $re . $rf; ?>').html(mlty.toFixed(5));
                                        });
                                    </script>
                                <?php endforeach; ?>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        var sumAX = 0;
                                        $('.calmul<?php echo $rx; ?>').each(function(e) {
                                            sumAX += parseFloat($(this).text());
                                        });
                                        $('#to<?php echo $rx; ?>').html(sumAX.toFixed(5));
                                        avgAX = parseFloat($('#to<?php echo $rx; ?>').text()) / <?php echo sizeof($listKrit); ?>;
                                        $('#tav<?php echo $rx; ?>').html(avgAX.toFixed(5));
                                        $('#trap<?php echo $rx; ?>').html(avgAX.toFixed(5));
                                    });
                                </script>
                                <td class="bg-info text-white" id="to<?php echo $rx; ?>"></td>
                                <td class="bg-success text-white" id="tav<?php echo $rx; ?>"></td>
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
                                <th><?php echo $kr->kode_gejala; ?></th>
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
                                $query = $this->db->get();
                                $anK = $query->result();
                                ?>
                                <td><b><?php echo $bc->kode_gejala; ?></b></td>
                                <?php foreach ($anK as $at) :
                                    // $pt = explode("C",$at->kriteria_x);
                                    // $ps = explode("C",$at->kriteria_y);
                                    $re = $at->kriteria_y;
                                    $rf = $at->kriteria_x;
                                ?>
                                    <td class="mtrx<?php echo $rf; ?>" id="mt<?php echo $re . $rf; ?>"><?php echo $at->nilai_krit; ?></td>

                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            var mml = 0;
                                            mml += parseFloat($('#R<?php echo $re . $rf; ?>').text()) * parseFloat($('#tav<?php echo $re; ?>').text());
                                            $('#mt<?php echo $re . $rf; ?>').html(mml.toFixed(5));
                                        });
                                    </script>
                                <?php endforeach; ?>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        var tolMX = 0;
                                        $('.mtrx<?php echo $rx; ?>').each(function(e) {
                                            tolMX += parseFloat($(this).text());
                                        });
                                        $('#tpri<?php echo $rx; ?>').html(tolMX.toFixed(5));
                                        $('#traj<?php echo $rx; ?>').html(tolMX.toFixed(5));
                                    });
                                </script>
                                <td class="bg-info text-white" id="tpri<?php echo $rx; ?>"></td>
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
            <h4 class="title">Tabel Analisa Prioritas</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="" action="<?php echo base_url('matriks/updateNiKr'); ?>" method="post" onsubmit="return check()">
                    <table class="table border-1 table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Rasio Konsistensi</th>
                                <th class="bg-info text-white">Jumlah</th>
                                <th class="bg-success text-white">Prioritas</th>
                                <th class="bg-warning text-white">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listKrit as $bc) :
                                // $pt = explode("C",$bc->id_gejala);
                                $rx = $bc->id_gejala;
                            ?>
                                <tr>
                                    <td style="width: 55%;"><b><?php echo $bc->nama_gejala; ?></b></td>
                                    <td class="bg-info text-white col-xs-2" id="traj<?php echo $rx; ?>"></td>
                                    <td class="bg-success text-white col-xs-2" id="trap<?php echo $rx; ?>"></td>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            var hsl = 0;
                                            hsl += parseFloat($('#traj<?php echo $rx; ?>').text()) + parseFloat($('#trap<?php echo $rx; ?>').text());
                                            $('#taha<?php echo $rx; ?>').val(hsl.toFixed(5));
                                            $('#yo<?php echo $rx; ?>').html(hsl.toFixed(5));
                                        });
                                    </script>
                                    <td hidden><input id="id_gejala" type="text" name="id_gejala[<?php echo $rx; ?>]" value="<?php echo $bc->id_gejala; ?>"></td>
                                    <td class="bg-warning text-white col-xs-2"><input readonly class="form-control" type="text" name="hasil[<?php echo $rx; ?>]" id="taha<?php echo $rx; ?>" value=""></td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- <table class="table" style="margin : 40px 0 10px 0;">
                                <tr>
                                    <td colspan="4"><input type="submit" class="btn btn-fill btn-info" name="" value="Simpan Ke Database"> </td>
                                </tr>
                            </table> -->
                        </tbody>
                    </table>
                </form>
                <!-- finish -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function getPDF() {

        var HTML_Width = $(".canvas_div_pdf").width();
        var HTML_Height = $(".canvas_div_pdf").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;


        html2canvas($(".canvas_div_pdf")[0], {
            allowTaint: true
        }).then(function(canvas) {
            canvas.getContext('2d');

            console.log(canvas.height + "  " + canvas.width);


            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);


            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
            }

            pdf.save("analisa-kriteria.pdf");
        });
    };

    function printData() {
        var divToPrint = document.getElementById("cetk");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    };
</script>