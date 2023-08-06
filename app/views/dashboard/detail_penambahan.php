<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <!--Content Card-->
                    <div class="container-fluid d-flex justify-content-start mt-2">
                        <a href="<?=BASEURL?>/dashboard/index"
                            class="auth-link text-black text-decoration-none float-end mdi mdi-keyboard-backspace menu-icon mb-3"
                            style="text-align: left; font-size: 18pt">
                            Kembali
                        </a>
                    </div>
                    <div class="container-fluid d-flex justify-content-center">
                        <img src="<?= BASEURL ?>/img/img_batik/<?=$data['batik']['gambar']?>"
                            class="img-fluid me- rounded" alt="..." style="height: 350px; width:500px">
                    </div>
                    <div class="container-fluid d-flex justify-content-start mt-4">
                        <article class="blog-post">
                            <h5 class="display-3"><?=$data['batik']['nama_batik'] ?></h5>
                            <p class="blog-post-meta text-secondary" style="font-size: 12pt;">Provinsi
                                <?=$data['batik']['nama_prov']?> -
                                <?=$data['batik']['nama_kab'] ?></p>
                            <p class="blog-post-meta text-secondary"><?=$data['batik']['created_at']?> by
                                <?=$data['batik']['nama'] ?></p>
                            <p class="font-weight-light"><?=$data['batik']['deskripsi'] ?></p>
                    </div>
                    <?php if($data['user']['hakAkses']=='admin'):?>
                    <div class="container-fluid d-flex justify-content-start mt-2">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-danger rounded-pill btnTambahTolak"
                                    data-id="<?=BASEURL?>/dashboard/tolakPengajuanBatikBaru/<?=$data['batik']['id_batik'] ?>"
                                    style="font-size: 12pt;" type="button">Tolak</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-success rounded-pill btnTambahSetuju"
                                    data-id="<?=BASEURL?>/dashboard/setujuPengajuanBatikBaru/<?=$data['batik']['id_batik'] ?>"
                                    style="font-size: 12pt;" type="button">Setujui</button>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function(event) {
            $('#preview').html('<img src="' + event.target.result +
                '" width="140pt" height="140pt" class=""/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}
$("#edit-gambar").change(function() {
    $("#gambar-batik").attr("hidden", "hidden");
    imagePreview(this);
});
</script>