<?php

namespace App\Models;

use CodeIgniter\Model;

class AtmSubkategoriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'atm_subkategori';
    protected $primaryKey       = 'id_atm_subkategori';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_atm_subkategori',
        'nama_atm_subkategori',
        'noted_atm_subkategori',
        'created_atm_subkategori',
        'updated_atm_subkategori',
        'deleted_atm_subkategori',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_atm_subkategori';
    protected $updatedField  = 'updated_atm_subkategori';
    protected $deletedField  = 'deleted_atm_subkategori';

    // Validation
    protected $validationRules      = [
        'nama_atm_subkategori' => 'required',
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
