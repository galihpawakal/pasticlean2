<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AtmLokasiModel;
use App\Models\AtmAuditModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class AtmAudit extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new AtmAuditModel();
        $this->modelAtmLokasi = new AtmLokasiModel();
    }

    public function index()
    {
        $data = $this->model->join('atm_lokasi', 'atm_lokasi.id_atm_lokasi = atm_audit.id_atm_lokasi')->findAll();
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'id_atm_audit' => $key['id_atm_audit'],
                    'nama_atm_lokasi' => $key['nama_atm_lokasi'],
                    'pelapor_atm_audit' => $key['pelapor_atm_audit'],
                    'foto_atm_audit' => $key['foto_atm_audit'],
                    'status_atm_audit' => $key['status_atm_audit'],
                    'noted_atm_audit' => $key['noted_atm_audit'],
                    'created_atm_audit' => $key['created_atm_audit'],
                    'updated_atm_audit' => $key['updated_atm_audit'],
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
        $data = $this->model->join('atm_lokasi', 'atm_lokasi.id_atm_lokasi = atm_audit.id_atm_lokasi')->where('id_atm_audit', $id)->findAll();
        if ($data) {

            foreach ($data as $key) {
                $result = [
                    'id_atm_audit' => $key['id_atm_audit'],
                    'nama_atm_lokasi' => $key['nama_atm_lokasi'],
                    'pelapor_atm_audit' => $key['pelapor_atm_audit'],
                    'foto_atm_audit' => $key['foto_atm_audit'],
                    'status_atm_audit' => $key['status_atm_audit'],
                    'noted_atm_audit' => $key['noted_atm_audit'],
                    'created_atm_audit' => $key['created_atm_audit'],
                    'updated_atm_audit' => $key['updated_atm_audit'],
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
        $isExists = $this->model->join('atm_lokasi', 'atm_lokasi.id_atm_lokasi = atm_audit.id_atm_lokasi')->where('id_atm_audit', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->join('atm_lokasi', 'atm_lokasi.id_atm_lokasi = atm_audit.id_atm_lokasi')->where('id_atm_audit', $id)->find();
        $result = [
            'id_atm_audit' => $isExists[0]['id_atm_audit'],
            'nama_atm_lokasi' => $isExists[0]['nama_atm_lokasi'],
            'pelapor_atm_audit' => $isExists[0]['pelapor_atm_audit'],
            'foto_atm_audit' => $isExists[0]['foto_atm_audit'],
            'status_atm_audit' => $isExists[0]['status_atm_audit'],
            'noted_atm_audit' => $isExists[0]['noted_atm_audit'],
            'created_atm_audit' => $isExists[0]['created_atm_audit'],
            'updated_atm_audit' => $isExists[0]['updated_atm_audit'],
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
        $data = $this->model->where('id_atm_audit', $id)->findAll();
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
