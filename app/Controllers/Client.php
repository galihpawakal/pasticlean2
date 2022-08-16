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
        return $this->respond([
            'code' => 201,
            'status' => 'success',
            'data' => $this->model->findAll()
        ], 200);
    }
    public function show($id = null)
    {
        $data = $this->model->where('kd_client', $id)->findAll();
        if ($data) {
            return $this->respond([
                'code' => 201,
                'status' => 'success',
                'data' => $data
            ]);
        } else {
            return $this->failNotFound("data tidak ditemukan untuk kode client $id");
        }
    }

    public function create()
    {

        $data = $this->request->getPost();
        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        } else {
            $response = [
                'code' => 201,
                'status' => 'success',
                'data' => $data
            ];
            return $this->respond($response);
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $isExists = $this->model->where('kd_client', $id)->findAll();
        if (!$isExists) {
            return $this->failNotFound("Data tidak ditemukan untuk kode client $id");
        }
        $update = $this->model->update($id, $data);
        if ($update) {
            $response = [
                'code' => 201,
                'status' => 'success',
                'data' => $data
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
                'data' => $data
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}
