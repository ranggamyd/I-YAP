<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block justify-content-end align-self-center">
                            <a class="mt-5" href="<?= base_url('landing_page') ?>"><img src="<?= base_url('assets') ?>/front/images/malnutrisi.png" style="width:110%;" alt="Stunting Logo"></a>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center w-100">
                            <div class="p-5 flex-grow-1">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-1">Lupa Kata Sandi !</h1>
                                    <h1 class="h6 text-gray-900 mb-4">Sistem Pakar - Malnutrisi</h1>
                                </div>
                                <form action="<?= base_url('auth/update_pass') ?>" method="POST" class="user" id="forgot">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control form-control-user" id="email" placeholder="Masukkan E-mail anda" onkeyup="checkEmail()" required>
                                        <div id="emaileror" class="invalid-feedback">
                                            Email Tidak ditemukan !
                                        </div>
                                        <div id="emailsuccess" class="invalid-feedback">
                                            <i class="fas fa-check"></i> Email Terdaftar
                                        </div>
                                    </div>
                                    <div id="input_password" hidden>
                                        <hr>
                                        <div class="form-group">
                                            <label>Tulis Password baru</label>
                                            <input type="password" name="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid' : '' ?>" id="password" onkeyup="check_password($(this))" placeholder="Masukkan Password Baru" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid' : '' ?>" id="password_verification" onkeyup="check_password($(this))" placeholder="Ulangi Password" required>
                                            <small id="notif_cocok">Password harus sama ya kakak 😘</small>
                                        </div>
                                        <button type="submit" id="btn_ubah_password" class="btn btn-primary btn-user btn-block">Ubah Password</button>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <small>Kembali ke halaman <a href="<?= base_url('auth') ?>">Login</a></small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function checkEmail() {
        var email = $("#email").val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('auth/checkInput'); ?>", // Gantilah 'CheckController' sesuai dengan nama controller Anda
            data: {
                email: email
            },
            dataType: "json",
            success: function(response) {
                if (response.isExist) {
                    // alert("Input terdaftar dalam database!");
                    $('#emailsuccess').show();
                    $('#emailsuccess').addClass('text-success');
                    $("#input_password").removeAttr('hidden');
                    $('#emaileror').hide();
                } else {
                    $('#emaileror').show();
                    $("#input_password").attr('hidden');
                    $('#emailsuccess').hide();
                    // alert("Input tidak terdaftar dalam database.");
                }
            },
            error: function(xhr, status, error) {
                alert("Terjadi kesalahan: " + xhr.responseText);
            }
        });
    }

    function check_password(e) {
        var password = $("#password");
        var password_verification = $("#password_verification")
        if (password.val() === password_verification.val() && password.val() !== '' && password_verification !== '') {
            password.addClass('is-valid')
            password_verification.addClass('is-valid')
            password.removeClass('is-invalid')
            password_verification.removeClass('is-invalid')
            $("#notif_cocok").html('Kedua password sudah sama 🫠')
            $("#btn_ubah_password").prop('disabled', false)
        } else {
            password.addClass('is-invalid')
            password_verification.addClass('is-invalid')
            password.removeClass('is-valid')
            password_verification.removeClass('is-valid')
            $("#notif_cocok").html('Password tidak sesuai')
            $("#btn_ubah_password").prop('disabled', true)
        }
    }
</script>