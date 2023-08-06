<?php 

class Batik_model {
    private $dbh;
    private $stmt;
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllBatik(){
        $this->db->query("SELECT * FROM batik JOIN user USING(id_user) JOIN provinsi USING(provinsi_id) JOIN kabupaten_kota USING(kabupaten_kota_id) where status=:status");
        $this->db->bind('status','1');
        return $this->db->resultSet();
    }
    public function getCariDataBatik(){
        $keyword = $_POST['keyword'];
        $this->db->query("SELECT * FROM batik JOIN user USING(id_user) JOIN provinsi USING(provinsi_id) JOIN kabupaten_kota USING(kabupaten_kota_id) where batik.nama_batik LIKE :keyword or provinsi.nama_prov LIKE :keyword or kabupaten_kota.nama_kab LIKE :keyword or user.nama LIKE :keyword and batik.status=:status");
        $this->db->bind('keyword',"%$keyword%");
        $this->db->bind('status','1');
        return $this->db->resultSet();
    }
    public function getBatikById($id)
    {
        $this->db->query("SELECT * FROM batik JOIN user USING(id_user) JOIN provinsi USING(provinsi_id) JOIN kabupaten_kota USING(kabupaten_kota_id) WHERE id_batik=:id_batik");
        $this->db->bind('id_batik',$id);
        return $this->db->single();
    }
    public function getProvinsi(){
        $this->db->query("SELECT * FROM provinsi");
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function tambahDataBatik($data){
        $namaFile = $_FILES['tambah-gambar']['name'];
        if($namaFile!=""){
            $x = explode('.', $namaFile);
            $ekstensi = strtolower(end($x));
            $ekstensiYangDibolehkan = [
                'image/png',
                'image/jpg',
                'image/jpeg',
                'image/webp'
            ];
            $ukuranFile = $_FILES['tambah-gambar']['size'];
            $error = $_FILES['tambah-gambar']['error'];
            $tmpName = $_FILES['tambah-gambar']['tmp_name'];
                if (!in_array(mime_content_type($tmpName), $ekstensiYangDibolehkan)) {
                    echo "
                    <script>
                    alert('File tidak sesuai!');
                    </script>";
                    exit;
                }else if($ukuranFile > 1000 * 10000){
                    echo "
                    <script>
                    alert('File terlalu besar!');
                    </script>";
                    exit;
                }
                else {
                $file = $data['tambah-kota']."-".$data['tambah-batik'].".".$ekstensi;
                move_uploaded_file($tmpName,$_SERVER["DOCUMENT_ROOT"]."/rpl2/public/img/img_batik/".$file);
                }
                $query = "INSERT INTO batik VALUES ('',:id_user,:provinsi_id,:kab_id,:nama,:deskripsi,:excerpt,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP(),:status,:gambar)";
                $this->db->query($query);
                $this->db->bind('id_user',$data['user']);
                $this->db->bind('provinsi_id',$data['tambah-provinsi']);
                $this->db->bind('kab_id',$data['tambah-kota']);
                $this->db->bind('nama',$data['tambah-batik']);
                $this->db->bind('deskripsi',$data['tambah-deskripsi']);
                $this->db->bind('excerpt',$data['tambah-excerpt']);
                if($data['hakAkses']=='admin'){
                    $this->db->bind('status','1');
                }else{
                    $this->db->bind('status','0');
                }
                $this->db->bind('gambar',$file);
                $this->db->execute();
                return $this->db->rowCount();
            } else {
                echo "
                <script>
                alert('Upload Gambar Batik!');
                </script>";
            }

    }
    public function getKabById($id){
        $this->db->query("SELECT * FROM kabupaten_kota WHERE provinsi_id=:id");
        $this->db->bind('id',$id);
        return $this->db->resultSet();
    }
    public function ubahDataBatikAdmin($data){
        $change = 0;
        $query = "SELECT gambar from batik where id_batik=:id";
        $this->db->query($query);
        $this->db->bind('id',$data['edit_id']);
        $this->db->execute();
        $gambar = $this->db->single();
        $namaFile = $_FILES['edit-gambar']['name'];
        if($namaFile!=""){
            if(file_exists($_SERVER["DOCUMENT_ROOT"]."/rpl2/public/img/img_batik/".$gambar['gambar'])){
                unlink($_SERVER["DOCUMENT_ROOT"]."/rpl2/public/img/img_batik/".$gambar['gambar']);
            }
            $x = explode('.', $namaFile);
            $ekstensi = strtolower(end($x));
            $ekstensiYangDibolehkan = [
                'image/png',
                'image/jpg',
                'image/jpeg',
                'image/webp'
            ];
            $ukuranFile = $_FILES['edit-gambar']['size'];
            $error = $_FILES['edit-gambar']['error'];
            $tmpName = $_FILES['edit-gambar']['tmp_name'];
                if (!in_array(mime_content_type($tmpName), $ekstensiYangDibolehkan)) {
                    echo "
                    <script>
                    alert('File tidak sesuai!');
                    </script>";
                    exit;
                }else if($ukuranFile > 1000 * 10000){
                    echo "
                    <script>
                    alert('File terlalu besar!');
                    </script>";
                    exit;
                }
                else {
                $file = $data['edit-kota']."-".$data['edit-batik'].".".$ekstensi;
                move_uploaded_file($tmpName,$_SERVER["DOCUMENT_ROOT"]."/rpl2/public/img/img_batik/".$file);
                $change = 1;
                }
                $query = "UPDATE batik set id_user=:id_user, provinsi_id=:prov, kabupaten_kota_id=:kab, nama_batik=:nama, deskripsi=:deskripsi, excerpt=:excerpt, last_modified=CURRENT_TIMESTAMP(), status=:status, gambar=:gambar where id_batik=:id_batik";
                $this->db->query($query);
                $this->db->bind('id_batik',$data['edit-id']);
                $this->db->bind('id_user',$data['edit-id-user']);
                $this->db->bind('prov',$data['edit-provinsi']);
                $this->db->bind('kab',$data['edit-kota']);
                $this->db->bind('nama',$data['edit-batik']);
                $this->db->bind('deskripsi',$data['edit-deskripsi']);
                $this->db->bind('excerpt',$data['edit-excerpt']);
                $this->db->bind('status','1');
                $this->db->bind('gambar',$file);
                $this->db->execute();
                return array($this->db->rowCount(), $change);
                // return $this->db->rowCount();
            } else {
                $query = "UPDATE batik set id_user=:id_user, provinsi_id=:prov, kabupaten_kota_id=:kab, nama_batik=:nama, deskripsi=:deskripsi, excerpt=:excerpt, last_modified=CURRENT_TIMESTAMP(), status=:status where id_batik=:id_batik";
                $this->db->query($query);
                $this->db->bind('id_batik',$data['edit-id']);
                $this->db->bind('id_user',$data['edit-id-user']);
                $this->db->bind('prov',$data['edit-provinsi']);
                $this->db->bind('kab',$data['edit-kota']);
                $this->db->bind('nama',$data['edit-batik']);
                $this->db->bind('deskripsi',$data['edit-deskripsi']);
                $this->db->bind('excerpt',$data['edit-excerpt']);
                $this->db->bind('status','1');
                $this->db->execute();
                // return array($this->db->rowCount(), $change);
                return $this->db->rowCount();
            }
    }
    public function pengajuanUbahDataBatik($data){
        $query = "INSERT INTO temp VALUES ('',:id_batik,:id_user,:provinsi_id,:kab_id,:nama,:deskripsi,:excerpt,CURRENT_TIMESTAMP(),:status,:gambar)";
        $this->db->query($query);
        $this->db->bind('id_batik',$data['edit-id']);
        $this->db->bind('id_user',$data['edit-id-user']);
        $this->db->bind('provinsi_id',$data['edit-provinsi']);
        $this->db->bind('kab_id',$data['edit-kota']);
        $this->db->bind('nama',$data['edit-batik']);
        $this->db->bind('deskripsi',$data['edit-deskripsi']);
        $this->db->bind('excerpt',$data['edit-excerpt']);
        $this->db->bind('status','0');
        $this->db->bind('gambar',$data['edit-gambar-hidden']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getPengajuanByUser($id){
        $query = "SELECT * FROM temp where id_user=:id_user and status=:status";
        $this->db->query($query);
        $this->db->bind('id_user',$id);
        $this->db->bind('status',"0");
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getPenambahanByUser($id){
        $query = "SELECT * FROM batik where id_user=:id_user and status=:status";
        $this->db->query($query);
        $this->db->bind('id_user',$id);
        $this->db->bind('status',"0");
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getPengajuan(){
        $query = "SELECT * FROM temp JOIN user USING(id_user) JOIN provinsi USING(provinsi_id) JOIN kabupaten_kota USING(kabupaten_kota_id) where status=:status";
        $this->db->query($query);
        $this->db->bind('status','0');
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getPenambahan(){
        $query = "SELECT * FROM batik JOIN user USING(id_user) JOIN provinsi USING(provinsi_id) JOIN kabupaten_kota USING(kabupaten_kota_id) where status=:status";
        $this->db->query($query);
        $this->db->bind('status','0');
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function tolakPengajuanDataBaru($id){
        $query = "SELECT gambar from batik where id_batik=:id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->execute();
        $gambar = $this->db->single();
        if(file_exists($_SERVER["DOCUMENT_ROOT"]."/rpl2/public/img/img_batik/".$gambar['gambar'])){
            unlink($_SERVER["DOCUMENT_ROOT"]."/rpl2/public/img/img_batik/".$gambar['gambar']);
        }
        $query = "DELETE FROM batik where id_batik=:id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function setujuPengajuanDataBaru($id){
        $query = "UPDATE batik set status=:status where id_batik=:id";
        $this->db->query($query);
        $this->db->bind('status',"1");
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getPengajuanBatikById($id)
    {
        $this->db->query("SELECT * FROM temp JOIN user USING(id_user) JOIN provinsi USING(provinsi_id) JOIN kabupaten_kota USING(kabupaten_kota_id) WHERE id_temp=:id");
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function tolakPengajuanPerubahan($id){
        $query = "UPDATE temp set status=:status where id_temp=:id";
        $this->db->query($query);
        $this->db->bind('status',"1");
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function setujuPengajuanPerubahan($id){
        $query = "SELECT * from temp where id_temp=:temp";
        $this->db->query($query);
        $this->db->bind('temp',$id);
        $this->db->execute();
        $id_batik = $this->db->single();
        $query = "UPDATE batik join temp using(id_batik) set batik.nama_batik=:batik, batik.deskripsi=:deskripsi, batik.excerpt=:excerpt, batik.last_modified=:modified, batik.status=:status, batik.id_user=:id_user, batik.provinsi_id=:prov, batik.kabupaten_kota_id=:kab where batik.id_batik =:id_batik AND temp.id_temp=:id_temp";
        $this->db->query($query);
        $this->db->bind('batik',$id_batik['nama_batik']);
        $this->db->bind('deskripsi',$id_batik['deskripsi']);
        $this->db->bind('excerpt',$id_batik['excerpt']);
        $this->db->bind('modified',$id_batik['last_modified']);
        $this->db->bind('status',"1");
        $this->db->bind('id_user',$id_batik['id_user']);
        $this->db->bind('prov',$id_batik['provinsi_id']);
        $this->db->bind('kab',$id_batik['kabupaten_kota_id']);
        $this->db->bind('id_batik',$id_batik['id_batik']);
        $this->db->bind('id_temp',$id);
        $this->db->execute();
        $query = "UPDATE temp set status=:status where id_temp=:temp";
        $this->db->query($query);
        $this->db->bind('status',"1");
        $this->db->bind('temp',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}