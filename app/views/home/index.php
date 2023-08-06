<style>
img {
    opacity: 0.5;

}

img:hover {
    opacity: 1.0;
    background: rgba(0, 0, 0, 0.8);
}
</style>
<main>
    <!--Carousel-->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background: rgba(0, 0, 0, 0.8);">
                <img src="<?=BASEURL?>/img/1883300.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-center" style="margin-bottom: 13rem;">
                    <h1 class="display1" style="font-size: 100px;">Selamat Datang</h1>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item" style="background: rgba(0, 0, 0, 0.8)">
                <img src="<?=BASEURL?>/img/1883221.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" style="background-color: rgba(0, 0, 0, 0.8)">
                <img src="<?=BASEURL?>/img/image_processing20191101-25402-1gebd99.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
</main>

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <!--Search-->
                    <div class="row">
                        <div class="col">
                            <div class="container-fluid d-flex flex-row-reverse">
                                <form action="<?=BASEURL?>/home/cari" method="post">
                                    <div class="p-1 bg-light rounded border rounded-pill shadow-sm mb-4">
                                        <div class="input-group">
                                            <input type="search" placeholder="Cari Batik"
                                                aria-describedby="button-addon1" autocomplete="off" name="keyword"
                                                id="keyword" class="form-control border-0 bg-light">
                                            <div class="input-group-append">
                                                <button id="button-addon1" type="submit"
                                                    class="btn btn-link text-primary"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Content Card-->
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid d-flex justify-content-center">
                                <?php foreach($data['batik'] as $batik):?>
                                <div class="card border-light mx-3" style="width: 20rem;">
                                    <img src="<?=BASEURL ?>/img/img_batik/<?=$batik['gambar'] ?>" class="card-img-top"
                                        alt="..." style="height: 200px;">
                                    <div class="card-body border-light">
                                        <h5 class="card-title"><?=$batik['nama_batik'] ?></h5>
                                        <p class="blog-post-meta text-secondary"> Oleh
                                            <?=$batik['nama'] ?> </p>
                                        <p class="blog-post-meta text-secondary">Asal : Provinsi
                                            <?=$batik['nama_prov']?>,
                                            <?=$batik['nama_kab'] ?> </p>
                                        <p class="card-text"><?=$batik['excerpt']?></p>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <a href="<?= BASEURL ?>/home/detail/<?= $batik['id_batik'] ?>"
                                            class="btn btn-primary">Baca
                                            Sekarang »</a>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Last updated <?=$batik['last_modified'];?></small>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>