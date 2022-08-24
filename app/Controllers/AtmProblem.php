<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AtmLokasiModel;
use App\Models\AtmProblemModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class AtmProblem extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new AtmProblemModel();
        $this->modelAtmLokasi = new AtmLokasiModel();
    }

    public function index()
    {
        $data = $this->model->join('atm_lokasi', 'atm_lokasi.id_atm_lokasi = atm_problem.id_atm_lokasi')->findAll();
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'id_atm_problem' => $key['id_atm_problem'],
                    'nama_atm_lokasi' => $key['nama_atm_lokasi'],
                    'pelapor_atm_problem' => $key['pelapor_atm_problem'],
                    'foto_atm_problem' => $key['foto_atm_problem'],
                    'status_atm_problem' => $key['status_atm_problem'],
                    'noted_atm_problem' => $key['noted_atm_problem'],
                    'created_atm_problem' => $key['created_atm_problem'],
                    'updated_atm_problem' => $key['updated_atm_problem'],
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
        $data = $this->model->join('atm_lokasi', 'atm_lokasi.id_atm_lokasi = atm_problem.id_atm_lokasi')->where('id_atm_problem', $id)->findAll();
        if ($data) {

            foreach ($data as $key) {
                $result = [
                    'id_atm_problem' => $key['id_atm_problem'],
                    'nama_atm_lokasi' => $key['nama_atm_lokasi'],
                    'pelapor_atm_problem' => $key['pelapor_atm_problem'],
                    'foto_atm_problem' => $key['foto_atm_problem'],
                    'status_atm_problem' => $key['status_atm_problem'],
                    'noted_atm_problem' => $key['noted_atm_problem'],
                    'created_atm_problem' => $key['created_atm_problem'],
                    'updated_atm_problem' => $key['updated_atm_problem'],
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
        $id_atm_lokasi = $this->request->getVar('id_atm_lokasi');
        $isExists = $this->modelAtmLokasi->where('id_atm_lokasi', $id_atm_lokasi)->findAll();
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
        $isExists = $this->model->join('atm_lokasi', 'atm_lokasi.id_atm_lokasi = atm_problem.id_atm_lokasi')->where('id_atm_problem', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->join('atm_lokasi', 'atm_lokasi.id_atm_lokasi = atm_problem.id_atm_lokasi')->where('id_atm_problem', $id)->find();
        $result = [
            'id_atm_problem' => $isExists[0]['id_atm_problem'],
            'nama_atm_lokasi' => $isExists[0]['nama_atm_lokasi'],
            'pelapor_atm_problem' => $isExists[0]['pelapor_atm_problem'],
            'foto_atm_problem' => $isExists[0]['foto_atm_problem'],
            'status_atm_problem' => $isExists[0]['status_atm_problem'],
            'noted_atm_problem' => $isExists[0]['noted_atm_problem'],
            'created_atm_problem' => $isExists[0]['created_atm_problem'],
            'updated_atm_problem' => $isExists[0]['updated_atm_problem'],
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
        $data = $this->model->where('id_atm_problem', $id)->findAll();
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
