<?php

class Admin extends Controller
{
    public function test(){
        $data['namePage'] = 'Tambah Buku';
        $data['css'] = 'tambah_buku.css';
        $this->view('templates/header',$data);
        $this->view('home/tambah_buku');
        $this->view('templates/footer');
    }
   
}