<?php

class Home extends Controller
{
    // public function __construct()
    // {
    //     session_start();
    //     if(isset($_SESSION['user'])){
    //         header('Location: '.BASEURL.'/');
    //         exit;
    //     }
    // }
    public function index()
    {
        $data['namePage'] = 'Sign In';
        $data['css'] = 'SignIn.css';
        $this->view('templates/header',$data);
        $this->view('home/index');
        $this->view('templates/footer');
    }

    public function SignUp(){
        $data['namePage'] = 'Sign Up';
        $data['css'] = 'SignUp.css';
        $this->view('templates/header',$data);
        $this->view('Home/SignUp');
        $this->view('templates/footer');
    }

    public function SignIn(){
        $data = $this->model('user_model')->getUser($_POST);
        $role = $data['Role'];
        if($this->model('user_model')->getUser($_POST) > 0 && $role == "Admin" ){
            header('Location: '. BASEURL .'/Admin/');
        }else{
            $this->HomePage();
        }

    }
    public function signUpSession(){
        if($this->model('user_model')->insertUser($_POST) > 0){
            $this->index();
            exit;
        }else{
            $this->SignUp();
        }
    }

    public function HomePage(){
        $data['namePage'] = 'Home Page';
        $data['css'] = 'HomePage.css';
        $this->view('templates/header',$data);
        $this->view('User/HomePage');
        $this->view('templates/footer');
    }

    public function DetailBuku(){
        $data['namePage'] = 'Detail Buku';
        $data['css'] = 'Detail-buku.css';
        $this->view('templates/header',$data);
        $this->view('User/detailBuku');
        $this->view('templates/footer');
    }

    // public function auth(){
    //     if($data = $this->model('user_model')->getUser($_POST)){
    //         if(password_verify($_POST['Password'], $data['Password'])){
    //             session_start();
    //             if($this->model('user_model')->getUserRole($_POST['Email']) == 'Admin'){
    //                 $_SESSION['user'] = $data;
    //                             header('Location: '.BASEURL.'/Admin/');
    //                             exit;
    //             }else{
    //                 $_SESSION['user'] = $data;
    //                 header('Location: '.BASEURL.'/Home/');
    //                             exit;
    //             }
    //         }
    //     }
    //     $_SESSION['invalid-login'] = true;
    //     header('Location: '.BASEURL.'/');
    //     exit;
    // }

}