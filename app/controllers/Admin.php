<?php

class Admin extends Controller
{
    public function index()
    {
        $data['namePage'] = 'Admin-Page';
        $data['css'] = 'Admin.css';
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
        $data['css'] = 'Admin.css';
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
        $data['namePage'] = 'Tambah Buku';
        $data['css'] = 'tambah_buku.css';
        $this->view('templates/header',$data);
        $this->view('Admin/tambah_buku');
        $this->view('templates/footer');
    }
   
}