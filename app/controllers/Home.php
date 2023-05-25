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
        if($this->model('user_model')->getUser($_POST) > 0){
            header('Location: '. BASEURL .'/Admin/test');
        }else{
            $this->index();
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

    // public function auth(){
    //     if($data = $this->model('user_model')->getUser($_POST)){
    //         if(password_verify($_POST['password'], $data['password'])){
    //             session_start();
    //             $_SESSION['user'] = $data;
    //             header('Location: '.BASEURL.'/summary');
    //             exit;
    //         }
    //     }
    //     $_SESSION['invalid-login'] = true;
    //     header('Location: '.BASEURL.'/home/login');
    //     exit;
    // }

}