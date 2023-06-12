<?php
class book_model extends Controller{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function searchBookQuery($query) {
        $query = "SELECT * FROM buku WHERE Penulis LIKE '%$query%' OR Judul LIKE '%$query%'";
        $this->db->query($query);
        $data['search'] = $this->db->resultSet();
        if($data > 0){
            return $data['search'];
        }else{
            return 0;
        }
        
    }

/**
 * 
 * GET FUNCTION
 */
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
    public function getLastId()
    {
        $this->db->query("SELECT MAX(ID_Buku) AS maxId FROM buku");
        $result = $this->db->single();
        $total = $result['maxId'];
        return (int)$total;
    }

      /**
     * tabel history
    */
    public function getHistory($query)
    {
        $query = "SELECT u.*, b.*, h.Tanggal_Pinjam, h.Tanggal_Expired, h.Alasan, h.ID_History
        FROM history h
        JOIN user u ON h.ID_User = u.ID_User
        JOIN buku b ON h.ID_Buku = b.ID_Buku 
        WHERE u.Username LIKE '%$query%' OR b.Judul LIKE '%$query%' OR h.Tanggal_Expired LIKE '%$query%'
        OR u.ID_User LIKE '%$query%' OR b.Id_Buku LIKE '%$query%' OR u.Email LIKE '%$query%' OR h.Tanggal_Pinjam LIKE '%$query%'";

        $this->db->query($query);
        $data['search'] = $this->db->resultSet();
        if($data['search'] > 0){
            // $this->getAllHistoryJoin();
            return $data['search'];
        }else{
            return 0;
        }
    }
    public function getHistoryData()
    {
        $this->db->query("SELECT * FROM history");
        return $this->db->resultSet();
    }
    public function getHistoryDataID($id)
    {
        $this->db->query("SELECT * FROM history WHERE ID_User = '{$id}'");
        return $this->db->resultSet();
    }
    public function getAllHistoryJoin()
    {
        $this->db->query("SELECT u.*, b.*
        FROM history h
        JOIN user u ON h.ID_User = u.ID_User
        JOIN buku b ON h.ID_Buku = b.ID_Buku;
        ");
        return $this->db->resultSet();
    }


/**
 * 
 * INSERT ATAU PUT FUNCTION
 */
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
    public function updateStock($id_buku,$stock){
        $stock = $stock - 1;
        $this->db->query("UPDATE buku SET Stock = '{$stock}' WHERE ID_Buku = '{$id_buku}'");
        $this->db->execute();
        return $this->db->rowCount();
    }
 
    public function insertPinjam($id_user,$id_buku,$Stock,$Judul)
    {           $data = $_POST;
                $id_user = (int) $id_user;
                $tanggalExpired = $data['Tanggal_Expired'];
                $tanggalPinjam = $data['Tanggal_Pinjam'];
                if ($this->updateStock($id_buku, (int)$Stock) > 0) {
                    $Alasan = $_POST['Alasan'];
                    $date_pinjam = date_create_from_format('m-d-Y', $tanggalPinjam);
                    $date = date_create_from_format('m-d-Y', $tanggalExpired);
                    $tanggalExpired = date_format($date, 'Y-m-d');
                    $tanggalPinjam = date_format($date_pinjam, 'Y-m-d');
                    $this->db->query("INSERT INTO history (ID_User, ID_Buku, Judul, Tanggal_Pinjam, Tanggal_Expired, Alasan) 
                                      VALUES (:ID_User, :ID_Buku, :Judul, :Tanggal_Pinjam, :Tanggal_Expired, :Alasan)");
                    $this->db->bind(':ID_User', (int)$id_user);
                    $this->db->bind(':ID_Buku', (int)$id_buku);
                    $this->db->bind(':Judul', $Judul);
                    $this->db->bind(':Tanggal_Pinjam', $tanggalPinjam);
                    $this->db->bind(':Tanggal_Expired', $tanggalExpired);
                    $this->db->bind(':Alasan', $Alasan);
                    $this->db->execute();
                
                    return $this->db->rowCount();
                } else {
                    return 0;
                }
                
                
                
    }
    public function updateBook($id){
                $data = $_POST;
                $this->db->query("UPDATE buku SET Judul = :Judul, Penulis = :Penulis, Penerbit = :Penerbit, Tahun_Terbit = :Tahun_Terbit, Sinopsis = :Sinopsis, Stock = :Stock WHERE ID_Buku = :ID_Buku");

                $this->db->bind('Judul', $data['Judul']);
                $this->db->bind('Penulis', $data['Penulis']);
                $this->db->bind('Penerbit', $data['Penerbit']);
                $this->db->bind('Tahun_Terbit', $data['Tahun_Terbit']);
                $this->db->bind('Sinopsis', $data['Sinopsis']);
                $this->db->bind('Stock', (int)$data['Stock']);
                $this->db->bind('ID_Buku', (int)$id);

                $this->db->execute();
                return $this->db->rowCount();
   }
  
/**
 * 
 * DELETE FUNCTION
 */
    public function hapusHistoryTrigger($data)
    {
        $this->db->query("DELETE FROM history WHERE ID_Buku = '{$data}' ");
        return $this->db->resultSet();
    }
    public function hapusHistoryPinjam($data)
    {
        $this->db->query("DELETE FROM history WHERE ID_History= '{$data}' ");
        return $this->db->resultSet();
    }
    public function hapusBuku($data)
    {
        if($this->hapusHistoryTrigger($data)>0)
        $this->db->query("DELETE FROM buku WHERE ID_Buku = '{$data}' ");
        return $this->db->resultSet();
    }
}