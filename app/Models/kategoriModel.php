<?php

namespace App\Models;

use CodeIgniter\Model;

class kategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kategori', 'deskripsi_kategori'];
    protected $returnType = 'array';
    public function getKategori()
    {
        return $this->findAll();
    }
}