<?php

class User extends Controller{
    function __construct()
    {
        session_start();
        if(isset($_SESSION['Email'])){
            header('Location: '.BASEURL.'/User/');
            exit;
        }
    }
    public function index(){
        $data['namePage'] = 'Home Page';
        $data['css'] = 'HomePage.css';
        $this->view('templates/header',$data);
        $data['book']= $this->model('book_model')->getAllBook();
        $this->view('User/HomePage',$data);
        $this->view('templates/footer');
    }

    public function DetailBuku($id){
        $data['namePage'] = 'Detail Buku';
        $data['css'] = 'Detail-buku.css';
        $data['book'] = $this->model('book_model')->getBookId($id);
        $this->view('templates/header',$data);
        $this->view('User/detailBuku',$data);
        $this->view('templates/footer');
    }

    public function PinjamBuku($id){
        $data['namePage'] = 'Pinjam Buku';
        $data['css'] = 'PinjamBuku.css';
        $data['book'] = $this->model('book_model')->getBookId($id);
        $this->view('templates/header',$data);
        $this->view('User/PinjamBuku',$data);
        $this->view('templates/footer');
    }

    public function About(){
        $data['namePage'] = 'About KootBook';
        $data['css'] = 'About.css';
        $this->view('templates/header',$data);
        $this->view('User/About');
        $this->view('templates/footer');
    }

    public function booklistPage(){
        $data['namePage'] = 'Book List';
        $data['css'] = 'Booklist.css';
        $this->view('templates/header',$data);
        $data['book']= $this->model('book_model')->getAllBook();
        $this->view('User/BookList',$data);
        $this->view('templates/footer');
    }
    public function booklist($id){
        $data['namePage'] = 'Book List';
        $data['css'] = 'Booklist.css';
        $this->view('templates/header',$data);
        if ($id == 0 || $id == null || $id == '') {
            $data['book']= $this->model('book_model')->getAllBook();
        }else{
            $data['book']= $this->model('book_model')->getBookId($id);
        }
        $this->view('User/BookList',$data);
        $this->view('templates/footer');
    }


    /**
     * 
     * fungsional
     */

     public function cariBuku()
    {
        $data['query'] = $_POST['query'];
        $data['id']= $this->model('book_model')->searchBookQuery($data['query']);
    
        if($data['id'] && $data['id'] != 0){
            $this->booklist((int) $data['id']);
        }else{
            $this->booklist((int) $data['id']);
            echo '<script> alert("Data tidak ditemukan"); </script>';
        }
    }

    public static function logout() {
        unset($_SESSION['Email']);
        header('Location: '.BASEURL.'/');
        exit();
    }
}


    