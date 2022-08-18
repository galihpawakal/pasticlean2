<?php

namespace App\Models;

use CodeIgniter\Model;

class AtmLokasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'atm_lokasi';
    protected $primaryKey       = 'id_atm_lokasi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_atm_lokasi',
        'kd_client_region_3',
        'kd_pengelola_region_3',
        'id_atm_kategori',
        'id_atm_subkategori',
        'id_atm_ring',
        'nama_atm_lokasi',
        'alamat_atm_lokasi',
        'lat_atm_lokasi',
        'lng_atm_lokasi',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_atm_lokasi';
    protected $updatedField  = 'updated_atm_lokasi';
    protected $deletedField  = 'deleted_atm_lokasi';

    // Validation
    protected $validationRules      = [
        'nama_atm_lokasi' => 'required',
        'alamat_atm_lokasi' => 'required',
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
