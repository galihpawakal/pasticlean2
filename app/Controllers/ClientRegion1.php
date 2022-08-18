<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\ClientRegion1Model;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class ClientRegion1 extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new ClientRegion1Model();
        $this->modelClient = new ClientModel();
    }

    public function index()
    {
        $data = $this->model->join('client', 'client.kd_client = client_region_1.kd_client')->findAll();
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'kd_client_region_1' => $key['kd_client_region_1'],
                    'nama_client' => $key['nama_client'],
                    'nama_client_region_1' => $key['nama_client_region_1'],
                    'telegram_client_region_1' => $key['telegram_client_region_1'],
                    'noted_client_region_1' => $key['noted_client_region_1'],
                    'created_client_region_1' => $key['created_client_region_1'],
                    'updated_client_region_1' => $key['updated_client_region_1'],
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
        $data = $this->model->join('client', 'client.kd_client = client_region_1.kd_client')->where('kd_client_region_1', $id)->findAll();
        if ($data) {

            foreach ($data as $key) {
                $result = [
                    'kd_client_region_1' => $key['kd_client_region_1'],
                    'nama_client' => $key['nama_client'],
                    'nama_client_region_1' => $key['nama_client_region_1'],
                    'telegram_client_region_1' => $key['telegram_client_region_1'],
                    'noted_client_region_1' => $key['noted_client_region_1'],
                    'created_client_region_1' => $key['created_client_region_1'],
                    'updated_client_region_1' => $key['updated_client_region_1'],
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
        $kd_client = $this->request->getVar('kd_client');
        $isExists = $this->modelClient->where('kd_client', $kd_client)->findAll();
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
        $isExists = $this->model->join('client', 'client.kd_client = client_region_1.kd_client')->where('kd_client_region_1', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->join('client', 'client.kd_client = client_region_1.kd_client')->where('kd_client_region_1', $id)->find();
        $result = [
            'kd_client_region_1' => $isExists[0]['kd_client_region_1'],
            'nama_client' => $isExists[0]['nama_client'],
            'nama_client_region_1' => $isExists[0]['nama_client_region_1'],
            'telegram_client_region_1' => $isExists[0]['telegram_client_region_1'],
            'noted_client_region_1' => $isExists[0]['noted_client_region_1'],
            'created_client_region_1' => $isExists[0]['created_client_region_1'],
            'updated_client_region_1' => $isExists[0]['updated_client_region_1'],
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
        $data = $this->model->where('kd_client_region_1', $id)->findAll();
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
