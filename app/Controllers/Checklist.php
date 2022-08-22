<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AtmKunjunganModel;
use App\Models\ChecklistModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Checklist extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new ChecklistModel();
        $this->modelAtmKunjungan = new AtmKunjunganModel();
    }

    public function index()
    {
        $data = $this->model->join('atm_kunjungan', 'atm_kunjungan.id_atm_kunjungan = checklist.id_atm_kunjungan')->findAll();
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'id_checklist' => $key['id_checklist'],
                    'nama_atm_kunjungan' => $key['nama_atm_kunjungan'],
                    'nama_checklist' => $key['nama_checklist'],
                    'status_foto_checklist' => $key['status_foto_checklist'],
                    'noted_checklist' => $key['noted_checklist'],
                    'created_checklist' => $key['created_checklist'],
                    'updated_checklist' => $key['updated_checklist'],
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
        $data = $this->model->join('atm_kunjungan', 'atm_kunjungan.id_atm_kunjungan = checklist.id_atm_kunjungan')->where('id_checklist', $id)->findAll();
        if ($data) {

            foreach ($data as $key) {
                $result = [
                    'id_checklist' => $key['id_checklist'],
                    'nama_atm_kunjungan' => $key['nama_atm_kunjungan'],
                    'nama_checklist' => $key['nama_checklist'],
                    'status_foto_checklist' => $key['status_foto_checklist'],
                    'noted_checklist' => $key['noted_checklist'],
                    'created_checklist' => $key['created_checklist'],
                    'updated_checklist' => $key['updated_checklist'],
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
        $isExists = $this->model->join('atm_kunjungan', 'atm_kunjungan.id_atm_kunjungan = checklist.id_atm_kunjungan')->where('id_checklist', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->join('atm_kunjungan', 'atm_kunjungan.id_atm_kunjungan = checklist.id_atm_kunjungan')->where('id_checklist', $id)->find();
        $result = [
            'id_checklist' => $isExists[0]['id_checklist'],
            'nama_atm_kunjungan' => $isExists[0]['nama_atm_kunjungan'],
            'nama_checklist' => $isExists[0]['nama_checklist'],
            'status_foto_checklist' => $isExists[0]['status_foto_checklist'],
            'noted_checklist' => $isExists[0]['noted_checklist'],
            'created_checklist' => $isExists[0]['created_checklist'],
            'updated_checklist' => $isExists[0]['updated_checklist'],
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
        $data = $this->model->where('id_checklist', $id)->findAll();
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
