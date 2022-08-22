<?php

namespace App\Models;

use CodeIgniter\Model;

class ChecklistModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'checklist';
    protected $primaryKey       = 'id_checklist';
    protected $ForeignKey       = 'id_atm_kunjungan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_atm_kunjungan',
        'nama_checklist',
        'status_foto_checklist',
        'noted_checklist',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_checklist';
    protected $updatedField  = 'updated_checklist';
    protected $deletedField  = 'deleted_checklist';

    // Validation
    protected $validationRules      = [
        'id_atm_kunjungan' => 'required',
        'nama_checklist' => 'required',
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
