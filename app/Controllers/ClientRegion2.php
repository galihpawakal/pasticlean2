<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\ClientRegion1Model;
use App\Models\ClientRegion2Model;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class ClientRegion2 extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new ClientRegion2Model();
        $this->modelClientRegion1 = new ClientRegion1Model();
        $this->modelClient = new ClientModel();
    }

    public function index()
    {
        $data = $this->model->join('client_region_1', 'client_region_1.kd_client_region_1 = client_region_2.kd_client_region_1')->findAll();
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'kd_client_region_2' => $key['kd_client_region_2'],
                    // 'nama_client' => $key['nama_client'],
                    'nama_client_region_1' => $key['nama_client_region_1'],
                    'nama_client_region_2' => $key['nama_client_region_2'],
                    'telegram_client_region_2' => $key['telegram_client_region_2'],
                    'noted_client_region_2' => $key['noted_client_region_2'],
                    'created_client_region_2' => $key['created_client_region_2'],
                    'updated_client_region_2' => $key['updated_client_region_2'],
                ];
            }
            return $this->respond([
                'code' => 202,
                'status' => 'success',
                'data' => $result
            ], 200);
        } else {
            return $this->respond([
                'code' => 202,
                'status' => 'error',
                'data' => 'data not found'
            ], 200);
        }
    }
    public function show($id = null)
    {
        $data = $this->model->join('client_region_1', 'client_region_1.kd_client_region_1 = client_region_2.kd_client_region_1')->where('kd_client_region_2', $id)->findAll();
        if ($data) {

            foreach ($data as $key) {
                $result[] = [
                    'kd_client_region_2' => $key['kd_client_region_2'],
                    'nama_client_region_1' => $key['nama_client_region_1'],
                    'nama_client_region_2' => $key['nama_client_region_2'],
                    'telegram_client_region_2' => $key['telegram_client_region_2'],
                    'noted_client_region_2' => $key['noted_client_region_2'],
                    'created_client_region_2' => $key['created_client_region_2'],
                    'updated_client_region_2' => $key['updated_client_region_2'],
                ];
            }
            return $this->respond([
                'code' => 202,
                'status' => 'success',
                'data' => $result
            ], 200);
        } else {
            $response = [
                'code' => 402,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
    }

    public function create()
    {
        $kd_client_region_1 = $this->request->getVar('kd_client_region_1');
        $isExists = $this->modelClientRegion1->where('kd_client_region_1', $kd_client_region_1)->findAll();
        if (!$isExists) {
            $response = [
                'code' => 402,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $data = $this->request->getPost();
        $save = $this->model->save($data);

        if ($save) {
            $response = [
                'code' => 202,
                'status' => 'success',
                'data' => $data
            ];
            return $this->respond($response);
        } else {
            $response = [
                'code' => 202,
                'status' => 'error',
                'message' => $this->model->errors()
            ];
            return $this->respond($response);
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $isExists = $this->model->join('client_region_1', 'client_region_1.kd_client_region_1 = client_region_2.kd_client_region_1')->find();
        if (!$isExists) {
            $response = [
                'code' => 402,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $result = [
            'kd_client_region_2' => $isExists[0]['kd_client_region_2'],
            'nama_client_region_1' => $isExists[0]['nama_client_region_1'],
            'nama_client_region_2' => $isExists[0]['nama_client_region_2'],
            'telegram_client_region_2' => $isExists[0]['telegram_client_region_2'],
            'noted_client_region_2' => $isExists[0]['noted_client_region_2'],
            'created_client_region_2' => $isExists[0]['created_client_region_2'],
            'updated_client_region_2' => $isExists[0]['updated_client_region_2'],
        ];
        if ($update) {
            $response = [
                'code' => 202,
                'status' => 'success',
                'data' => $result
            ];
            return $this->respond($response);
        } else {
            $response = [
                'code' => 402,
                'status' => 'error',
                'data' => $this->model->errors()
            ];
            return $this->respond($response);
        }
    }

    public function delete($id = null)
    {
        $data = $this->model->where('kd_client_region_2', $id)->findAll();
        if ($data) {
            $this->model->delete($id);
            $response = [
                'code' => 202,
                'status' => 'success',
            ];
            return $this->respondDeleted($response);
        } else {
            $response = [
                'code' => 402,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
    }
}
