<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AtmRingModel;
use App\Models\AtmKunjunganModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class AtmKunjungan extends ResourceController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new AtmKunjunganModel();
        $this->modelAtmRing = new AtmRingModel();
    }

    public function index()
    {
        $data = $this->model->join('atm_ring', 'atm_ring.id_atm_ring = atm_kunjungan.id_atm_ring')->findAll();
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'id_atm_kunjungan' => $key['id_atm_kunjungan'],
                    'nama_atm_ring' => $key['nama_atm_ring'],
                    'nama_atm_kunjungan' => $key['nama_atm_kunjungan'],
                    'noted_atm_kunjungan' => $key['noted_atm_kunjungan'],
                    'created_atm_kunjungan' => $key['created_atm_kunjungan'],
                    'updated_atm_kunjungan' => $key['updated_atm_kunjungan'],
                ];
            }
            return $this->respond([
                'code' => 201,
                'status' => 'success',
                'data' => $result
            ], 200);
        } else {
            return $this->respond([
                'code' => 201,
                'status' => 'error',
                'data' => 'data not found'
            ], 200);
        }
    }
    public function show($id = null)
    {
        $data = $this->model->join('atm_ring', 'atm_ring.id_atm_ring = atm_kunjungan.id_atm_ring')->where('id_atm_kunjungan', $id)->findAll();
        if ($data) {

            foreach ($data as $key) {
                $result = [
                    'id_atm_kunjungan' => $key['id_atm_kunjungan'],
                    'nama_atm_ring' => $key['nama_atm_ring'],
                    'nama_atm_kunjungan' => $key['nama_atm_kunjungan'],
                    'noted_atm_kunjungan' => $key['noted_atm_kunjungan'],
                    'created_atm_kunjungan' => $key['created_atm_kunjungan'],
                    'updated_atm_kunjungan' => $key['updated_atm_kunjungan'],
                ];
            }
            return $this->respond([
                'code' => 201,
                'status' => 'success',
                'data' => $result
            ], 200);
        } else {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
    }

    public function create()
    {
        $id_atm_ring = $this->request->getVar('id_atm_ring');
        $isExists = $this->modelAtmRing->where('id_atm_ring', $id_atm_ring)->findAll();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $data = $this->request->getPost();
        $save = $this->model->save($data);

        if ($save) {
            $response = [
                'code' => 201,
                'status' => 'success',
                'data' => $data
            ];
            return $this->respond($response);
        } else {
            $response = [
                'code' => 201,
                'status' => 'error',
                'message' => $this->model->errors()
            ];
            return $this->respond($response);
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $isExists = $this->model->join('atm_ring', 'atm_ring.id_atm_ring = atm_kunjungan.id_atm_ring')->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $result = [
            'id_atm_kunjungan' => $isExists[0]['id_atm_kunjungan'],
            'nama_atm_ring' => $isExists[0]['nama_atm_ring'],
            'nama_atm_kunjungan' => $isExists[0]['nama_atm_kunjungan'],
            'noted_atm_kunjungan' => $isExists[0]['noted_atm_kunjungan'],
            'created_atm_kunjungan' => $isExists[0]['created_atm_kunjungan'],
            'updated_atm_kunjungan' => $isExists[0]['updated_atm_kunjungan'],
        ];
        if ($update) {
            $response = [
                'code' => 201,
                'status' => 'success',
                'data' => $result
            ];
            return $this->respond($response);
        } else {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => $this->model->errors()
            ];
            return $this->respond($response);
        }
    }

    public function delete($id = null)
    {
        $data = $this->model->where('id_atm_kunjungan', $id)->findAll();
        if ($data) {
            $this->model->delete($id);
            $response = [
                'code' => 201,
                'status' => 'success',
            ];
            return $this->respondDeleted($response);
        } else {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
    }
}
