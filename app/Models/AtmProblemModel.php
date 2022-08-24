<?php

namespace App\Models;

use CodeIgniter\Model;

class AtmProblemModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'atm_problem';
    protected $primaryKey       = 'id_atm_problem';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_atm_lokasi',
        'pelapor_atm_problem',
        'foto_atm_problem',
        'status_atm_problem',
        'noted_atm_problem',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_atm_problem';
    protected $updatedField  = 'updated_atm_problem';
    protected $deletedField  = 'deleted_atm_problem';

    // Validation
    protected $validationRules      = [
        'pelapor_atm_problem' => 'required',
        'foto_atm_problem' => 'required',
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
