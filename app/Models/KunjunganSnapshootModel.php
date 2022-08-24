<?php

namespace App\Models;

use CodeIgniter\Model;

class KunjunganSnapshootModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kunjungan_snapshoot';
    protected $primaryKey       = 'id_kunjungan_snapshoot';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_kunjungan',
        'id_snapshoot',
        'foto_kunjungan_snapshoot',
        'noted_kunjungan_snapshoot',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_kunjungan_snapshoot';
    protected $updatedField  = 'updated_kunjungan_snapshoot';
    protected $deletedField  = 'deleted_kunjungan_snapshoot';

    // Validation
    protected $validationRules      = [
        'id_kunjungan' => 'required',
        'id_snapshoot' => 'required',
        'foto_kunjungan_snapshoot' => 'required',
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
