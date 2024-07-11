<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Analisa Kriteria(Gejala) Matriks AHP</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a> -->
    </div>

    <div class="card shadow-sm mb-3">
        <div class="card-header">

        </div>
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
                        //tabel gejala
                        $this->db->from('gejala');
                        $this->db->order_by('id_gejala', 'DESC');
                        $this->db->limit(1);
                        $query = $this->db->get();
                        $totab = $query->result_array();
                        foreach ($totab as $key) { //foreach ambil dari tabel atas (ngambil array terakhir)
                            foreach ($gejala as $gj) : //foreach ambil dari Controller (buat Kriteria A)
                                $re = $key['id_gejala'];
                                $ra = $gj['id_gejala'];
                                for ($i = 1; $i <= $re; $i++) {
                                    $jid = ($i);
                                    $jo = $jid;
                                    $this->db->select('nama_gejala');
                                    $this->db->from('gejala');
                                    $this->db->where('id_gejala', $jo);
                                    $query = $this->db->get();
                                    $totab = $query->result_array();
                                    foreach ($totab as $bc) {
                                        if ($i == $ra) {
                        ?>
                                            <tr hidden>
                                                <td><input type="text" name="C[<?php echo $ra . $jid; ?>]" value="<?php echo $ra; ?>"><?php echo $gj['nama_gejala']; ?></td>
                                                <td><input type="text" name="W[<?php echo $ra . $jid; ?>]" value="1"> </td>
                                                <td><input type="text" id="" name="X[<?php echo $ra . $jid; ?>]" value="<?php echo $jo; ?>"><?php echo $bc['nama_gejala']; ?></td>
                                                <!--input id-->
                                                <td><input type="text" name="" value="<?php echo $ra . $jid; ?>"></td>
                                            </tr>
                                        <?php
                                        } else if ($ra < $i) { ?>
                                            <tr>
                                                <td style="font-size:15px;"><input type="text" name="C[<?php echo $ra . $jid; ?>]" value="<?php echo $ra; ?>" hidden><?php echo $gj['nama_gejala']; ?></td>
                                                <td><select class="calculate form-control" id="W<?php echo $ra . $jid; ?>" class="" name="W[<?php echo $ra . $jid; ?>]">
                                                        <!-- <option value="0">-PILIH-</option> -->
                                                        <?php
                                                        $this->db->from('nilai');
                                                        $query = $this->db->get();
                                                        $nilt = $query->result();
                                                        foreach ($nilt as $keyval) { ?>
                                                            <option value="<?php echo $keyval->jum_nilai; ?>"><?php echo $keyval->jum_nilai; ?> - <?php echo $keyval->ket_nilai; ?></option>
                                                        <?php } ?>
                                                    </select></td>
                                                <td style="font-size:15px;"><input type="text" id="" name="X[<?php echo $ra . $jid; ?>]" value="<?php echo $jo; ?>" hidden><?php echo $bc['nama_gejala']; ?></td>
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
                            <td colspan="4"><button type="submit" class="btn btn-fill btn-info"><i class="fas fa-calculator"></i>&nbsp&nbspKalkulasi</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

</div>