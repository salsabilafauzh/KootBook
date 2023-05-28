<?php

class user_model extends Controller{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllUser() {
        $Role = "Admin";
        $this->db->query("SELECT * FROM user WHERE Role != '{$Role}' ");
        return $this->db->resultSet();
    }
    
    public function getUser($data){
        $this->db->query('SELECT * FROM user WHERE Email = :Email');
        $this->db->bind('Email', $data['Email']);
        return $this->db->single();
    }
    public function getUserRole($data)
    {
        $query = "SELECT Role FROM user WHERE Email = :Email";
        $this->db->query($query);
        $this->db->bind('Role', $data['Role']);
        return $this->db->single();
    }

    public function insertUser($data){
        
        if($data['Password'] != $data['ComPassword']){
            //BUTUH ALERT INFORMASI PASSWORD GA SAMA
            header('Location: '.BASEURL.'/Home/SignUp');
        }else{
            if($this-> getUser($data) > 0){
                //BUTUH ALERT EMAIL SUDAH TERDAFTAR
             }else{
                 $this->db->query("INSERT INTO user VALUES ('', :Username, :Email, :Password, :Role)");
     
                 $this->db->bind('Username', $data['Username']);
                 $this->db->bind('Email', $data['Email']);
                 $this->db->bind('Password', $data['Password']);
                 $this->db->bind('Role', 'user');
         
                 $this->db->execute();
                 return $this->db->rowCount();
             }
        }
    }

}