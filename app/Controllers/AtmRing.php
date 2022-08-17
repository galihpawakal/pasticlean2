<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AtmRingModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class AtmRing extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new AtmRingModel();
    }

    public function index()
    {
        $data = $this->model->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result[] = [
                    'id_atm_ring' => $row['id_atm_ring'],
                    'nama_atm_ring' => $row['nama_atm_ring'],
                    'periode_atm_ring' => $row['periode_atm_ring'],
                    'noted_atm_ring' => $row['noted_atm_ring'],
                    'created_atm_ring' => $row['created_atm_ring'],
                    'updated_atm_ring' => $row['updated_atm_ring'],
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
                'status' => 'success',
                'data' => 'data not found'
            ], 200);
        }
    }
    public function show($id = null)
    {
        $data = $this->model->where('id_atm_ring', $id)->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result = [
                    'id_atm_ring' => $row['id_atm_ring'],
                    'nama_atm_ring' => $row['nama_atm_ring'],
                    'periode_atm_ring' => $row['periode_atm_ring'],
                    'noted_atm_ring' => $row['noted_atm_ring'],
                    'created_atm_ring' => $row['created_atm_ring'],
                    'updated_atm_ring' => $row['updated_atm_ring'],
                    'updated_atm_ring' => $row['updated_atm_ring'],
                ];
            }
            return $this->respond([
                'code' => 201,
                'status' => 'success',
                'data' => $result
            ]);
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
        $isExists = $this->model->where('id_atm_ring', $id)->find();
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
            'id_atm_ring' => $isExists[0]['id_atm_ring'],
            'nama_atm_ring' => $isExists[0]['nama_atm_ring'],
            'periode_atm_ring' => $isExists[0]['periode_atm_ring'],
            'noted_atm_ring' => $isExists[0]['noted_atm_ring'],
            'created_atm_ring' => $isExists[0]['created_atm_ring'],
            'updated_atm_ring' => $isExists[0]['updated_atm_ring'],
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
        $data = $this->model->where('id_atm_ring', $id)->findAll();
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
