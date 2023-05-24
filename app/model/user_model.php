<?php

class user_model{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getUser($data){
        $this->db->query('SELECT * FROM user WHERE Username = :username');
        $this->db->bind('username', $data['username']);
        return $this->db->single();
    }
}