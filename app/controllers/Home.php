<?php

class Home extends Controller
{
    public function index()
    {
        $data['namePage'] = 'Sign In';
        $data['css'] = 'SignIn.css';
        $data['img'] = 'Background-SignInSignUp.jpg';
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
}