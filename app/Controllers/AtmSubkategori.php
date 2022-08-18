<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AtmSubkategoriModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class AtmSubkategori extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new AtmSubkategoriModel();
    }

    public function index()
    {
        $data = $this->model->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result[] = [
                    'id_atm_subkategori' => $row['id_atm_subkategori'],
                    'nama_atm_subkategori' => $row['nama_atm_subkategori'],
                    'noted_atm_subkategori' => $row['noted_atm_subkategori'],
                    'created_atm_subkategori' => $row['created_atm_subkategori'],
                    'updated_atm_subkategori' => $row['updated_atm_subkategori'],
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
        $data = $this->model->where('id_atm_subkategori', $id)->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result = [
                    'id_atm_subkategori' => $row['id_atm_subkategori'],
                    'nama_atm_subkategori' => $row['nama_atm_subkategori'],
                    'noted_atm_subkategori' => $row['noted_atm_subkategori'],
                    'created_atm_subkategori' => $row['created_atm_subkategori'],
                    'updated_atm_subkategori' => $row['updated_atm_subkategori'],
                    'updated_atm_subkategori' => $row['updated_atm_subkategori'],
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
        $isExists = $this->model->where('id_atm_subkategori', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->where('id_atm_subkategori', $id)->find();
        $result = [
            'id_atm_subkategori' => $isExists[0]['id_atm_subkategori'],
            'nama_atm_subkategori' => $isExists[0]['nama_atm_subkategori'],
            'noted_atm_subkategori' => $isExists[0]['noted_atm_subkategori'],
            'created_atm_subkategori' => $isExists[0]['created_atm_subkategori'],
            'updated_atm_subkategori' => $isExists[0]['updated_atm_subkategori'],
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
        $data = $this->model->where('id_atm_subkategori', $id)->findAll();
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
