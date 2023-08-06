<?php
class Home extends Controller{
    public function index(){
        $data['judul'] = 'Home';
        $data['batik'] = $this->model('Batik_model')->getAllBatik();
        $this->view('templates/header',$data);
        $this->view('home/index',$data);
        $this->view('templates/footer');
    }
    public function detail($id){
        $data['judul'] = 'Detail Batik';
        $data['batik'] = $this->model('Batik_model')->getBatikById($id);
        $this->view('templates/header',$data);
        $this->view('home/detail',$data);
        $this->view('templates/footer');
    }
    public function cari(){
        $data['judul'] = 'Home';
        $data['batik'] = $this->model('Batik_model')->getCariDataBatik();
        $this->view('templates/header',$data);
        $this->view('home/index',$data);
        $this->view('templates/footer');
    }
}