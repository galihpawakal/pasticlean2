<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\ClientRegion2Model;
use App\Models\ClientRegion3Model;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class ClientRegion3 extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new ClientRegion3Model();
        $this->modelClientRegion2 = new ClientRegion2Model();
        $this->modelClientRegion1 = new ClientRegion1();
        $this->modelClient = new ClientModel();
    }

    public function index()
    {
        $data = $this->model->join('client_region_2', 'client_region_2.kd_client_region_2 = client_region_3.kd_client_region_2')
            ->join('client_region_1', 'client_region_1.kd_client_region_1 = client_region_2.kd_client_region_1')
            ->join('client', 'client.kd_client = client_region_1.kd_client')
            ->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result[] = [
                    'kd_client_region_3' => $row['kd_client_region_3'],
                    'nama_client' => $row['nama_client'],
                    'nama_client_region_1' => $row['nama_client_region_1'],
                    'nama_client_region_2' => $row['nama_client_region_2'],
                    'nama_client_region_3' => $row['nama_client_region_3'],
                    'telegram_client_region_3' => $row['telegram_client_region_3'],
                    'noted_client_region_3' => $row['noted_client_region_3'],
                    'created_client_region_3' => $row['created_client_region_3'],
                    'updated_client_region_3' => $row['updated_client_region_3'],
                ];
            }
            return $this->respond([
                'code' => 202,
                'status' => 'success',
                'data' => $result
            ], 300);
        } else {
            return $this->respond([
                'code' => 202,
                'status' => 'error',
                'data' => 'data not found'
            ], 300);
        }
    }
    public function show($id = null)
    {
        $data = $this->model->join('client_region_2', 'client_region_2.kd_client_region_2 = client_region_3.kd_client_region_2')
            ->join('client_region_1', 'client_region_1.kd_client_region_1 = client_region_2.kd_client_region_1')
            ->join('client', 'client.kd_client = client_region_1.kd_client')
            ->where('kd_client_region_3', $id)->findAll();
        if ($data) {

            foreach ($data as $row) {
                $result = [
                    'kd_client_region_3' => $row['kd_client_region_3'],
                    'nama_client' => $row['nama_client'],
                    'nama_client_region_1' => $row['nama_client_region_1'],
                    'nama_client_region_2' => $row['nama_client_region_2'],
                    'nama_client_region_3' => $row['nama_client_region_3'],
                    'telegram_client_region_3' => $row['telegram_client_region_3'],
                    'noted_client_region_3' => $row['noted_client_region_3'],
                    'created_client_region_3' => $row['created_client_region_3'],
                    'updated_client_region_3' => $row['updated_client_region_3'],
                ];
            }
            return $this->respond([
                'code' => 202,
                'status' => 'success',
                'data' => $result
            ], 300);
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
        $kd_client_region_2 = $this->request->getVar('kd_client_region_2');
        $isExists = $this->modelClientRegion2->where('kd_client_region_2', $kd_client_region_2)->findAll();
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
        $isExists = $this->model->join('client_region_2', 'client_region_2.kd_client_region_2 = client_region_3.kd_client_region_2')
            ->join('client_region_1', 'client_region_1.kd_client_region_1 = client_region_2.kd_client_region_1')
            ->join('client', 'client.kd_client = client_region_1.kd_client')->where('kd_client_region_3', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->join('client_region_2', 'client_region_2.kd_client_region_2 = client_region_3.kd_client_region_2')
            ->join('client_region_1', 'client_region_1.kd_client_region_1 = client_region_2.kd_client_region_1')
            ->join('client', 'client.kd_client = client_region_1.kd_client')->where('kd_client_region_3', $id)->find();
        $result = [
            'kd_client_region_3' => $isExists[0]['kd_client_region_3'],
            'nama_client' => $isExists[0]['nama_client'],
            'nama_client_region_1' => $isExists[0]['nama_client_region_1'],
            'nama_client_region_2' => $isExists[0]['nama_client_region_2'],
            'nama_client_region_3' => $isExists[0]['nama_client_region_3'],
            'telegram_client_region_3' => $isExists[0]['telegram_client_region_3'],
            'noted_client_region_3' => $isExists[0]['noted_client_region_3'],
            'created_client_region_3' => $isExists[0]['created_client_region_3'],
            'updated_client_region_3' => $isExists[0]['updated_client_region_3'],
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
                'code' => 401,
                'status' => 'error',
                'data' => $this->model->errors()
            ];
            return $this->respond($response);
        }
    }

    public function delete($id = null)
    {
        $data = $this->model->where('kd_client_region_3', $id)->findAll();
        if ($data) {
            $this->model->delete($id);
            $response = [
                'code' => 202,
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
