<?php

namespace App\Models;

use CodeIgniter\Model;

class PengelolaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengelola';
    protected $primaryKey       = 'kd_pengelola';
    protected $useAutoIncrement = false;
    // protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['kd_pengelola', 'nama_pengelola', 'pt_pengelola', 'alamat_pengelola', 'logo_pengelola', 'telegram_pengelola', 'noted_pengelola'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_pengelola';
    protected $updatedField  = 'updated_pengelola';
    protected $deletedField  = 'deleted_pengelola';

    protected $validationRules      = [
        'kd_pengelola' => 'required|is_unique[pengelola.kd_pengelola]',
        'nama_pengelola' => 'required',
        'pt_pengelola' => 'required',
    ];
    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
