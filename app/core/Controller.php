<?php

class Controller{
    public function view($direct, $data = []){
        require_once '../app/views/'. $direct .'.php';
    }

    public function model($model){
        require_once '../app/models/' . $model .'.php';

        return new $model;
    }
}