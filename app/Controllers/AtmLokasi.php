<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AtmKategoriModel;
use App\Models\AtmLokasiModel;
use App\Models\AtmRingModel;
use App\Models\AtmSubkategoriModel;
use App\Models\ClientRegion3Model;
use App\Models\PengelolaRegion3Model;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class AtmLokasi extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new AtmLokasiModel();
        $this->modelClientRegion3 = new ClientRegion3Model();
        $this->modelPengelolaRegion3 = new PengelolaRegion3Model();
        $this->modelAtmKategori = new AtmKategoriModel();
        $this->modelAtmSubkategori = new AtmSubkategoriModel();
        $this->modelAtmRing = new AtmRingModel();
    }

    public function index()
    {
        $data = $this->model->join('client_region_3', 'client_region_3.kd_client_region_3 = atm_lokasi.kd_client_region_3')
            ->join('pengelola_region_3', 'pengelola_region_3.kd_pengelola_region_3 = atm_lokasi.kd_pengelola_region_3')
            ->join('atm_kategori', 'atm_kategori.id_atm_kategori = atm_lokasi.id_atm_kategori')
            ->join('atm_subkategori', 'atm_subkategori.id_atm_subkategori = atm_lokasi.id_atm_subkategori')
            ->join('atm_ring', 'atm_ring.id_atm_ring = atm_lokasi.id_atm_ring')
            ->findAll();
        if ($data) {
            foreach ($data as $row) {
                $result[] = [
                    'id_atm_lokasi' => $row['id_atm_lokasi'],
                    'nama_client_region_3' => $row['nama_client_region_3'],
                    'nama_pengelola_region_3' => $row['nama_pengelola_region_3'],
                    'nama_atm_kategori' => $row['nama_atm_kategori'],
                    'nama_atm_subkategori' => $row['nama_atm_subkategori'],
                    'nama_atm_ring' => $row['nama_atm_ring'],
                    'nama_atm_lokasi' => $row['nama_atm_lokasi'],
                    'lat_atm_lokasi' => $row['lat_atm_lokasi'],
                    'lng_atm_lokasi' => $row['lng_atm_lokasi'],
                    'created_atm_lokasi' => $row['created_atm_lokasi'],
                    'updated_atm_lokasi' => $row['updated_atm_lokasi'],
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
        $data = $this->model->join('client_region_3', 'client_region_3.kd_client_region_3 = atm_lokasi.kd_client_region_3')
            ->join('pengelola_region_3', 'pengelola_region_3.kd_pengelola_region_3 = atm_lokasi.kd_pengelola_region_3')
            ->join('atm_kategori', 'atm_kategori.id_atm_kategori = atm_lokasi.id_atm_kategori')
            ->join('atm_subkategori', 'atm_subkategori.id_atm_subkategori = atm_lokasi.id_atm_subkategori')
            ->join('atm_ring', 'atm_ring.id_atm_ring = atm_lokasi.id_atm_ring')
            ->where('id_atm_lokasi', $id)->findAll();
        if ($data) {

            foreach ($data as $row) {
                $result = [
                    'id_atm_lokasi' => $row['id_atm_lokasi'],
                    'nama_client_region_3' => $row['nama_client_region_3'],
                    'nama_pengelola_region_3' => $row['nama_pengelola_region_3'],
                    'nama_atm_kategori' => $row['nama_atm_kategori'],
                    'nama_atm_subkategori' => $row['nama_atm_subkategori'],
                    'nama_atm_ring' => $row['nama_atm_ring'],
                    'nama_atm_lokasi' => $row['nama_atm_lokasi'],
                    'lat_atm_lokasi' => $row['lat_atm_lokasi'],
                    'lng_atm_lokasi' => $row['lng_atm_lokasi'],
                    'created_atm_lokasi' => $row['created_atm_lokasi'],
                    'updated_atm_lokasi' => $row['updated_atm_lokasi'],
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
        $kd_client_region_3 = $this->request->getVar('kd_client_region_3');
        $kd_pengelola_region_3 = $this->request->getVar('kd_pengelola_region_3');
        $atm_kategori = $this->request->getVar('id_atm_kategori');
        $atm_subkategori = $this->request->getVar('id_atm_subkategori');
        $atm_ring = $this->request->getVar('id_atm_ring');
        // cek region 3
        $isExistsClient3 = $this->modelClientRegion3->where('kd_client_region_3', $kd_client_region_3)->findAll();
        if (!$isExistsClient3) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found client 3'
            ];
            return $this->respond($response);
        }
        // cek pengelola 3
        $isExistsPengelola3 = $this->modelPengelolaRegion3->where('kd_pengelola_region_3', $kd_pengelola_region_3)->findAll();
        if (!$isExistsPengelola3) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found pengelola 3'
            ];
            return $this->respond($response);
        }
        // cek atm kategori
        $isExistsAtmKategori = $this->modelAtmKategori->where('id_atm_kategori', $atm_kategori)->find();
        if (!$isExistsAtmKategori) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found atm kategori'
            ];
            return $this->respond($response);
        }
        // cek atm subkategori
        $isExistsAtmSubKategori = $this->modelAtmSubkategori->where('id_atm_subkategori', $atm_subkategori)->findAll();
        if (!$isExistsAtmSubKategori) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found atm subkategori'
            ];
            return $this->respond($response);
        }
        // cek atm ring
        $isExistsAtmRing = $this->modelAtmRing->where('id_atm_ring', $atm_ring)->findAll();
        if (!$isExistsAtmRing) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found atm ring'
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
        $isExists = $this->model->join('client_region_3', 'client_region_3.kd_client_region_3 = atm_lokasi.kd_client_region_3')
            ->join('pengelola_region_3', 'pengelola_region_3.kd_pengelola_region_3 = atm_lokasi.kd_pengelola_region_3')
            ->join('atm_kategori', 'atm_kategori.id_atm_kategori = atm_lokasi.id_atm_kategori')
            ->join('atm_subkategori', 'atm_subkategori.id_atm_subkategori = atm_lokasi.id_atm_subkategori')
            ->join('atm_ring', 'atm_ring.id_atm_ring = atm_lokasi.id_atm_ring')
            ->where('id_atm_lokasi', $id)->find();
        if (!$isExists) {
            $response = [
                'code' => 401,
                'status' => 'error',
                'data' => 'data not found'
            ];
            return $this->respond($response);
        }
        $update = $this->model->update($id, $data);
        $isExists = $this->model->join('client_region_3', 'client_region_3.kd_client_region_3 = atm_lokasi.kd_client_region_3')
            ->join('pengelola_region_3', 'pengelola_region_3.kd_pengelola_region_3 = atm_lokasi.kd_pengelola_region_3')
            ->join('atm_kategori', 'atm_kategori.id_atm_kategori = atm_lokasi.id_atm_kategori')
            ->join('atm_subkategori', 'atm_subkategori.id_atm_subkategori = atm_lokasi.id_atm_subkategori')
            ->join('atm_ring', 'atm_ring.id_atm_ring = atm_lokasi.id_atm_ring')
            ->where('id_atm_lokasi', $id)->find();
        $result = [
            'id_atm_lokasi' => $isExists[0]['id_atm_lokasi'],
            'nama_client_region_3' => $isExists[0]['nama_client_region_3'],
            'nama_pengelola_region_3' => $isExists[0]['nama_pengelola_region_3'],
            'nama_atm_kategori' => $isExists[0]['nama_atm_kategori'],
            'nama_atm_subkategori' => $isExists[0]['nama_atm_subkategori'],
            'nama_atm_ring' => $isExists[0]['nama_atm_ring'],
            'nama_atm_lokasi' => $isExists[0]['nama_atm_lokasi'],
            'lat_atm_lokasi' => $isExists[0]['lat_atm_lokasi'],
            'lng_atm_lokasi' => $isExists[0]['lng_atm_lokasi'],
            'created_atm_lokasi' => $isExists[0]['created_atm_lokasi'],
            'updated_atm_lokasi' => $isExists[0]['updated_atm_lokasi'],
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
        $data = $this->model->where('id_atm_lokasi', $id)->findAll();
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
