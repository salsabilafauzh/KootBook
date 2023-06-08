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

    public function booklistPage()
    {
    $data['namePage'] = 'Book List';
    $data['css'] = 'Booklist.css';
    $this->view('templates/header', $data);

    if (isset($_POST['query'])) {
        $searchQuery = $_POST['query'];
        $data['book'] = $this->model('book_model')->searchBookQuery($searchQuery);

        if (isset($data['book']) && count($data['book']) > 0) {
            $this->view('User/BookList', $data);
        } else {
            echo "<script>alert('Data buku tidak ditemukan');</script>";
            $data['book'] = $this->model('book_model')->getAllBook();
            $this->view('User/BookList', $data);
        }
    } else {
        $data['book'] = $this->model('book_model')->getAllBook();
        $this->view('User/BookList', $data);
    }

    $this->view('templates/footer');
    }

    public function historyPage()
    {
         $this->view('User/History'); 
    }

    /**
     * 
     * fungsional
     */

     public function cariBuku()
    {
        $data['book']= $this->model('book_model')->searchBookQuery($_POST['query']);
        if(isset($data['book'])){
            $data['namePage'] = 'Search Book';
            $data['css'] = 'Booklist.css';
            $this->view('templates/header',$data);
            $this->view('User/BookList',$data);
            $this->view('templates/footer');
        }else{
            echo "<script>alert('Data buku tidak ditemukan');</script>";
            header('Location: ' . BASEURL . '/User/booklistPage');
            exit();
        }    
    }
    public function pinjamBukuTrigger($id){
        $data['ID_User'] = $_SESSION['User']['ID_User'];
        $data['book'] = $this->model('book_model')->getBookId($id);
    
        if (isset($data['book']) && isset($data['ID_User'])) {
            if ($this->model('book_model')->insertPinjam($data['ID_User'], (int)$data['book'][0]['ID_Buku'], $data['book'][0]['Stock'], $data['book'][0]['Judul']) > 0) {
                echo "<script>alert('Berhasil meminjam!'); setTimeout(function() { window.location.href = '".BASEURL."/User/historyPage/'; }, 1000);</script>";
            } else {
                echo "<script>alert('Error!'); setTimeout(function() { window.location.href = '".BASEURL."/User/historyPage/'; }, 1000);</script>";
            }
        }
        
    }
    public static function logout() {
        unset($_SESSION['Email']);
        header('Location: '.BASEURL.'/');
        exit();
    }
}


    