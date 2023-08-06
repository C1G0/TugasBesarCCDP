<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="container-fluid">
                        <div class="me-md-3 me-xl-5">
                            <h2>Halaman Profil</h2>
                        </div>
                        <div class="col-12">
                            <?php Flasher::flash()?>
                        </div>
                    </div>
                    <!--Change Picture-->
                    <div class="container-fluid ps-5 mt-3">
                        <form action="<?=BASEURL?>/dashboard/ubahProfil" method="post" enctype="multipart/form-data">
                            <div class="container-fluid d-flex flex-column mt-4 ms-3">
                                <input type="file" id="ubah-gambar" name="ubah-gambar" style="display: none;"
                                    accept="image/*" />
                                <label for="ubah-gambar" class="text-primary hover"
                                    style="margin: 6px; font-size: 16px; font-weight: 500; margin-left:34px">Ubah
                                    Gambar</label>
                            </div>
                            <div class="container-fluid ms-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?= BASEURL ?>/img/<?=$data['user']['profil'] ?>"
                                            class="img-fluid me- rounded-circle" id="gambar-profil" alt="..."
                                            style="width:140pt; height: 140pt;">
                                        <div id="preview"></div>
                                    </div>
                                    <!--Form Control Edit Profil-->
                                    <div class="col-md-7 col-sm-6 col-xs-6 ms-5" style="margin-left:50px;">

                                        <div class="mb-3">
                                            <label for="Nama">Nama</label>
                                            <input type="hidden" class="form-control rounded-pill" id="nama"
                                                aria-describedby="nama" name="id_user"
                                                value="<?=$_SESSION['user_session']? $data['user']['id_user']:""?>">
                                            <input type="text" class="form-control rounded-pill" id="nama"
                                                aria-describedby="nama" name="nama"
                                                value="<?=$_SESSION['nama']? $data['user']['nama']:""?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Email">Email</label>
                                            <input type="email" class="form-control rounded-pill" id="email"
                                                aria-describedby="email" name="email" readonly
                                                value="<?=$_SESSION['email']? $data['user']['email']:""?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Password">Password</label>
                                            <input type="password" class="form-control rounded-pill" id="password"
                                                aria-describedby="password" name="password"
                                                value="<?=$_SESSION['password']? $_SESSION['password']:""?>" readonly>
                                            <div class="form-switch mt-2">
                                                <input class="form-check-input mt-2" type="checkbox" role="switch"
                                                    id="checkbox-pass" onclick="myFunction()">
                                                <label class="form-check-label mt-2" for="checkbox-pass">Show
                                                    Password</label>
                                                <a href="#"
                                                    class="auth-link text-black text-decoration-none float-end mt-1"
                                                    style="text-align: right;">Ubah Password</a>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Password">Tanggal Lahir</label>
                                            <input type="date" class="form-control rounded-pill" id="tgl_lahir"
                                                aria-describedby="date" name="tgl_lahir"
                                                value="<?=$_SESSION['tgl_lahir']? $data['user']['tgl_lahir']:""?>"
                                                required>
                                        </div>
                                        <div class="col-6">
                                            <p>Jenis Kelamin</p>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="jk" id="jk"
                                                            value="L" <?=$data['user']['jk']=="L"?"checked":"" ?>
                                                            required>
                                                        Laki - Laki
                                                        <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="jk" id="jk"
                                                            value="P" <?=$data['user']['jk']=="P"?"checked":"" ?>>
                                                        Perempuan
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 text-center responsive">
                                            <button class="btn btn-primary rounded-pill" style="font-size: 14pt;"
                                                type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- content-wrapper ends -->
<script>
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function(event) {
            $('#preview').html('<img src="' + event.target.result +
                '" width="140pt" height="140pt" class="rounded-circle"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}
$("#ubah-gambar").change(function() {
    $("#gambar-profil").attr("hidden", "hidden");
    imagePreview(this);
});
</script>