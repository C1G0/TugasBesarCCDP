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
                            <div class="d-flex justify-content-center flex-wrap">
                                <div class="d-flex align-items-end flex-wrap">
                                    <div class="me-md-3 me-xl-5 text-center">
                                        <h2>Selamat Datang Kembali</h2>
                                        <p class="">berikut adalah data yang dikelola saat ini.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <?php if($data['user']['hakAkses']=='admin'):?>
                            <div class="card border mx-4 mb-3 rounded" style="min-width: 260px;">
                                <div class="row g-0">
                                    <div class="col-md-4 text-center">
                                        <i class="mdi mdi-account-multiple-outline" style="font-size: 400%;"></i>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h2 class="card-title fs-5">Member</h2>
                                            <p class="card-text fs-5"><?=$data['sum_member'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif?>
                            <div class="card border mb-3 rounded" style="min-width: 260px;">
                                <div class="row g-0">
                                    <div class="col-md-4 text-center">
                                        <i class="mdi mdi-texture" style="font-size: 400%;"></i>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h2 class="card-title fs-5">Batik</h2>
                                            <p class="card-text fs-5"><?=$data['sum_batik'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($data['user']['hakAkses']=='admin'):?>
                        <?php if(empty($data['pengajuan'])&& empty($data['penambahan'])):?>
                        <div class="row mt-2">
                            <div class="container">
                                <h5 class="alert alert-info">Anda tidak memiliki pengajuan yang harus dikonfirmasi</h5>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if(!empty($data['pengajuan'])):?>
                        <div class="row mt-2">
                            <div class="container">
                                <h2>Pengajuan Perubahan Konten</h2>
                            </div>
                            <div class="d-flex flex-wrap justify-content-center">
                                <?php foreach ($data['pengajuan'] as $batik) : ?>
                                <div class="card border mx-3 mt-3" style="width: 18rem;">
                                    <img src="<?= BASEURL ?>/img/img_batik/<?=$batik['gambar'] ?>" class="card-img-top"
                                        alt="..." style="height: 200px;">
                                    <div class="card-body border-light">
                                        <h5 class="card-title"><?= $batik['nama_batik'] ?></h5>
                                        <p class="card-text text-secondary">Diajukan Oleh : <?=$batik['nama'] ?></p>
                                        <p class="card-text"><?=$batik['excerpt'] ?></p>
                                        <a href="<?= BASEURL ?>/dashboard/detail_perubahan/<?= $batik['id_temp'] ?>/<?= $batik['id_batik'] ?>"
                                            class="btn btn-primary">Baca
                                            Sekarang »</a>
                                        <!-- <div class="mt-2 mx-1 text-center">
                                            <a href="" class="btn btn-danger">Tolak</a>
                                            <a href="" class="btn btn-success">Setujui</a>
                                        </div> -->
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if(!empty($data['penambahan'])):?>
                        <div class="row mt-2">
                            <div class="container">
                                <h2>Pengajuan Penambahan Konten</h2>
                            </div>
                            <div class="d-flex flex-wrap justify-content-center">
                                <?php foreach ($data['penambahan'] as $batik) : ?>
                                <div class="card border mx-3 mt-3" style="width: 18rem;">
                                    <img src="<?= BASEURL ?>/img/img_batik/<?=$batik['gambar'] ?>" class="card-img-top"
                                        alt="..." style="height: 200px;">
                                    <div class="card-body border-light">
                                        <h5 class="card-title"><?= $batik['nama_batik'] ?></h5>
                                        <p class="card-text text-secondary">Diajukan Oleh : <?=$batik['nama'] ?></p>
                                        <p class="card-text"><?=$batik['excerpt'] ?></p>
                                        <a href="<?= BASEURL ?>/dashboard/detail_penambahan/<?= $batik['id_batik'] ?>"
                                            class="btn btn-primary">Baca
                                            Sekarang »</a>
                                        <!-- <div class="mt-2 mx-1 text-center">
                                            <button type="button" class="btn btn-danger btnTambahTolak"
                                                data-id="<?=BASEURL?>/dashboard/tolakPengajuanBatikBaru/<?=$batik['id_batik'] ?>">Tolak</button>
                                            <button type="button" class="btn btn-success btnTambahSetuju"
                                                data-id="<?=BASEURL?>/dashboard/setujuPengajuanBatikBaru/<?=$batik['id_batik'] ?>">Setujui</button>
                                        </div> -->
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php endif ?>
                        <?php if($data['user']['hakAkses']=='member'):?>
                        <?php if(empty($data['temp'])&& empty($data['tambah'])):?>
                        <div class="row mt-2">
                            <div class="container">
                                <h5 class="alert alert-info">Anda tidak memiliki pengajuan yang harus sedang diproses
                                    </h3>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if(!empty($data['temp'])) : ?>
                        <div class="row mt-2">
                            <div class="container">
                                <h2>Pengajuan Perubahan yang Diproses</h2>
                            </div>
                            <div class="d-flex flex-wrap justify-content-center">
                                <?php 
                                foreach ($data['temp'] as $batik) : ?>
                                <div class="card border mx-3 mt-3" style="width: 18rem;">
                                    <img src="<?= BASEURL ?>/img/img_batik/<?=$batik['gambar'];?>" class="card-img-top"
                                        alt="..." style="height: 200px;">
                                    <div class="card-body border-light">
                                        <h5 class="card-title"><?= $batik['nama_batik'] ?></h5>
                                        <p class="card-text"><?=$batik['excerpt'] ?></p>
                                        <a href="<?= BASEURL ?>/dashboard/detail_perubahan/<?= $batik['id_temp'] ?>/<?= $batik['id_batik'] ?>"
                                            class="btn btn-primary">Baca
                                            Sekarang »</a>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if(!empty($data['tambah'])):?>
                        <div class="row mt-2">
                            <div class="container">
                                <h2>Pengajuan Penambahan yang Diproses</h2>
                            </div>
                            <div class="d-flex flex-wrap justify-content-center">
                                <?php 
                                foreach ($data['tambah'] as $batik) : ?>
                                <div class="card border mx-3 mt-3" style="width: 18rem;">
                                    <img src="<?= BASEURL ?>/img/img_batik/<?=$batik['gambar'];?>" class="card-img-top"
                                        alt="..." style="height: 200px;">
                                    <div class="card-body border-light">
                                        <h5 class="card-title"><?= $batik['nama_batik'] ?></h5>
                                        <p class="card-text"><?=$batik['excerpt'] ?></p>
                                        <a href="<?= BASEURL ?>/dashboard/detail_penambahan/<?= $batik['id_batik'] ?>"
                                            class="btn btn-primary">Baca
                                            Sekarang »</a>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->