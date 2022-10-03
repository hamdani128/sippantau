<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLimbah;
use App\Models\ModelUsers;
use Config\Database;

class Limbah extends BaseController
{
    private $db;
    private $limbah;
    public function __construct()
    {
        $this->db = Database::connect();
        $this->limbah = new ModelLimbah();
    }

        
        public function insert_data_detail_air_kegiatan()
        {
            date_default_timezone_set('Asia/Jakarta');
            $userModel = new ModelUsers();
            $loggedUserID = session()->get('loggedUser');
            $UserInfo = $userModel->find($loggedUserID);
            $id_register = $this->limbah->getIDRegisterLimbahAir();
            // echo $id_register;
            $data = [
                'register_id' => $id_register,
                'date' => date('y-m-d'),
                'parameter' => $this->request->getPost('parameter'),
                'satuan' => $this->request->getPost('satuan'),
                'hasil' => $this->request->getPost('hasil'),
                'buku' => $this->request->getPost('buku'),
                'metoda' => $this->request->getPost('metoda'),
                'user_id' => $UserInfo['id'],
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s')
            ];
            $query = $this->db->table('limbah_air_kegiatan_detail')->insert($data);
        }

        public function insert_limbah_air_kegiatan()
        {
            date_default_timezone_set('Asia/Jakarta');
            $userModel = new ModelUsers();
            $loggedUserID = session()->get('loggedUser');
            $UserInfo = $userModel->find($loggedUserID);
            $id_register = $this->limbah->getIDRegisterLimbahAir();
            $data = [
                'register_id' => $id_register,
                'no_sertifikat' => $this->request->getPost('no_sertifikat'),
                'nama_pemohon' => $this->request->getPost('nama_pemohon'),
                'alamat_pemohon' => $this->request->getPost('alamat_pemohon'),
                'lokasi_kegiatan' => $this->request->getPost('lokasi'),
                'contoh_uji' => $this->request->getPost('jenis_contoh'),
                'tanggal_contoh_uji' => $this->request->getPost('tanggal_contoh'),
                'titik_uji' => $this->request->getPost('titik_contoh'),
                'status' => 'menunggu approval',
                'user_id' => $UserInfo['id'],
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s')
            ];
            $query = $this->db->table('limbah_air_kegiatan')->insert($data);
            if($query){
                $response = [
                    'status' => 'success',
                    'message' => 'Data berhasil ditambahkan'
                ];
            }else{
                $response = [
                    'status' => 'error',
                    'message' => 'Data gagal ditambahkan'
                ];
            }
            echo json_encode($response);
        }

        public function insert_detail_emisi_udara()
        {
            date_default_timezone_set('Asia/Jakarta');
            $userModel = new ModelUsers();
            $loggedUserID = session()->get('loggedUser');
            $UserInfo = $userModel->find($loggedUserID);
            $id_register = $this->limbah->getIDRegisterLimbahUdara();
            $data = [
                'register_id' => $id_register,
                'date' => date('y-m-d'),
                'parameter' => $this->request->getPost('parameter'),
                'satuan' => $this->request->getPost('satuan'),
                'hasil' => $this->request->getPost('hasil'),
                'buku' => $this->request->getPost('buku'),
                'metoda' => $this->request->getPost('metoda'),
                'user_id' => $UserInfo['id'],
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s')
            ];
            $query1 = $this->db->table('limbah_udara_detail')->insert($data);
        }

        function insert_limbah_udara()
        {
            date_default_timezone_set('Asia/Jakarta');
            $userModel = new ModelUsers();
            $loggedUserID = session()->get('loggedUser');
            $UserInfo = $userModel->find($loggedUserID);
            $user_id = $UserInfo['id'];
            $id_register = $this->limbah->getIDRegisterLimbahUdara();
            // echo $id_register;
            $data = [
                'register_id' => $id_register,
                'no_sertifikat' => $_POST['no_sertifikat'],
                'nama_pemohon' => $_POST['nama_pemohon'],
                'alamat_pemohon' => $_POST['alamat_pemohon'],
                'lokasi_kegiatan' => $_POST['lokasi'],
                'contoh_uji' => $_POST['jenis_contoh'],
                'tanggal_contoh_uji' => $_POST['tanggal_contoh'],
                'titik_uji' => $_POST['titik_contoh'],
                'status' => 'menunggu approval',
                'user_id' => $user_id,
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s')
            ];
            $query = $this->db->table('limbah_udara')->insert($data);
            if ($query){
                $response = [
                    'status' => 'success',
                    'message' => 'Data berhasil ditambahkan'
                ];
            }else{
                $response = [
                    'status' => 'error',
                    'message' => 'Data gagal ditambahkan'
                ];
            }
            echo json_encode($response);
        }


        public function insert_detail_limbah_b3()
        {
            date_default_timezone_set('Asia/Jakarta');
            $userModel = new ModelUsers();
            $loggedUserID = session()->get('loggedUser');
            $UserInfo = $userModel->find($loggedUserID);
            $user_id = $UserInfo['id'];
            $id_register = $this->request->getpost('id_register');
            $paramete = $this->request->getPost('parameter');
            $jumlah = $this->request->getPost('jumlah');
            $jenis = $this->request->getPost('jenis');
            $perlakuan = $this->request->getPost('perlakuan');
            $created_at = date('y-m-d H:i:s');
            $updated_at = date('y-m-d H:i:s');

            $data = [
                'id_register' => $id_register,
                'date' => date('y-m-d'),
                'parameter' => $paramete,
                'jumlah' => $jumlah,
                'jenis_limbah' => $jenis,
                'persetujuan' => $perlakuan,
                'user_id' => $user_id,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ];

            $query = $this->db->table('limbah_b3_detail')->insert($data);
        }

