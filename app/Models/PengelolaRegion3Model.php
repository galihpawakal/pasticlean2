<?php

namespace App\Models;

use CodeIgniter\Model;

class PengelolaRegion3Model extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengelola_region_3';
    protected $primaryKey       = 'kd_pengelola_region_3';
    protected $Foreignkey       = 'kd_pengelola_2';
    protected $useAutoIncrement = false;
    // protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_pengelola_region_3',
        'kd_pengelola_region_2',
        'nama_pengelola_region_3',
        'telegram_pengelola_region_3',
        'noted_pengelola_region_3',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_pengelola_region_3';
    protected $updatedField  = 'updated_pengelola_region_3';
    protected $deletedField  = 'deleted_pengelola_region_3';

    // Validation
    protected $validationRules      = [
        'kd_pengelola_region_3' => 'required|is_unique[pengelola_region_3.kd_pengelola_region_3]',
        'kd_pengelola_region_2' => 'required',
        'nama_pengelola_region_3' => 'required',
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
