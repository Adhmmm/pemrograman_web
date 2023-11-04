
<?php
/*
Filename : AnggotaModel.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('../db/database.php');

class BukuModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addBuku($id_kategori,$judul,$kode_buku,$pengarang)
    {
        $sql = "INSERT INTO buku (id_kategori, judul, kode_buku, pengarang) VALUES (:id_kategori,:judul,:kode_buku,:pengarang)";
        $params = array(
          ":id_kategori" => $id_kategori,
          ":judul" => $judul,
          ":kode_buku" => $kode_buku,
          ":pengarang" => $pengarang);

        $result= $this->db->executeQuery($sql, $params);
        // Check if the insert was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Insert successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Insert failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }

    public function getBuku($id)
    {
        $sql = "SELECT * FROM buku WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateBuku($id_kategori,$judul,$kode_buku,$pengarang)
    {
        $sql = "UPDATE buku SET id_kategori = :id_kategori, judul = :judul, kode_buku = :kode_buku, pengarang = :pengarang WHERE id = :id";
        $params = array(
            ":id_kategori" => $id_kategori,
            ":judul" => $judul,
            ":kode_buku" => $kode_buku,
            ":pengarang" => $pengarang
        );
    
        // Execute the query
        $result = $this->db->executeQuery($sql, $params);
    
        // Check if the update was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Update successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Update failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }
    

    public function deleteBuku($id)
    {
        $sql = "DELETE FROM buku WHERE id = :id";
        $params = array(":id" => $id);

        $result = $this->db->executeQuery($sql, $params);
        // Check if the delete was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Delete successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Delete failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }

    public function getBukuList()
    {
        $sql = 'SELECT * FROM buku';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM buku';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

