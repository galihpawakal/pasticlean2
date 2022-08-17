<?php

namespace App\Models;

use CodeIgniter\Model;

class AtmRingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'atm_ring';
    protected $primaryKey       = 'id_atm_ring';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_atm_ring',
        'nama_atm_ring',
        'periode_atm_ring',
        'noted_atm_ring',
        'created_atm_ring',
        'updated_atm_ring',
        'deleted_atm_ring',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_atm_ring';
    protected $updatedField  = 'updated_atm_ring';
    protected $deletedField  = 'deleted_atm_ring';


    // Validation
    protected $validationRules      = [
        'nama_atm_ring' => 'required',
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
