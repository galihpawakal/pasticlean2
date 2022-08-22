<?php

namespace App\Models;

use CodeIgniter\Model;

class KunjunganModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kunjungan';
    protected $primaryKey       = 'id_kunjungan';
    protected $ForeignKey       = ['id_atm_kunjungan', 'id_atm_lokasi'];
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_atm_kunjungan',
        'id_atm_lokasi',
        'petugas_kunjungan',
        'tgl_kunjungan',
        'status_kunjungan',
        'noted_kunjungan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_kunjungan';
    protected $updatedField  = 'updated_kunjungan';
    protected $deletedField  = 'deleted_kunjungan';

    // Validation
    protected $validationRules      = [
        'petugas_kunjungan' => 'required',

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
