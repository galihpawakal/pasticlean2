<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AtmKunjunganModel;
use App\Models\SnapshootModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Snapshoot extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new SnapshootModel();
        $this->modelAtmKunjungan = new AtmKunjunganModel();
    }

    public function index()
    {
        $data = $this->model->join('atm_kunjungan', 'atm_kunjungan.id_atm_kunjungan = snapshoot.id_atm_kunjungan')->findAll();
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'id_snapshoot' => $key['id_snapshoot'],
                    'nama_atm_kunjungan' => $key['nama_atm_kunjungan'],
                    'nama_snapshoot' => $key['nama_snapshoot'],
                    'noted_snapshoot' => $key['noted_snapshoot'],
                    'created_snapshoot' => $key['created_snapshoot'],
                    'updated_snapshoot' => $key['updated_snapshoot'],
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
        $data = $this->model->join('atm_kunjungan', 'atm_kunjungan.id_atm_kunjungan = snapshoot.id_atm_kunjungan')->where('id_snapshoot', $id)->findAll();
        if ($data) {

            foreach ($data as $key) {
                $result = [
                    'id_snapshoot' => $key['id_snapshoot'],
                    'nama_atm_kunjungan' => $key['nama_atm_kunjungan'],
                    'nama_snapshoot' => $key['nama_snapshoot'],
                    'noted_snapshoot' => $key['noted_snapshoot'],
                    'created_snapshoot' => $key['created_snapshoot'],
                    'updated_snapshoot' => $key['updated_snapshoot'],
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
        $id_atm_kunjungan = $this->request->getVar('id_atm_kunjungan');
        $isExists = $this->modelAtmKunjungan->where('id_atm_kunjungan', $id_atm_kunjungan)->findAll();
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
        $isExists = $this->model->join('atm_kunjungan', 'atm_kunjungan.id_atm_kunjungan = snapshoot.id_atm_kunjungan')->where('id_snapshoot', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->join('atm_kunjungan', 'atm_kunjungan.id_atm_kunjungan = snapshoot.id_atm_kunjungan')->where('id_snapshoot', $id)->find();
        $result = [
            'id_snapshoot' => $isExists[0]['id_snapshoot'],
            'nama_atm_kunjungan' => $isExists[0]['nama_atm_kunjungan'],
            'nama_snapshoot' => $isExists[0]['nama_snapshoot'],
            'noted_snapshoot' => $isExists[0]['noted_snapshoot'],
            'created_snapshoot' => $isExists[0]['created_snapshoot'],
            'updated_snapshoot' => $isExists[0]['updated_snapshoot'],
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
        $data = $this->model->where('id_snapshoot', $id)->findAll();
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
