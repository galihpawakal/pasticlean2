<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AtmKategoriModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class AtmKategori extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new AtmKategoriModel();
    }

    public function index()
    {
        $data = $this->model->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result[] = [
                    'id_atm_kategori' => $row['id_atm_kategori'],
                    'nama_atm_kategori' => $row['nama_atm_kategori'],
                    'noted_atm_kategori' => $row['noted_atm_kategori'],
                    'created_atm_kategori' => $row['created_atm_kategori'],
                    'updated_atm_kategori' => $row['updated_atm_kategori'],
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
        $data = $this->model->where('id_atm_kategori', $id)->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result = [
                    'id_atm_kategori' => $row['id_atm_kategori'],
                    'nama_atm_kategori' => $row['nama_atm_kategori'],
                    'noted_atm_kategori' => $row['noted_atm_kategori'],
                    'created_atm_kategori' => $row['created_atm_kategori'],
                    'updated_atm_kategori' => $row['updated_atm_kategori'],
                    'updated_atm_kategori' => $row['updated_atm_kategori'],
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
        $isExists = $this->model->where('id_atm_kategori', $id)->find();
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
            'id_atm_kategori' => $isExists[0]['id_atm_kategori'],
            'nama_atm_kategori' => $isExists[0]['nama_atm_kategori'],
            'noted_atm_kategori' => $isExists[0]['noted_atm_kategori'],
            'created_atm_kategori' => $isExists[0]['created_atm_kategori'],
            'updated_atm_kategori' => $isExists[0]['updated_atm_kategori'],
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
        $data = $this->model->where('id_atm_kategori', $id)->findAll();
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
