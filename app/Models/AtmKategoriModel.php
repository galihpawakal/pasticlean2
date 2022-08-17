<?php

namespace App\Models;

use CodeIgniter\Model;

class AtmKategoriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'atm_kategori';
    protected $primaryKey       = 'id_atm_kategori';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_atm_kategori',
        'nama_atm_kategori',
        'noted_atm_kategori',
        'created_atm_kategori',
        'updated_atm_kategori',
        'deleted_atm_kategori',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_atm_kategori';
    protected $updatedField  = 'updated_atm_kategori';
    protected $deletedField  = 'deleted_atm_kategori';

    // Validation
    protected $validationRules      = [
        'nama_atm_kategori' => 'required',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

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
