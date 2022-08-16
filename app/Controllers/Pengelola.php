<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengelolaModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Pengelola extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new PengelolaModel();
    }

    public function index()
    {
        $data = $this->model->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result[] = [
                    'kd_pengelola' => $row['kd_pengelola'],
                    'nama_pengelola' => $row['nama_pengelola'],
                    'pt_pengelola' => $row['pt_pengelola'],
                    'alamat_pengelola' => $row['alamat_pengelola'],
                    'logo_pengelola' => $row['logo_pengelola'],
                    'telegram_pengelola' => $row['telegram_pengelola'],
                    'noted_pengelola' => $row['noted_pengelola'],
                    'created_pengelola' => $row['created_pengelola'],
                    'updated_pengelola' => $row['updated_pengelola'],
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
        $data = $this->model->where('kd_pengelola', $id)->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result = [
                    'kd_pengelola' => $row['kd_pengelola'],
                    'nama_pengelola' => $row['nama_pengelola'],
                    'pt_pengelola' => $row['pt_pengelola'],
                    'alamat_pengelola' => $row['alamat_pengelola'],
                    'logo_pengelola' => $row['logo_pengelola'],
                    'telegram_pengelola' => $row['telegram_pengelola'],
                    'noted_pengelola' => $row['noted_pengelola'],
                    'created_pengelola' => $row['created_pengelola'],
                    'updated_pengelola' => $row['updated_pengelola'],
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
        $isExists = $this->model->where('kd_pengelola', $id)->find();
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
            'kd_pengelola' => $isExists[0]['kd_pengelola'],
            'nama_pengelola' => $isExists[0]['nama_pengelola'],
            'pt_pengelola' => $isExists[0]['pt_pengelola'],
            'alamat_pengelola' => $isExists[0]['alamat_pengelola'],
            'logo_pengelola' => $isExists[0]['logo_pengelola'],
            'telegram_pengelola' => $isExists[0]['telegram_pengelola'],
            'noted_pengelola' => $isExists[0]['noted_pengelola'],
            'created_pengelola' => $isExists[0]['created_pengelola'],
            'updated_pengelola' => $isExists[0]['updated_pengelola'],
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
        $data = $this->model->where('kd_pengelola', $id)->findAll();
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
