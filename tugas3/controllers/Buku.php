
<?php
/*
Filename : Anggota.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
include_once('../models/BukuModel.php');

class BukuController
{
    private $model;

    public function __construct()
    {
        $this->model = new BukuModel();
    }

    public function addBuku($id_kategori,$judul,$kode_buku,$pengarang)
    {
        return $this->model->addBuku($id_kategori,$judul,$kode_buku,$pengarang);
    }

    public function getBuku($id)
    {
        return $this->model->getBuku($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getBuku($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updateBuku($id_kategori,$judul,$kode_buku,$pengarang)
    {
        return $this->model->updateBuku($id_kategori,$judul,$kode_buku,$pengarang);
    }

    public function deleteBuku($id)
    {
        return $this->model->deleteBuku($id);
    }

    public function getBukuList()
    {
        return $this->model->getBukuList();
    }
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}

