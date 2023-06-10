<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRegisterModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password', 'nama'];
    protected $returnType = 'array';
}