<?php

namespace App\Models;

use CodeIgniter\Model;

class SnapshootModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'snapshoot';
    protected $primaryKey       = 'id_snapshoot';
    protected $ForeignKey       = 'id_atm_kunjungan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_atm_kunjungan',
        'nama_snapshoot',
        'noted_snapshoot',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_snapshoot';
    protected $updatedField  = 'updated_snapshoot';
    protected $deletedField  = 'deleted_snapshoot';

    // Validation
    protected $validationRules      = [
        'id_atm_kunjungan' => 'required',
        'nama_snapshoot' => 'required',
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
