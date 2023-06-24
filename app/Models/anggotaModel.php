<?php

namespace App\Models;

use CodeIgniter\Model;

class anggotaModel extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'nama', 'alamat', 'telepon'];
    protected $returnType = 'array';
    public function getAnggota()
    {
        return $this->findAll();
    }
}