<div class="content-wrapper ">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <!--Content Card-->
                    <div class="row">
                        <div class="me-md-3 me-xl-5">
                            <h1>Member</h1>
                            <div class="col-6">
                                <?= Flasher::flash(); ?>
                            </div>
                            <div class="table-responsive">
                                <table id="data-member" class="table table-striped mt-4 table-paginate" align="center">
                                    <thead>
                                        <tr class="table-dark" align="center">
                                            <td>Nama</td>
                                            <td>Email</td>
                                            <td>Hak Akses</td>
                                            <td>Tanggal Lahir</td>
                                            <td>JK</td>
                                            <td>Aksi </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['member'] as $data) : ?>
                                        <tr align="center">
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['hakAkses'] ?></td>
                                            <td><?= $data['tgl_lahir'] ?></td>
                                            <td><?= $data['jk'] ?></td>
                                            <td>
                                                <button type="button" style="height: 30px"
                                                    id="<?= BASEURL ?>/dashboard/hapusUser/<?= $data['id_user'] ?>"
                                                    class="btn btn-danger hapus">Hapus</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->