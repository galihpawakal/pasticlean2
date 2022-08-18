<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Client extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new ClientModel();
    }

    public function index()
    {
        $data = $this->model->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result[] = [
                    'kd_client' => $row['kd_client'],
                    'nama_client' => $row['nama_client'],
                    'pt_client' => $row['pt_client'],
                    'alamat_client' => $row['alamat_client'],
                    'logo_client' => $row['logo_client'],
                    'telegram_client' => $row['telegram_client'],
                    'noted_client' => $row['noted_client'],
                    'created_client' => $row['created_client'],
                    'updated_client' => $row['updated_client'],
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
        $data = $this->model->where('kd_client', $id)->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result = [
                    'kd_client' => $row['kd_client'],
                    'nama_client' => $row['nama_client'],
                    'pt_client' => $row['pt_client'],
                    'alamat_client' => $row['alamat_client'],
                    'logo_client' => $row['logo_client'],
                    'telegram_client' => $row['telegram_client'],
                    'noted_client' => $row['noted_client'],
                    'created_client' => $row['created_client'],
                    'updated_client' => $row['updated_client'],
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
        $isExists = $this->model->where('kd_client', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->where('kd_client', $id)->find();
        $result = [
            'kd_client' => $isExists[0]['kd_client'],
            'nama_client' => $isExists[0]['nama_client'],
            'pt_client' => $isExists[0]['pt_client'],
            'alamat_client' => $isExists[0]['alamat_client'],
            'logo_client' => $isExists[0]['logo_client'],
            'telegram_client' => $isExists[0]['telegram_client'],
            'noted_client' => $isExists[0]['noted_client'],
            'created_client' => $isExists[0]['created_client'],
            'updated_client' => $isExists[0]['updated_client'],
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
        $data = $this->model->where('kd_client', $id)->findAll();
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