        public function insert_limbah_b3()
        {
            date_default_timezone_set('Asia/Jakarta');
            $userModel = new ModelUsers();
            $loggedUserID = session()->get('loggedUser');
            $UserInfo = $userModel->find($loggedUserID);
            $user_id = $UserInfo['id'];
            $id_register = $this->request->getpost('id_register');
            $nama_perusahaan = $this->request->getPost('nama_perusahaan');
            $bidang_usaha = $this->request->getPost('bidang_usaha');
            $periode_mulai = $this->request->getPost('periode_mulai');
            $periode_sampai = $this->request->getPost('periode_sampai');
            $created_at = date('y-m-d H:i:s');
            $updated_at = date('y-m-d H:i:s');

            $data = [
                'id_register' => $id_register,
                'date' => date('y-m-d'),
                'nama_perusahaan' => $nama_perusahaan,
                'bidang' => $bidang_usaha,
                'periode' => $periode_mulai . " to " . $periode_sampai,
                'status' => 'menunggu approval',
                'user_id' => $user_id,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ];

            $query = $this->db->table('limbah_b3')->insert($data);
            if ($query){
                $response = [
                    'status' => 'success',
                    'message' => 'Data berhasil ditambahkan'
                ];
            }else{
                $response = [
                    'status' => 'error',
                    'message' => 'Data gagal ditambahkan'
                ];
            }
            echo json_encode($response);
        }

        public function insert_detail_limbah_domestik()
        {
            date_default_timezone_set('Asia/Jakarta');
            $userModel = new ModelUsers();
            $loggedUserID = session()->get('loggedUser');
            $UserInfo = $userModel->find($loggedUserID);
            $user_id = $UserInfo['id'];
            
            $parameter = $this->request->getPost('parameter');
            $satuan = $this->request->getPost('satuan');
            $hasil = $this->request->getPost('hasil');
            $buku = $this->request->getPost('buku');
            $metoda = $this->request->getPost('metoda');
            $register_id = $this->limbah->getIDRegisterLimbahDomestik();
            $created_at = date('y-m-d H:i:s');
            $updated_at = date('y-m-d H:i:s');

            $data = [
                'register_id' => $register_id,
                'date' => date('y-m-d'),
                'parameter' => $parameter,
                'satuan' => $satuan,
                'hasil' => $hasil,
                'buku' => $buku,
                'metoda' => $metoda,
                'user_id' => $user_id,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ];
            $query = $this->db->table('limbah_air_domestik_detail')->insert($data);
        }

        public function insert_limbah_air_domestik()
        {
            
            date_default_timezone_set('Asia/Jakarta');
            $userModel = new ModelUsers();
            $loggedUserID = session()->get('loggedUser');
            $UserInfo = $userModel->find($loggedUserID);
            $user_id = $UserInfo['id'];
            $no_sertifikat = $this->request->getPost('no_sertifikat');
            $nama_pemohonan = $this->request->getPost('nama_pemohon');
            $alamat_pemohon = $this->request->getPost('alamat_pemohon');
            $lokasi = $this->request->getPost('lokasi');
            $jenis_contoh = $this->request->getPost('jenis_contoh');
            $tanggal_contoh = $this->request->getPost('tanggal_contoh');
            $titik_contoh = $this->request->getPost('titik_contoh');
            $register_id = $this->limbah->getIDRegisterLimbahDomestik();
            $created_at = date('y-m-d H:i:s');
            $updated_at = date('y-m-d H:i:s');

            $data = [
                'register_id' => $register_id,
                'no_sertifikat' => $no_sertifikat,
                'nama_pemohon' => $nama_pemohonan,
                'alamat_pemohon' => $alamat_pemohon,
                'lokasi_kegiatan' => $lokasi,
                'contoh_uji' => $jenis_contoh,
                'tanggal_contoh_uji' => $tanggal_contoh,
                'titik_uji' => $titik_contoh,
                'status' => 'menunggu approval',
                'user_id' => $user_id,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ];

            $query = $this->db->table('limbah_air_domestik')->insert($data);
            if($query){
                $response = [
                    'status' => 'success'
                ];
            }else{
                $response = [
                    'status' => 'error'
                ];
            }
            return json_encode($response);
        }

        public function delete_limbah_air_kegiatan()
        {
            $register_id = $this->request->getpost('register_id');
            $query1 = $this->db->table('limbah_air_kegiatan')->where('register_id', $register_id)->delete();
            $query2 = $this->db->table('limbah_air_kegiatan_detail')->where('register_id', $register_id)->delete();
            if($query1 && $query2){
                $response = [
                    'message' => 'Data Berhasil Dihapus !',
                    'status' => 'success',
                ];
            }else{
                $response = [
                    'message' => 'Problem with Processing !',
                    'status' => 'error',
                ];
            }
            return json_encode($response);
        }


}