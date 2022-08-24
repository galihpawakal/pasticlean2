<?php

namespace App\Models;

use CodeIgniter\Model;

class AtmAuditModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'atm_audit';
    protected $primaryKey       = 'id_atm_audit';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_atm_lokasi',
        'pelapor_atm_audit',
        'foto_atm_audit',
        'status_atm_audit',
        'noted_atm_audit',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_atm_audit';
    protected $updatedField  = 'updated_atm_audit';
    protected $deletedField  = 'deleted_atm_audit';

    // Validation
    protected $validationRules      = [
        'pelapor_atm_audit' => 'required',
        'foto_atm_audit' => 'required',
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
