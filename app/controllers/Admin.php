<?php

class Admin extends Controller
{
    function __construct()
    {
        session_start();
        if(isset($_SESSION['Email'])){
            header('Location: '.BASEURL.'/Admin/');
            exit;
        }
    }

    public function index()
    {
        $data['namePage'] = 'Admin Homepage';
        $data['css'] = 'Admin-homepage.css';
        $data['header'] = 'Admin Homepage';
        $data['nama-admin'] = $_SESSION['User']['Username'];
        $data['total-pengguna'] = count($this->model('user_model')->getAllUser());
        $data['total-stock'] = $this->model('book_model')->getStatusStock();
        $data['total-buku'] = count($this->model('book_model')->getAllBook());

        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');
        $this->view('Admin/index',$data);
        $this->view('templates/footer');

    }
    public function listUser($params)
    {
        $data['namePage'] = 'List-User';
        $data['css'] = 'ListUser.css';
        $data['header'] = 'Manajemen User';
        $data['page'] = $params;
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');

        $data['user']= $this->model('user_model')->getAllUser();
        $data['status'] = 0;
        if($data){
            $this->view('Admin/List_User',$data);
        }else{
            $this->view('Admin/');
        }
        $this->view('templates/footer');
    }

    public function hapus($id, $index)
    {
        if($this->model('user_model')->hapusUser($id) > 0){
            header('Location: '.BASEURL.'/Admin/listUser/' . $index);
            exit;
        }
    }
   
    public function tambahBuku(){
        $data['namePage'] = 'Tambah Buku';
        $data['css'] = 'Admin-tambahBuku.css';
        $data['header'] = 'Tambah Buku';
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');
        $this->view('Admin/tambah_buku');
        $this->view('templates/footer');
    }

    public function updateBuku($params){
        $data['namePage'] = 'Update Buku';
        $data['css'] = 'Admin-updateBuku.css';
        $data['header'] = 'Update Buku';
        $data['page'] = $params;
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');
        $data['book']= $this->model('book_model')->getAllBook();
        $data['status'] = 0;
        if($data['book']){
            $this->view('Admin/update_buku',$data);
        }else{
            $this->view('Admin/update_buku',$data);
        }
        $this->view('templates/footer');
    }

    public function updateBukuDetail($id){
        
        $data['namePage'] = 'Update Buku';
        $data['css'] = 'Admin-updateBukuDetail.css';
        $data['header'] = 'Update Buku';
        
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');
        $data['data-buku'] = $this->model('book_model')->getBookId($id);
        $data['ID_Buku'] = (int)$id;

        $this->view('Admin/update_buku_detail',$data['data-buku'][0]);
        $this->view('templates/footer');
    }

    public function deleteBuku($id){
        if($this->model('book_model')->hapusBuku($id) > 0){
            header('Location: '.BASEURL.'/Admin/updateBuku/1');
            exit;
        }
    }

    public function cekPeminjam($id)
    {
        $data['namePage'] = 'Cek Peminjam';
        $data['css'] = 'Admin-pinjamBuku.css';
        $data['header'] = 'Cek Peminjam';
        $data['page'] = $id;
        $data['history-data'] = $this->model('book_model')->getHistoryData();
        $data['history'] = $this->model('book_model')->getAllHistoryJoin();
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');
        $this->view('Admin/pinjam_buku',$data);
        $this->view('templates/footer');
    }


      /*
      
      FUNGSIONALITAS CRUD
      
      */
    public function cariUser()
    {
        $data['namePage'] = 'List User';
        $data['css'] = 'ListUser.css';
        $data['header'] = 'Manajemen User';
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');

        $data['ID_User'] = (int) $_POST['userID'];
        $data['user']= $this->model('user_model')->getUserId($data['ID_User']);
        $data['status'] = 1;

        if(isset($data['user'])){
            $this->view('Admin/List_User',$data);
        }else{
            $this->view('Admin/');
        }
      
        $this->view('templates/footer');
    }
    public function cariPinjam($id)
    {
        $data['namePage'] = 'Cek Peminjam';
        $data['css'] = 'Admin-pinjamBuku.css';
        $data['header'] = 'Cek Peminjam';
        $data['query'] = $_POST['query'];
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');

        if(isset($data['query']) && $data['query'] != ''){
            $data['pinjam']= $this->model('book_model')->getHistory($data['query']);
        }
        $data['pinjam'] = 0;
        $data['status'] = 1;
        if($data['pinjam'] > 0){
        // $this->view('Admin/pinjam_buku',$data);
        $this->cekPeminjam($id);
        }else{
            header('Location: '.BASEURL.'/Admin/cekPinjam/1');
            exit;
        }
      
        
        $this->view('templates/footer');
    }

    public function insertBook()
    {
        if($this->model('book_model')->insertBook($_POST) > 0){
            header('Location: '.BASEURL.'/Admin/updateBuku/1');
            exit;
        }else{
            //ALERTTTT
            $this->tambahBuku();
        }
    }


    public function cariBuku()
    {
        $data['namePage'] = 'Update Buku';
        $data['css'] = 'Admin-updateBuku.css';
        $data['header'] = 'Update Buku';
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');

        $data['ID_Buku'] = (int) $_POST['ID_Buku'];

        $data['book']= $this->model('book_model')->getBookId($data['ID_Buku']);
        $data['status'] = 1;
      
        if($data){
            $this->view('Admin/update_buku',$data);
        }else{
            $this->view('Admin/');
        }
      
        $this->view('templates/footer');
    }
    public function updateBook($id)
    {
        if(isset($id)){
            $cek = $this->model('book_model')->updateBook($id);
          if ($cek > 0) {
            header('Location: '.BASEURL.'/Admin/updateBuku/1');
          }
            exit;
        }else{
            //ALERTTTT
            $this->tambahBuku();
        }
    }

    public static function logout() {
        unset($_SESSION['Email']);
        header('Location: '.BASEURL.'/');
        exit();
    }
}