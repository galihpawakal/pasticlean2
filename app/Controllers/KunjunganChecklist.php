<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KunjunganModel;
use App\Models\ChecklistModel;
use App\Models\KunjunganChecklistModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class KunjunganChecklist extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new KunjunganChecklistModel();
        $this->modelKunjungan = new KunjunganModel();
        $this->modelChecklist = new ChecklistModel();
    }

    public function index()
    {
        $data = $this->model->join('checklist', 'checklist.id_checklist = kunjungan_checklist.id_checklist')
            ->join('kunjungan', 'kunjungan.id_kunjungan = kunjungan_checklist.id_kunjungan')

            ->findAll();
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'id_kunjungan_checklist' => $key['id_kunjungan_checklist'],
                    'petugas_kunjungan' => $key['petugas_kunjungan'],
                    'nama_checklist' => $key['nama_checklist'],
                    'status_kunjungan_checklist' => $key['status_kunjungan_checklist'],
                    'foto_kunjungan_checklist' => $key['foto_kunjungan_checklist'],
                    'noted_kunjungan_checklist' => $key['noted_kunjungan_checklist'],
                    'created_kunjungan_checklist' => $key['created_kunjungan_checklist'],
                    'updated_kunjungan_checklist' => $key['updated_kunjungan_checklist'],
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
        $data = $this->model->join('checklist', 'checklist.id_checklist = kunjungan_checklist.id_checklist')
            ->join('kunjungan', 'kunjungan.id_kunjungan = kunjungan_checklist.id_kunjungan')
            ->where('id_kunjungan_checklist', $id)->findAll();
        if ($data) {

            foreach ($data as $key) {
                $result = [
                    'id_kunjungan_checklist' => $key['id_kunjungan_checklist'],
                    'petugas_kunjungan' => $key['petugas_kunjungan'],
                    'nama_checklist' => $key['nama_checklist'],
                    'status_kunjungan_checklist' => $key['status_kunjungan_checklist'],
                    'foto_kunjungan_checklist' => $key['foto_kunjungan_checklist'],
                    'noted_kunjungan_checklist' => $key['noted_kunjungan_checklist'],
                    'created_kunjungan_checklist' => $key['created_kunjungan_checklist'],
                    'updated_kunjungan_checklist' => $key['updated_kunjungan_checklist'],
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
        // atm kunjungan_checklist
        $id_kunjungan = $this->request->getVar('id_kunjungan');
        $isExists = $this->modelKunjungan->where('id_kunjungan', $id_kunjungan)->findAll();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found kunjungan checklist'
            ];
            return $this->respond($response);
        }

        //atm lokasi
        $id_checklist = $this->request->getVar('id_checklist');
        $isExists = $this->modelChecklist->where('id_checklist', $id_checklist)->findAll();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found lokasi'
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
        $isExists = $this->model->join('kunjungan', 'kunjungan.id_kunjungan = kunjungan_checklist.id_kunjungan')
            ->join('checklist', 'checklist.id_checklist = kunjungan_checklist.id_checklist')
            ->where('id_kunjungan_checklist', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->join('kunjungan', 'kunjungan.id_kunjungan = kunjungan_checklist.id_kunjungan')
            ->join('checklist', 'checklist.id_checklist = kunjungan_checklist.id_checklist')
            ->where('id_kunjungan_checklist', $id)->find();
        $result = [
            'id_kunjungan_checklist' => $isExists[0]['id_kunjungan_checklist'],
            'petugas_kunjungan' => $isExists[0]['petugas_kunjungan'],
            'nama_checklist' => $isExists[0]['nama_checklist'],
            'status_kunjungan_checklist' => $isExists[0]['status_kunjungan_checklist'],
            'foto_kunjungan_checklist' => $isExists[0]['foto_kunjungan_checklist'],
            'noted_kunjungan_checklist' => $isExists[0]['noted_kunjungan_checklist'],
            'created_kunjungan_checklist' => $isExists[0]['created_kunjungan_checklist'],
            'updated_kunjungan_checklist' => $isExists[0]['updated_kunjungan_checklist'],
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
        $data = $this->model->where('id_kunjungan_checklist', $id)->findAll();
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
