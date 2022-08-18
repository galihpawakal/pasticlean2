<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengelolaModel;
use App\Models\PengelolaRegion2Model;
use App\Models\PengelolaRegion3Model;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class PengelolaRegion3 extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new PengelolaRegion3Model();
        $this->modelPengelolaRegion2 = new PengelolaRegion2Model();
        $this->modelPengelola = new PengelolaModel();
    }

    public function index()
    {
        $data = $this->model->join('pengelola_region_2', 'pengelola_region_2.kd_pengelola_region_2 = pengelola_region_3.kd_pengelola_region_2')
            ->join('pengelola_region_1', 'pengelola_region_1.kd_pengelola_region_1 = pengelola_region_2.kd_pengelola_region_1')
            ->join('pengelola', 'pengelola.kd_pengelola = pengelola_region_1.kd_pengelola')->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result[] = [
                    'kd_pengelola_region_3' => $row['kd_pengelola_region_3'],
                    'nama_pengelola' => $row['nama_pengelola'],
                    'nama_pengelola_region_2' => $row['nama_pengelola_region_1'],
                    'nama_pengelola_region_2' => $row['nama_pengelola_region_2'],
                    'nama_pengelola_region_3' => $row['nama_pengelola_region_3'],
                    'telegram_pengelola_region_3' => $row['telegram_pengelola_region_3'],
                    'noted_pengelola_region_3' => $row['noted_pengelola_region_3'],
                    'created_pengelola_region_3' => $row['created_pengelola_region_3'],
                    'updated_pengelola_region_3' => $row['updated_pengelola_region_3'],
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
        $data = $this->model->join('pengelola_region_2', 'pengelola_region_2.kd_pengelola_region_2 = pengelola_region_3.kd_pengelola_region_2')
            ->join('pengelola_region_1', 'pengelola_region_1.kd_pengelola_region_1 = pengelola_region_2.kd_pengelola_region_1')
            ->join('pengelola', 'pengelola.kd_pengelola = pengelola_region_1.kd_pengelola')
            ->where('kd_pengelola_region_3', $id)->findAll();
        if ($data) {

            foreach ($data as $row) {
                $result = [
                    'kd_pengelola_region_3' => $row['kd_pengelola_region_3'],
                    'nama_pengelola' => $row['nama_pengelola'],
                    'nama_pengelola_region_2' => $row['nama_pengelola_region_1'],
                    'nama_pengelola_region_2' => $row['nama_pengelola_region_2'],
                    'nama_pengelola_region_3' => $row['nama_pengelola_region_3'],
                    'telegram_pengelola_region_3' => $row['telegram_pengelola_region_3'],
                    'noted_pengelola_region_3' => $row['noted_pengelola_region_3'],
                    'created_pengelola_region_3' => $row['created_pengelola_region_3'],
                    'updated_pengelola_region_3' => $row['updated_pengelola_region_3'],
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
        $kd_pengelola_region_2 = $this->request->getVar('kd_pengelola_region_2');
        $isExists = $this->modelPengelolaRegion2->where('kd_pengelola_region_2', $kd_pengelola_region_2)->findAll();
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
        $isExists = $this->model->join('pengelola_region_2', 'pengelola_region_2.kd_pengelola_region_2 = pengelola_region_3.kd_pengelola_region_2')
            ->join('pengelola_region_1', 'pengelola_region_1.kd_pengelola_region_1 = pengelola_region_2.kd_pengelola_region_1')
            ->join('pengelola', 'pengelola.kd_pengelola = pengelola_region_1.kd_pengelola')
            ->where('kd_pengelola_region_3', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->join('pengelola_region_2', 'pengelola_region_2.kd_pengelola_region_2 = pengelola_region_3.kd_pengelola_region_2')
            ->join('pengelola_region_1', 'pengelola_region_1.kd_pengelola_region_1 = pengelola_region_2.kd_pengelola_region_1')
            ->join('pengelola', 'pengelola.kd_pengelola = pengelola_region_1.kd_pengelola')
            ->where('kd_pengelola_region_3', $id)->find();
        $result = [
            'kd_pengelola_region_3' => $isExists[0]['kd_pengelola_region_3'],
            'nama_pengelola' => $isExists[0]['nama_pengelola'],
            'nama_pengelola_region_1' => $isExists[0]['nama_pengelola_region_1'],
            'nama_pengelola_region_2' => $isExists[0]['nama_pengelola_region_2'],
            'nama_pengelola_region_3' => $isExists[0]['nama_pengelola_region_3'],
            'telegram_pengelola_region_3' => $isExists[0]['telegram_pengelola_region_3'],
            'noted_pengelola_region_3' => $isExists[0]['noted_pengelola_region_3'],
            'created_pengelola_region_3' => $isExists[0]['created_pengelola_region_3'],
            'updated_pengelola_region_3' => $isExists[0]['updated_pengelola_region_3'],
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
        $data = $this->model->where('kd_pengelola_region_3', $id)->findAll();
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
