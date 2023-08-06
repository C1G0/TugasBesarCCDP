<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <!--Content Card-->
                    <div class="row">
                        <div class="col-lg-6">
                            <?php Flasher::flash(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="container-fluid">
                                    <div class="d-flex align-items-end flex-wrap">
                                        <div class="me-md-3 me-xl-5">
                                            <h2>Data Batik Nusantara</h2>
                                        </div>
                                    </div>
                                    <div class="container-fluid mt-3 mb-3">
                                        <div class="row">
                                            <div class="col-12 d-flex flex-row-reverse">
                                                <button type="button" class="btn btn-primary rounded-pill"
                                                    style="font-size: 12pt;" data-bs-toggle="modal"
                                                    data-bs-target="#modalTambah">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Content Card-->
                                    <!-- Pake data batik yang status nya pending(belum disetujui) -->
                                    <!--Content Card-->
                                </div>
                                <div class="d-flex flex-wrap justify-content-center">
                                    <?php foreach ($data['batik'] as $batik) : ?>
                                    <div class="card border mx-3 mt-4" style="width: 18rem;">
                                        <img src="<?= BASEURL ?>/img/img_batik/<?=$batik['gambar'] ?>"
                                            class="card-img-top" alt="..." style="height: 200px;">
                                        <div class="card-body border-light">
                                            <h5 class="card-title"><?= $batik['nama_batik'] ?></h5>
                                            <p class="blog-post-meta text-secondary"> Oleh
                                                <?=$batik['nama'] ?> </p>
                                            <p class="blog-post-meta text-secondary">Asal : Provinsi
                                                <?=$batik['nama_prov']?>,
                                                <?=$batik['nama_kab'] ?> </p>
                                            <p class="card-text"><?=$batik['excerpt']?></p>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <a href="<?= BASEURL ?>/dashboard/detail/<?= $batik['id_batik'] ?>"
                                                class="btn btn-primary">Baca
                                                Sekarang »</a>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">Last updated <?=$batik['last_modified'];?></small>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                                <!-- Modal -->
                                <form action="<?=BASEURL?>/dashboard/tambahBatik" method="post"
                                    enctype="multipart/form-data">
                                    <div class="modal fade" id="modalTambah" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="formTambahBatik">Form Tambah Batik</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body mt-2">
                                                    <div class="mt-3">
                                                        <label for="tambah-gambar" class="form-label">Gambar</label>
                                                        <input class="form-control rounded-pill" type="file"
                                                            name="tambah-gambar" id="tambah-gambar"
                                                            accept="image/png, image/gif, image/jpeg" required />
                                                        <center>
                                                            <div id="preview" class="mt-2"></div>
                                                        </center>
                                                    </div>
                                                    <div class="form-group mt-4">
                                                        <label for="nama-batik" style="font-size: 12pt">Nama
                                                            Batik</label>
                                                        <input type="hidden" name="user" id="user"
                                                            value="<?=$data['user']['id_user'] ?>">
                                                        <input type="hidden" name="hakAkses" id="hakAkses"
                                                            value="<?=$data['user']['hakAkses'] ?>">
                                                        <input type="text" class="form-control rounded-pill"
                                                            id="tambah-batik" name="tambah-batik" required />
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="nama-anggota"
                                                            style="font-size: 12pt">Provinsi</label>
                                                        <select class="form-control rounded-pill" id="tambah-provinsi"
                                                            name="tambah-provinsi" required>
                                                            <option value="0">Pilih Provinsi</option>
                                                            <?php foreach($data['provinsi'] as $prov): ?>
                                                            <option value=<?=$prov['provinsi_id']?>>
                                                                <?=$prov['nama_prov'] ?>
                                                            </option>
                                                            <?php endforeach?>
                                                        </select>
                                                        <!-- <input type="text" class="form-control rounded-pill"
                                                        id="tambah-provinsi" name="tambah-provinsi" /> -->
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="nama-anggota"
                                                            style="font-size: 12pt">Kab/Kota</label>
                                                        <select class="form-control rounded-pill" id="tambah-kota"
                                                            name="tambah-kota" required>
                                                            <option value="0">Pilih Kabupaten/Kota</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="nama-anggota"
                                                            style="font-size: 12pt">Deskripsi</label>
                                                        <textarea class="form-control rounded" name="tambah-deskripsi"
                                                            id="tambah-deskripsi" cols="30" rows="10"
                                                            required></textarea>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="nama-anggota"
                                                            style="font-size: 12pt">Excerpt</label>
                                                        <textarea class="form-control rounded" name="tambah-excerpt"
                                                            id="tambah-excerpt" cols="30" rows="5" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" value="Simpan" />
                                                    <input type="reset" class="btn btn-danger" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- End Modal -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
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
$("#tambah-gambar").change(function() {
    imagePreview(this);
});
</script>