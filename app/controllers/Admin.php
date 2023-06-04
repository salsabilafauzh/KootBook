<?php

class Admin extends Controller
{
    public function index()
    {
        $data['namePage'] = 'Admin-Page';
        $data['css'] = 'Admin-homepage.css';
        $data['header'] = 'Admin Homepage';
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');
        $this->view('Admin/index');
        $this->view('templates/footer');
    }
    public function listUser()
    {
        $data['namePage'] = 'List-User';
        $data['css'] = 'ListUser.css';
        $data['header'] = 'Manajemen User';
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');
        $data['user']= $this->model('user_model')->getAllUser();
        if($data){
            $this->view('Admin/List_User',$data);
        }else{
            $this->view('Admin/');
        }
      
        $this->view('templates/footer');
    }
    public function cekPeminjam()
    {
        $data['namePage'] = 'Cek-Peminjam';
        $data['css'] = 'Admin.css';
        $this->view('templates/header',$data);
        $this->view('Admin/templates/sidebar');
        $this->view('Admin/index');
        $this->view('templates/footer');
    }
    public function tambahBuku(){
        // $data['namePage'] = 'Tambah Buku';
        // $data['css'] = 'Admin-tambahBuku.css';
        // $this->view('Admin/templates/header',$data);
        // $this->view('Admin/tambah_buku',$data);
        // $this->view('templates/footer');
        $data['namePage'] = 'Tambah Buku';
        $data['css'] = 'Admin-tambahBuku.css';
        $data['header'] = 'Tambah Buku';
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');
        $this->view('Admin/tambah_buku');
        $this->view('templates/footer');
    }
    public function updateBuku(){
        // $data['namePage'] = 'Update Buku';
        // $data['css'] = 'Admin-updateBuku.css';
        // $data['header'] = 'Update Buku';
        // $this->view('templates/header',$data);
        // $this->view('Admin/templates/header',$data);
        // $this->view('Admin/update_buku');
        // $this->view('templates/footer');

        $data['namePage'] = 'Update Buku';
        $data['css'] = 'Admin-updateBuku.css';
        $data['header'] = 'Update Buku';
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');
        $this->view('Admin/update_buku');
        $this->view('templates/footer');
    }
    public function updateBukuDetail(){
        $data['namePage'] = 'Update Buku';
        $data['css'] = 'Admin-updateBukuDetail.css';
        $data['header'] = 'Update Buku';
        $this->view('templates/header',$data);
        $this->view('Admin/templates/header',$data);
        $this->view('Admin/templates/sidebar');
        $this->view('Admin/update_buku_detail');
        $this->view('templates/footer');
    }
}