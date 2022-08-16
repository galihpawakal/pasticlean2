<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Client extends ResourceController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new ClientModel();
    }

    public function index()
    {
        return $this->respond([
            'status' => true,
            'data' => $this->model->findAll()
        ], 200);
    }
    public function show($id = null)
    {
        $data = $this->model->where('kd_client', $id)->findAll();
        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound("data tidak ditemukan untuk kode client $id");
        }
    }

    public function create()
    {

        $data = $this->request->getPost();
        // $data = [
        //     'kd_client' => $this->request->getVar('kd_client'),
        //     'nama_client' => $this->request->getVar('nama_client'),
        //     'pt_client' => $this->request->getVar('pt_client'),
        //     'logo_client' => $this->request->getVar('logo_client'),
        //     'telegram_client' => $this->request->getVar('telegram_client'),
        //     'noted_client' => $this->request->getVar('noted_client'),
        // ];
        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Berhasil Memasukan data Client'
            ]
        ];
        return $this->respond($response);
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $data['kd_client'] = $id;

        $isExists = $this->model->where('kd_client', $id)->findAll();
        if (!$isExists) {
            return $this->failNotFound("Data tidak ditemukan untuk kode client $id");
        }

        if (!$this->model->save($data)) {
            return $this->respond($this->model->errors());
        }

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => "data Client dengan id $id Berhasil update data Client"
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $data = $this->model->where('kd_client', $id)->findAll();
        if ($data) {
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data berhasil di hapus'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}
