<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SnapshootModel;
use App\Models\KunjunganModel;
use App\Models\KunjunganSnapshootModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class KunjunganSnapshoot extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new KunjunganSnapshootModel();
        $this->modelSnapshoot = new SnapshootModel();
        $this->modelKunjungan = new KunjunganModel();
    }

    public function index()
    {
        $data = $this->model->join('kunjungan', 'kunjungan.id_kunjungan = kunjungan_snapshoot.id_kunjungan')
            ->join('snapshoot', 'snapshoot.id_snapshoot = kunjungan_snapshoot.id_snapshoot')

            ->findAll();
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'id_kunjungan_snapshoot' => $key['id_kunjungan_snapshoot'],
                    'petugas_kunjungan' => $key['petugas_kunjungan'],
                    'nama_snapshoot' => $key['nama_snapshoot'],
                    'foto_kunjungan_snapshoot' => $key['foto_kunjungan_snapshoot'],
                    'noted_kunjungan_snapshoot' => $key['noted_kunjungan_snapshoot'],
                    'created_kunjungan_snapshoot' => $key['created_kunjungan_snapshoot'],
                    'updated_kunjungan_snapshoot' => $key['updated_kunjungan_snapshoot'],
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
        $data = $this->model->join('kunjungan', 'kunjungan.id_kunjungan = kunjungan_snapshoot.id_kunjungan')
            ->join('snapshoot', 'snapshoot.id_snapshoot = kunjungan_snapshoot.id_snapshoot')
            ->where('id_kunjungan_snapshoot', $id)->findAll();
        if ($data) {

            foreach ($data as $key) {
                $result = [
                    'id_kunjungan_snapshoot' => $key['id_kunjungan_snapshoot'],
                    'petugas_kunjungan' => $key['petugas_kunjungan'],
                    'nama_snapshoot' => $key['nama_snapshoot'],
                    'foto_kunjungan_snapshoot' => $key['foto_kunjungan_snapshoot'],
                    'noted_kunjungan_snapshoot' => $key['noted_kunjungan_snapshoot'],
                    'created_kunjungan_snapshoot' => $key['created_kunjungan_snapshoot'],
                    'updated_kunjungan_snapshoot' => $key['updated_kunjungan_snapshoot'],
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
        // atm kunjungan_snapshoot
        $id_snapshoot = $this->request->getVar('id_snapshoot');
        $isExists = $this->modelSnapshoot->where('id_snapshoot', $id_snapshoot)->findAll();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found snapshoot kunjungan'
            ];
            return $this->respond($response);
        }

        //atm lokasi
        $id_kunjungan = $this->request->getVar('id_kunjungan');
        $isExists = $this->modelKunjungan->where('id_kunjungan', $id_kunjungan)->findAll();
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
        $isExists = $this->model->join('snapshoot', 'snapshoot.id_snapshoot = kunjungan_snapshoot.id_snapshoot')
            ->join('kunjungan', 'kunjungan.id_kunjungan = kunjungan_snapshoot.id_kunjungan')
            ->where('id_kunjungan_snapshoot', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->join('snapshoot', 'snapshoot.id_snapshoot = kunjungan_snapshoot.id_snapshoot')
            ->join('kunjungan', 'kunjungan.id_kunjungan = kunjungan_snapshoot.id_kunjungan')
            ->where('id_kunjungan_snapshoot', $id)->find();
        $result = [
            'id_kunjungan_snapshoot' => $isExists[0]['id_kunjungan_snapshoot'],
            'petugas_kunjungan' => $isExists[0]['petugas_kunjungan'],
            'nama_snapshoot' => $isExists[0]['nama_snapshoot'],
            'foto_kunjungan_snapshoot' => $isExists[0]['foto_kunjungan_snapshoot'],
            'noted_kunjungan_snapshoot' => $isExists[0]['noted_kunjungan_snapshoot'],
            'created_kunjungan_snapshoot' => $isExists[0]['created_kunjungan_snapshoot'],
            'updated_kunjungan_snapshoot' => $isExists[0]['updated_kunjungan_snapshoot'],
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
        $data = $this->model->where('id_kunjungan_snapshoot', $id)->findAll();
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
