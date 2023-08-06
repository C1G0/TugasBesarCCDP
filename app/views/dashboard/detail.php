<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <!--Content Card-->
                    <div class="container-fluid d-flex justify-content-start mt-2">
                        <a href="<?=BASEURL?>/dashboard/batik"
                            class="auth-link text-black text-decoration-none float-end mdi mdi-keyboard-backspace menu-icon mb-3"
                            style="text-align: left; font-size: 18pt">
                            Kembali
                        </a>
                    </div>
                    <div class="container-fluid d-flex justify-content-start mt-2">
                        <div class="col">
                            <button class="btn btn-primary rounded-pill view-edit"
                                data-id="<?=$data['batik']['id_batik'] ?>" style="font-size: 12pt;"
                                type="button">Edit</button>
                        </div>
                    </div>
                    <div class="container-fluid d-flex justify-content-end mb-2">
                        <div class="row">
                            <!-- <div class="col">
                                <button class="btn btn-danger rounded-pill" style="font-size: 12pt;"
                                    type="button">Hapus</button>
                            </div> -->
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <form action="<?=BASEURL?>/dashboard/pengajuanUbahBatik" method="post"
                        enctype="multipart/form-data">
                        <div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Batik</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if($data['user']['hakAkses']=='admin'): ?>
                                        <div class="form-group mt-2 d-flex">
                                            <div
                                                class="container-fluid d-flex flex-column mt-4 ms-3 align-items-center">
                                                <img src="<?= BASEURL ?>/img/img_batik/<?=$data['batik']['gambar'] ?>"
                                                    class="img-fluid me-3 rounded id" id="gambar-batik"
                                                    name="gambar-batik" alt="..." style="width:140pt; height: 140pt;">
                                                <div id="preview"></div>
                                                <input type="file" id="edit-gambar" name="edit-gambar"
                                                    style="display: none;" accept="image/*" />
                                                <label for="edit-gambar" class="text-primary  text-center"
                                                    style="font-size: 16px; font-weight: 500;">Ubah
                                                    Gambar</label>
                                            </div>
                                        </div>
                                        <?php endif?>
                                        <div class="form-group">
                                            <label for="nama-batik" style="font-size: 12pt">Nama Batik</label>
                                            <input type="text" class="form-control rounded-pill" id="edit-batik"
                                                name="edit-batik" required />
                                            <input type="hidden" class="form-control rounded-pill" id="edit-id"
                                                name="edit-id" value="<?=$data['batik']['id_batik'] ?>" />
                                            <input type="hidden" class="form-control rounded-pill" id="edit-id-user"
                                                name="edit-id-user" value="<?=$data['user']['id_user'] ?>" />
                                            <input type="hidden" class="form-control rounded-pill"
                                                id="edit-gambar-hidden" name="edit-gambar-hidden"
                                                value="<?=$data['batik']['gambar'] ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-anggota" style="font-size: 12pt">Provinsi</label>
                                            <select class="form-control rounded-pill" id="edit-provinsi"
                                                name="edit-provinsi" required>
                                                <option value="0">Pilih Provinsi</option>
                                                <?php foreach($data['provinsi'] as $prov): ?>
                                                <option value=<?=$prov['provinsi_id']?>><?=$prov['nama_prov'] ?>
                                                </option>
                                                <?php endforeach?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-anggota" style="font-size: 12pt">Kota</label>
                                            <select class="form-control rounded-pill" id="edit-kota" name="edit-kota"
                                                required>
                                                <option value="0">Pilih Kabupaten/Kota</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama-anggota" style="font-size: 12pt">Deskripsi</label>
                                            <textarea class="form-control rounded" name="edit-deskripsi"
                                                id="edit-deskripsi" cols="30" rows="10" required></textarea>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="nama-anggota" style="font-size: 12pt">Excerpt</label>
                                            <textarea class="form-control rounded" name="edit-excerpt" id="edit-excerpt"
                                                cols="30" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" name="tambah-batik" class="btn btn-primary"
                                            value="Simpan" />
                                        <input type="button" value="Kembali" class="btn btn-danger" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </form>
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