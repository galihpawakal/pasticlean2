<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengelolaModel;
use App\Models\PengelolaRegion1Model;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class PengelolaRegion1 extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new PengelolaRegion1Model();
        $this->modelPengelola = new PengelolaModel();
    }

    public function index()
    {
        $data = $this->model->join('pengelola', 'pengelola.kd_pengelola = pengelola_region_1.kd_pengelola')->findAll();
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'kd_pengelola_region_1' => $key['kd_pengelola_region_1'],
                    'nama_pengelola' => $key['nama_pengelola'],
                    'nama_pengelola_region_1' => $key['nama_pengelola_region_1'],
                    'telegram_pengelola_region_1' => $key['telegram_pengelola_region_1'],
                    'noted_pengelola_region_1' => $key['noted_pengelola_region_1'],
                    'created_pengelola_region_1' => $key['created_pengelola_region_1'],
                    'updated_pengelola_region_1' => $key['updated_pengelola_region_1'],
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
        $data = $this->model->join('pengelola', 'pengelola.kd_pengelola = pengelola_region_1.kd_pengelola')->where('kd_pengelola_region_1', $id)->findAll();
        if ($data) {

            foreach ($data as $key) {
                $result = [
                    'kd_pengelola_region_1' => $key['kd_pengelola_region_1'],
                    'nama_pengelola' => $key['nama_pengelola'],
                    'nama_pengelola_region_1' => $key['nama_pengelola_region_1'],
                    'telegram_pengelola_region_1' => $key['telegram_pengelola_region_1'],
                    'noted_pengelola_region_1' => $key['noted_pengelola_region_1'],
                    'created_pengelola_region_1' => $key['created_pengelola_region_1'],
                    'updated_pengelola_region_1' => $key['updated_pengelola_region_1'],
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
        $kd_pengelola = $this->request->getVar('kd_pengelola');
        $isExists = $this->modelPengelola->where('kd_pengelola', $kd_pengelola)->findAll();
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
        $isExists = $this->model->join('pengelola', 'pengelola.kd_pengelola = pengelola_region_1.kd_pengelola')->find();
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
            'kd_pengelola_region_1' => $isExists[0]['kd_pengelola_region_1'],
            'nama_pengelola' => $isExists[0]['nama_pengelola'],
            'nama_pengelola_region_1' => $isExists[0]['nama_pengelola_region_1'],
            'telegram_pengelola_region_1' => $isExists[0]['telegram_pengelola_region_1'],
            'noted_pengelola_region_1' => $isExists[0]['noted_pengelola_region_1'],
            'created_pengelola_region_1' => $isExists[0]['created_pengelola_region_1'],
            'updated_pengelola_region_1' => $isExists[0]['updated_pengelola_region_1'],
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
        $data = $this->model->where('kd_pengelola_region_1', $id)->findAll();
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
