<?php
class Dashboard extends Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->model('User_model')->getSingleUser($_SESSION['user_session']);
        $data['batik'] = $this->model('Batik_model')->getAllBatik();
        $data['sum_member'] = count($this->model('User_model')->getAllUser());
        $data['sum_batik'] = count($this->model('Batik_model')->getAllBatik());
        $data['temp'] = $this->model('Batik_model')->getPengajuanByUser($_SESSION['user_session']);
        $data['tambah'] = $this->model('Batik_model')->getPenambahanByUser($_SESSION['user_session']);
        $data['pengajuan'] = $this->model('Batik_model')->getPengajuan();
        $data['penambahan'] = $this->model('Batik_model')->getPenambahan();
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer.sidebar');
    }
    public function member()
    {
        $data['judul'] = 'Member';
        $data['user'] = $this->model('User_model')->getSingleUser($_SESSION['user_session']);
        $data['member'] = $this->model('User_model')->getAllUser();
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/member', $data);
        $this->view('templates/footer.sidebar');
    }
    public function batik()
    {
        $data['judul'] = 'Batik';
        $data['user'] = $this->model('User_model')->getSingleUser($_SESSION['user_session']);
        $data['batik'] = $this->model('Batik_model')->getAllBatik();
        $data['provinsi'] = $this->model('Batik_model')->getProvinsi();
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/batik', $data);
        $this->view('templates/footer.sidebar');
    }
    public function profil()
    {
        $data['judul'] = 'Profil';
        $data['user'] = $this->model('User_model')->getSingleUser($_SESSION['user_session']);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/profil', $data);
        $this->view('templates/footer.sidebar');
    }
    public function detail($id)
    {
        $data['judul'] = 'Detail Batik';
        $data['user'] = $this->model('User_model')->getSingleUser($_SESSION['user_session']);
        $data['batik'] = $this->model('Batik_model')->getBatikById($id);
        $data['provinsi'] = $this->model('Batik_model')->getProvinsi();
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/detail', $data);
        $this->view('templates/footer.sidebar');
    }
    public function detail_penambahan($id)
    {
        $data['judul'] = 'Detail Batik';
        $data['user'] = $this->model('User_model')->getSingleUser($_SESSION['user_session']);
        $data['batik'] = $this->model('Batik_model')->getBatikById($id);
        $data['data_pengajuan'] = $this->model('Batik_model')->getPengajuanBatikById($id);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/detail_penambahan', $data);
        $this->view('templates/footer.sidebar');
    }
    public function detail_perubahan($id_temp, $id_batik)
    {
        $data['judul'] = 'Detail Batik';
        $data['user'] = $this->model('User_model')->getSingleUser($_SESSION['user_session']);
        $data['batik'] = $this->model('Batik_model')->getBatikById($id_batik);
        $data['data_pengajuan'] = $this->model('Batik_model')->getPengajuanBatikById($id_temp);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/detail_perubahan', $data);
        $this->view('templates/footer.sidebar');
    }
    public function getKab(){
        echo json_encode($this->model('Batik_model')->getKabById($_POST['id']));
    }
    public function tambahBatik()
    {
        if ($this->model('Batik_model')->tambahDataBatik($_POST) > 0) {
            Flasher::setFlash('Data Batik berhasil', 'ditambahkan. Jika anda member, maka data akan ditinjau oleh admin terlebih dahulu', 'success');
            header("Location: " . BASEURL . "/dashboard/batik");
            exit;
        } else {
            Flasher::setFlash('Data Batik gagal', 'ditambahkan', 'danger');
            header("Location: " . BASEURL . "/dashboard/batik");
            exit;
        }
    }
    public function hapusUser($id)
    {
        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            Flasher::setFlash('Data user berhasil', 'dihapus', 'success');
            header("Location: " . BASEURL . "/dashboard/member");
            exit;
        } else {
            Flasher::setFlash('Data user gagal', 'dihapus', 'danger');
            header("Location: " . BASEURL . "/dashboard/member");
            exit;
        }
    }
    public function logout()
    {
        $this->view('dashboard/logout');
    }
    public function ubahProfil(){
        if ($this->model('User_model')->ubahDataUser($_POST) > 0) {
            Flasher::setFlash('Data berhasil', 'diubah', 'success');
            header("Location: " . BASEURL . "/dashboard/profil");
            exit;
        } else {
            Flasher::setFlash('Data gagal', 'diubah', 'danger');
            header("Location: " . BASEURL . "/dashboard/profil");
            exit;
        }
    }
    public function getUbahBatik(){
        echo json_encode($this->model('Batik_model')->getBatikById($_POST['id']));
    }
    public function pengajuanUbahBatik(){
        if($_SESSION['hakAkses']==='member'){
            if ($this->model('Batik_model')->pengajuanUbahDataBatik($_POST) > 0) {
                Flasher::setFlash('Pengajuan perubahan', 'berhasil', 'success');
                header("Location: " . BASEURL . "/dashboard/batik");
                exit;
            } else {
                Flasher::setFlash('Pengajuan perubahan', 'gagal', 'danger');
                header("Location: " . BASEURL . "/dashboard/batik");
                exit;
            }
        }
        if($_SESSION['hakAkses']==='admin'){
            if ($this->model('Batik_model')->ubahDataBatikAdmin($_POST) > 0) {
                Flasher::setFlash('Perubahan', 'berhasil', 'success');
                header("Location: " . BASEURL . "/dashboard/batik");
                exit;
            } else {
                Flasher::setFlash('Perubahan', 'gagal', 'danger');
                header("Location: " . BASEURL . "/dashboard/batik");
                exit;
            }
        }
    }
    public function tolakPengajuanBatikBaru($id){
        if ($this->model('Batik_model')->tolakPengajuanDataBaru($id) > 0) {
            Flasher::setFlash('Pengajuan', 'berhasil ditolak', 'success');
            header("Location: " . BASEURL . "/dashboard/index");
            exit;
        } else {
            Flasher::setFlash('Pengajuan', 'gagal ditolak', 'danger');
            header("Location: " . BASEURL . "/dashboard/index");
            exit;
        }
    }
    public function setujuPengajuanBatikBaru($id){
        if ($this->model('Batik_model')->setujuPengajuanDataBaru($id) > 0) {
            Flasher::setFlash('Pengajuan', 'berhasil disetujui', 'success');
            header("Location: " . BASEURL . "/dashboard/index");
            exit;
        } else {
            Flasher::setFlash('Pengajuan', 'gagal disetujui', 'danger');
            header("Location: " . BASEURL . "/dashboard/index");
            exit;
        }
    }
    public function tolakPerubahan($id){
        if ($this->model('Batik_model')->tolakPengajuanPerubahan($id) > 0) {
            Flasher::setFlash('Pengajuan', 'berhasil ditolak', 'success');
            header("Location: " . BASEURL . "/dashboard/index");
            exit;
        } else {
            Flasher::setFlash('Pengajuan', 'gagal ditolak', 'danger');
            header("Location: " . BASEURL . "/dashboard/index");
            exit;
        }
    }
    public function setujuPerubahan($id){
        if ($this->model('Batik_model')->setujuPengajuanPerubahan($id) > 0) {
            Flasher::setFlash('Pengajuan', 'berhasil disetujui', 'success');
            header("Location: " . BASEURL . "/dashboard/index");
            exit;
        } else {
            Flasher::setFlash('Pengajuan', 'gagal disetujui', 'danger');
            header("Location: " . BASEURL . "/dashboard/index");
            exit;
        }
    }
    public function error($params){
        if($params==1){
            Flasher::setFlash('Anda harus login terlebih dahulu!!!','Access Denied!', 'danger');
            header("Location: " . BASEURL . "/login");
            exit;
        } else if($params==2){
            Flasher::setFlash('Hubungi administrator!','Gagal Koneksi ke Database', 'danger');
            header("Location: " . BASEURL . "/login");
            exit;
        }
    }
}