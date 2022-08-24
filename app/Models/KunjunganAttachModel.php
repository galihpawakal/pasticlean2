<?php

namespace App\Models;

use CodeIgniter\Model;

class KunjunganAttachModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kunjungan_attach';
    protected $primaryKey       = 'id_kunjungan_attach';
    protected $ForeignKey       = ['id_atm_kunjungan', 'id_atm_lokasi'];
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_atm_kunjungan',
        'id_atm_lokasi',
        'petugas_kunjungan_attach',
        'tgl_kunjungan_attach',
        'status_kunjungan_attach',
        'noted_kunjungan_attach',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_kunjungan_attach';
    protected $updatedField  = 'updated_kunjungan_attach';
    protected $deletedField  = 'deleted_kunjungan_attach';

    // Validation
    protected $validationRules      = [
        'petugas_kunjungan_attach' => 'required',
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
