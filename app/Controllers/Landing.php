<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Landing extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getIDRegister()
    {
        $SQL = "SELECT MAX(RIGHT(registrasi_id,4)) AS registrasi_id FROM registrasi_lab WHERE date = '" . date('Y-m-d') . "'";
        $query = $this->db->query($SQL);
        $id_register = $query->getRowObject()->registrasi_id;
        if ($id_register == null) {
            $id_register =  "RGT".date('Ymd') . "0001";
        } else {
            $id_register = "RGT" . date('Ymd') . str_pad($id_register + 1, 4, '0', STR_PAD_LEFT);
        }
        return $id_register;
    }

    public function index()
    {
        $data = [
            'no_register' => $this->getIDRegister(),
        ];
        return view('landing/registrasilab', $data);
    }

    public function insert_registrasilab()
    {
        date_default_timezone_set('Asia/Jakarta');
        $ktp = $this->request->getPost('ktp');
        $nama = $this->request->getPost('nama');
        $jabatan = $this->request->getPost('jabatan');
        $hp = $this->request->getPost('hp');
        $nama_perusahaan = $this->request->getPost('nama_perusahaan');
        $nama_usaha = $this->request->getPost('nama_usaha');
        $alamat_usaha = $this->request->getPost('alamat_usaha');
        $kelurahan = $this->request->getPost('kelurahan');
        $kecamatan = $this->request->getPost('kecamatan');
        $kota = $this->request->getPost('kota');
        $telp = $this->request->getPost('telp');
        $email = $this->request->getPost('email');
        $jenis_usaha = $this->request->getPost('jenis_usaha');
        $luas_bangunan = $this->request->getPost('luas_bangunan');
        $luas_lahan = $this->request->getPost('luas_lahan');
        $status_lahan = $this->request->getPost('status_lahan');
        $dokumen_spl = $this->request->getPost('dokumen_spl');
        // echo $ktp;
        $register_no = $this->request->getPost('no_register');
        $data=[
            'registrasi_id' => $register_no,
            'ktp' => $ktp,
            'nama' => $nama,
            'date' => date('Y-m-d'),
            'jabatan' => $jabatan,
            'hp' => $hp,
            'nama_perusahaan' => $nama_perusahaan,
            'nama_usaha' => $nama_usaha,
            'alamat' => $alamat_usaha,
            'kelurahan' => $kelurahan,
            'kecamatan' => $kecamatan,
            'kota' => $kota,
            'telp' => $telp,
            'email' => $email,
            'jenis_usaha' => $jenis_usaha,
            'luas_bangunan' => $luas_bangunan,
            'luas_lahan' => $luas_lahan,
            'status_lahan' => $status_lahan,
            'dokumen_spl' => $dokumen_spl,
            'user_id' => '-',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $query = $this->db->table("registrasi_lab")->insert($data);
        
        if($query){
            $response = [
                'registrasi_id' => $register_no,
                'status' => 'success',
                'message' => 'Data berhasil ditambahkan'
            ];
        }else{
            $response = [
                'registrasi_id' => '',
                'status' => 'error',
                'message' => 'Data gagal ditambahkan'
            ];
        }
        echo json_encode($response);
    }

    public function insert_detail_registrasilab()
    {
        date_default_timezone_set('Asia/Jakarta');
        // $registrasi_id = $_POST['id_registrasi'];
        $jenis = $this->request->getPost('jenis');
        $nomor_terbit = $this->request->getPost('nomor_terbit');
        $pemberi_izin = $this->request->getPost('pemberi_izin');
        $keterangan = $this->request->getPost('keterangan');        
        $filename = $_FILES['file_berkas'];
        $randomFileName = rand(1, 1000000);
        $ext = pathinfo($filename['name'], PATHINFO_EXTENSION);
        $fileNameRand = $randomFileName . '.' . $ext;
        move_uploaded_file($filename['tmp_name'], 'upload/'. $fileNameRand);
        $no_register = $this->request->getPost('no_register');
        $data=[
            'registrasi_id' => $no_register,
            'date' => date('Y-m-d'),
            'jenis' => $jenis,
            'nomor_terbit' => $nomor_terbit,
            'pemberi_izin' => $pemberi_izin,
            'keterangan' => $keterangan,
            'file_berkas' => $fileNameRand,
            'user_id' => '-',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->table('registrasi_lab_detail')->insert($data);
    }

    public function validasi_perusahaan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_registrasi = $this->request->getPost('id_register');
        $password = $this->request->getPost('password');
        $query1 = $this->db->table('registrasi_lab')->where('registrasi_id', $id_registrasi)->get()->getRowObject();        
        $data1 = [
            'fullname' => $query1->nama,
            'username' => $id_registrasi,
            'email' => $query1->email,
            'password' => md5($password),
            'level' => 'perusahaan',
            'inititated' => $query1->nama_usaha,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $data2 = [
            'username' => $id_registrasi,
            'password' => $password,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $query1 = $this->db->table('cdpm_users')->insert($data1);
        $query2 = $this->db->table('update_password')->insert($data2);
        if($query1 && $query2){
            $response  = [
                'status' => 'success',
                'msg' => 'Berhasil Divalidasi !',
            ];
        }else{
            $response  = [
                'status' => 'error',
                'msg' => 'Berhasil Gagal Divalidasi !',
            ];
        }
        return json_encode($response);
    }

    public function detail_dokumen_registrasilab()
    {
        $registrasi_id = $this->request->getPost('id_registrasi');
        // echo $registrasi_id;
        $query = $this->db->table('registrasi_lab_detail')->where('registrasi_id', $registrasi_id)->get()->getResultObject();
        $data = array();
        foreach ($query as $row) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    public function delete_register()
    {
        $id_register = $this->request->getPost('id_register');
        $data = $this->db->table('registrasi_lab_detail')->where('registrasi_id', $id_register)->get()->getResultObject();
        foreach($data as $row){
            unlink('upload/'. $row->file_berkas);
        }
        $query1 = $this->db->table('registrasi_lab_detail')->where('registrasi_id', $id_register)->delete();
        $query2 = $this->db->table('registrasi_lab')->where('registrasi_id', $id_register)->delete();
        if ($query1 && $query2){
            $response = [
                'status' => 'success',
            ];
        }else{
            $response = [
                'status' => 'error',
            ];
        }
        return json_encode($response);
    }




}