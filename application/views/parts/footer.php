           </div>
           <!-- End of Main Content -->
           <!-- Footer -->
           <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                   <div class="copyright text-center my-auto">
                       <span>Copyright &copy; Sistem Diagnosis Penyakit Itik - 2024</span>
                   </div>
               </div>
           </footer>
           <!-- End of Footer -->

           </div>
           <!-- End of Content Wrapper -->

           </div>
           <!-- End of Page Wrapper -->

           <!-- Scroll to Top Button-->
           <a class="scroll-to-top rounded" href="#page-top">
               <i class="fas fa-angle-up"></i>
           </a>

           <!-- Logout Modal-->
           <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ?</h5>
                           <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">×</span>
                           </button>
                       </div>
                       <div class="modal-body">Tekan tombol "Keluar" dibawah jika anda ingin mengakhiri sesi ini.</div>
                       <div class="modal-footer">
                           <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                           <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Keluar</a>
                       </div>
                   </div>
               </div>
           </div>

           <script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
           <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           <script src="<?= base_url('assets') ?>/js/sb-admin-2.min.js"></script>
           <script src="<?= base_url('assets') ?>/vendor/toastr/toastr.min.js"></script>
           <script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
           <script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
           <!-- Magnific Popup core JS file -->
           <script src="<?= base_url('assets') ?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

           <!-- Custom scripts for all pages-->
           <script>
               $('.imgPopup').magnificPopup({
                   type: 'image'
                   // other options
               });
               $('.pdfPopup').magnificPopup({
                   type: 'iframe'
               });
               $('#dataTable').dataTable();
               $('#dataTable2').dataTable();
               $('#dataTable3').dataTable();
               $('#dataTable4').dataTable();
               $('[data-toggle="tooltip"]').tooltip({
                   placement: "bottom"
               });

               $(document).ready(function() {
                   $("#show_hide_password a").on('click', function(event) {
                       event.preventDefault();
                       if ($('#show_hide_password input').attr("type") == "text") {
                           $('#show_hide_password input').attr('type', 'password');
                           $('#show_hide_password i').addClass("fa-eye-slash");
                           $('#show_hide_password i').removeClass("fa-eye");
                       } else if ($('#show_hide_password input').attr("type") == "password") {
                           $('#show_hide_password input').attr('type', 'text');
                           $('#show_hide_password i').removeClass("fa-eye-slash");
                           $('#show_hide_password i').addClass("fa-eye");
                       }
                   });
               });
           </script>



           <?php if ($this->session->flashdata('sukses')) : ?>
               <script>
                   toastr.success("<?= $this->session->flashdata('sukses') ?>", "Berhasil", {
                       "progressBar": true,
                       "positionClass": "toast-top-right",
                       "timeOut": "7500",
                   });
               </script>
           <?php elseif ($this->session->flashdata('gagal')) : ?>
               <script>
                   toastr.error("<?= $this->session->flashdata('gagal') ?>", "Gagal", {
                       "progressBar": true,
                       "positionClass": "toast-top-right",
                       "timeOut": "5000",
                   });
                   <?php if ($this->session->flashdata('hasModalID')) : ?>
                       console.log($("#<?= $this->session->flashdata('hasModalID') ?>"));
                       $("#<?= $this->session->flashdata('hasModalID') ?>").modal();
                   <?php endif ?>
               </script>
           <?php endif ?>
           <?php if ($this->session->flashdata('showModal')) : ?>
               <script>
                   $("#<?= $this->session->flashdata('showModal') ?>").modal();
               </script>
           <?php endif ?>

           <!-- Perpage JS -->
           <?php if (isset($style['js'])) : ?>
               <script src="<?= base_url('assets') ?>/js/<?= $style['js'] ?>"></script>
           <?php endif ?>
           </body>

           </html>