<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'client';
    protected $primaryKey       = 'kd_client';
    // protected $useAutoIncrement = false;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kd_client', 'nama_client', 'pt_client', 'alamat_client', 'logo_client', 'telegram_client', 'noted_client'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_client';
    protected $updatedField  = 'updated_client';
    protected $deletedField  = 'deleted_client';

    protected $validationRules      = [
        'kd_client' => 'required',
        'nama_client' => 'required',
        'pt_client' => 'required',
        'logo_client' => 'required',
        'telegram_client' => 'required',
        'noted_client' => 'required',
    ];
    protected $validationMessages   = [
        'kd_client' => [
            'required' => 'Silakan masukan nama'
        ],
        'nama_client' => [
            'required' => 'Silakan masukan email',
        ],
        'pt_client' => [
            'required' => 'Silakan masukan email',
        ],
        'logo_client' => [
            'required' => 'Silakan masukan email',
        ],
        'telegram_client' => [
            'required' => 'Silakan masukan email',
        ],
        'noted_client' => [
            'required' => 'Silakan masukan email',
        ]
    ];

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
