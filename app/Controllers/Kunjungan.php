<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AtmKunjunganModel;
use App\Models\AtmLokasiModel;
use App\Models\KunjunganModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Kunjungan extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new KunjunganModel();
        $this->modelAtmKunjungan = new AtmKunjunganModel();
        $this->modelAtmLokasi = new AtmLokasiModel();
    }

    public function index()
    {
        $data = $this->model->join('atm_lokasi', 'atm_lokasi.id_atm_lokasi = kunjungan.id_atm_lokasi')
            ->join('atm_kunjungan', 'atm_kunjungan.id_atm_kunjungan = kunjungan.id_atm_kunjungan')

            ->findAll();
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'id_kunjungan' => $key['id_kunjungan'],
                    'nama_atm_kunjungan' => $key['nama_atm_kunjungan'],
                    'nama_atm_lokasi' => $key['nama_atm_lokasi'],
                    'petugas_kunjungan' => $key['petugas_kunjungan'],
                    'tgl_kunjungan' => $key['tgl_kunjungan'],
                    'status_kunjungan' => $key['status_kunjungan'],
                    'noted_kunjungan' => $key['noted_kunjungan'],
                    'created_kunjungan' => $key['created_kunjungan'],
                    'updated_kunjungan' => $key['updated_kunjungan'],
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
        $data = $this->model->join('atm_lokasi', 'atm_lokasi.id_atm_lokasi = kunjungan.id_atm_lokasi')
            ->join('atm_kunjungan', 'atm_kunjungan.id_atm_kunjungan = kunjungan.id_atm_kunjungan')
            ->where('id_kunjungan', $id)->findAll();
        if ($data) {

            foreach ($data as $key) {
                $result = [
                    'id_kunjungan' => $key['id_kunjungan'],
                    'nama_atm_kunjungan' => $key['nama_atm_kunjungan'],
                    'nama_atm_lokasi' => $key['nama_atm_lokasi'],
                    'petugas_kunjungan' => $key['petugas_kunjungan'],
                    'tgl_kunjungan' => $key['tgl_kunjungan'],
                    'status_kunjungan' => $key['status_kunjungan'],
                    'noted_kunjungan' => $key['noted_kunjungan'],
                    'created_kunjungan' => $key['created_kunjungan'],
                    'updated_kunjungan' => $key['updated_kunjungan'],
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
        // atm kunjungan
        $id_atm_kunjungan = $this->request->getVar('id_atm_kunjungan');
        $isExists = $this->modelAtmKunjungan->where('id_atm_kunjungan', $id_atm_kunjungan)->findAll();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found kunjungan'
            ];
            return $this->respond($response);
        }

        //atm lokasi
        $id_atm_lokasi = $this->request->getVar('id_atm_lokasi');
        $isExists = $this->modelAtmLokasi->where('id_atm_lokasi', $id_atm_lokasi)->findAll();
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
        $isExists = $this->model->join('atm_kunjungan', 'atm_kunjungan.id_atm_kunjungan = kunjungan.id_atm_kunjungan')
            ->join('atm_lokasi', 'atm_lokasi.id_atm_lokasi = kunjungan.id_atm_lokasi')
            ->where('id_kunjungan', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->join('atm_kunjungan', 'atm_kunjungan.id_atm_kunjungan = kunjungan.id_atm_kunjungan')
            ->join('atm_lokasi', 'atm_lokasi.id_atm_lokasi = kunjungan.id_atm_lokasi')
            ->where('id_kunjungan', $id)->find();
        $result = [
            'id_kunjungan' => $isExists[0]['id_kunjungan'],
            'nama_atm_kunjungan' => $isExists[0]['nama_atm_kunjungan'],
            'nama_atm_lokasi' => $isExists[0]['nama_atm_lokasi'],
            'petugas_kunjungan' => $isExists[0]['petugas_kunjungan'],
            'tgl_kunjungan' => $isExists[0]['tgl_kunjungan'],
            'status_kunjungan' => $isExists[0]['status_kunjungan'],
            'noted_kunjungan' => $isExists[0]['noted_kunjungan'],
            'created_kunjungan' => $isExists[0]['created_kunjungan'],
            'updated_kunjungan' => $isExists[0]['updated_kunjungan'],
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
        $data = $this->model->where('id_kunjungan', $id)->findAll();
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
