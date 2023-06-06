<?php

class Home extends Controller
{
    
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
        if(isset($data) && $role != NULL){
            if($this->model('user_model')->getUser($_POST) > 0 && $role == "Admin" ){
                session_start();
                $_SESSION['User'] = $data; 
                header('Location: '. BASEURL .'/Admin/');
            }else{
                session_start();
                $_SESSION['User'] = $data; 
                header('Location: '. BASEURL .'/User/HomePage');
            }

        }else{
            $_SESSION['invalid-login'] = true;
            header('Location: '.BASEURL.'/');
            exit;
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

}