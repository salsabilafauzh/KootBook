<?php
class book_model extends Controller{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllBook() {
        $this->db->query("SELECT * FROM buku");
        return $this->db->resultSet();
    }
    public function getBook($data) {
        $this->db->query('SELECT * FROM buku WHERE Judul = :Judul');
        $this->db->bind('Judul', $data);
        return $this->db->single();
    }
    public function getBookId($data){
        $this->db->query("SELECT * FROM buku WHERE ID_Buku = '{$data}'");
        return $this->db->resultSet();
    }
    public function getStatusStock()
    {
        $this->db->query("SELECT SUM(Stock) AS total FROM buku");
        $result = $this->db->single();
        $total = $result['total'];
        return (int)$total;
    }
    public function insertBook($data){
         if($this-> getBook($data['Judul']) > 0){
                //BUTUH ALERT EMAIL SUDAH TERDAFTAR
                echo '<script>alert("Buku sudah ada pada database");</script>';
             }else{
                 $this->db->query("INSERT INTO buku VALUES ('', :Judul, :Penulis, :Penerbit, :Tahun_Terbit, :Sinopsis, :Stock)");
    
                 $this->db->bind('Judul', $data['Judul']);
                 $this->db->bind('Penulis', $data['Penulis']);
                 $this->db->bind('Penerbit', $data['Penerbit']);
                 $this->db->bind('Tahun_Terbit', $data['Tahun_Terbit']);
                 $this->db->bind('Sinopsis', $data['Sinopsis']);
                 $this->db->bind('Stock',(int)$data['Stock']);
         
                 $this->db->execute();
                 return $this->db->rowCount();
             }
    }
    public function updateBook($id,$data){
                $this->db->query("UPDATE buku SET Judul = :Judul, Penulis = :Penulis, Penerbit = :Penerbit, Tahun_Terbit = :Tahun_Terbit, Sinopsis = :Sinopsis, Stock = :Stock WHERE ID_Buku = :ID_Buku");

                $this->db->bind('Judul', $data['Judul']);
                $this->db->bind('Penulis', $data['Penulis']);
                $this->db->bind('Penerbit', $data['Penerbit']);
                $this->db->bind('Tahun_Terbit', $data['Tahun_Terbit']);
                $this->db->bind('Sinopsis', $data['Sinopsis']);
                $this->db->bind('Stock', (int) $data['Stock']);
                $this->db->bind('ID_Buku', (int)$id);

                $this->db->execute();
                return $this->db->rowCount();
   }

    public function hapus($data)
    {
        $this->db->query("DELETE FROM buku WHERE ID_Buku = '{$data}' ");
        return $this->db->resultSet();
    }
}