<?php

namespace App\Models;

use CodeIgniter\Model;

class AtmKunjunganModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'atm_kunjungan';
    protected $primaryKey       = 'id_atm_kunjungan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_atm_kunjungan',
        'id_atm_ring',
        'nama_atm_kunjungan',
        'noted_atm_kunjungan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_atm_kunjungan';
    protected $updatedField  = 'updated_atm_kunjungan';
    protected $deletedField  = 'deleted_atm_kunjungan';
    // Validation
    protected $validationRules      = [
        'nama_atm_kunjungan' => 'required',
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
