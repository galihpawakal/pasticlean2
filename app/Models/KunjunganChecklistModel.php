<?php

namespace App\Models;

use CodeIgniter\Model;

class KunjunganChecklistModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kunjungan_checklist';
    protected $primaryKey       = 'id_kunjungan_checklist';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_kunjungan',
        'id_checklist',
        'status_kunjungan_checklist',
        'foto_kunjungan_checklist',
        'noted_kunjungan_checklist',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_kunjungan_checklist';
    protected $updatedField  = 'updated_kunjungan_checklist';
    protected $deletedField  = 'deleted_kunjungan_checklist';

    // Validation
    protected $validationRules      = [
        'id_kunjungan' => 'required',
        'id_checklist' => 'required',
        'foto_kunjungan_checklist' => 'required',

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
