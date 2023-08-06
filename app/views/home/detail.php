<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <!--Content Card-->
                    <div class="container-fluid d-flex justify-content-start mt-2">
                        <a href="<?=BASEURL?>"
                            class="auth-link text-black text-decoration-none float-end mdi mdi-keyboard-backspace menu-icon mb-3"
                            style="text-align: left; font-size: 18pt">
                            Kembali
                        </a>
                    </div>

                    <div class="container-fluid d-flex justify-content-center">
                        <img src="<?=BASEURL ?>/img/img_batik/<?=$data['batik']['gambar'] ?>"
                            class="img-fluid me- rounded" alt="..." style="height: 350px; width:500px">
                    </div>
                    <div class="container-fluid d-flex justify-content-start mt-4">
                        <article class="blog-post">
                            <h5 class="display-3"><?=$data['batik']['nama_batik'] ?></h5>
                            <p class="blog-post-meta text-secondary"><?=$data['batik']['last_modified'];?> Oleh
                                <?=$data['batik']['nama'] ?> </p>
                            <p class="blog-post-meta text-primary">Asal : Provinsi <?=$data['batik']['nama_prov']?>,
                                <?=$data['batik']['nama_kab'] ?> </p>
                            <p class="font-weight-light"><?=$data['batik']['deskripsi'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>