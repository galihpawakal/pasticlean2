<?php

namespace App\Models;

use CodeIgniter\Model;

class PengelolaRegion1Model extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengelola_region_1';
    protected $primaryKey       = 'kd_pengelola_region_1';
    protected $Foreignkey       = 'kd_pengelola';
    protected $useAutoIncrement = false;
    // protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_pengelola_region_1',
        'kd_pengelola',
        'nama_pengelola_region_1',
        'telegram_pengelola_region_1',
        'noted_pengelola_region_1',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_pengelola_region_1';
    protected $updatedField  = 'updated_pengelola_region_1';
    protected $deletedField  = 'deleted_pengelola_region_1';

    // Validation
    protected $validationRules      = [
        'kd_pengelola_region_1' => 'required|is_unique[pengelola_region_1.kd_pengelola_region_1]',
        'kd_pengelola' => 'required',
        'nama_pengelola_region_1' => 'required',
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
