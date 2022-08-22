<?php

namespace App\Models;

use CodeIgniter\Model;

class AtmTidModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'atm_tid';
    protected $primaryKey       = 'id_atm_tid';
    protected $Foreignkey       = 'id_atm_lokasi';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_atm_tid',
        'id_atm_lokasi',
        'noted_atm_tid',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_atm_tid';
    protected $updatedField  = 'updated_atm_tid';
    protected $deletedField  = 'deleted_atm_tid';

    // Validation
    protected $validationRules      = [
        'id_atm_tid' => 'required|is_unique[atm_tid.id_atm_tid]',
        'id_atm_lokasi' => 'required',
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
