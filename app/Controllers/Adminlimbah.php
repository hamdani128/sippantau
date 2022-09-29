<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Adminlimbah extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        
    }

    public function filter_limbah_air_kegiatan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $mulai = $this->request->getPost('mulai');
        $sampai = $this->request->getPost('sampai');
        $SQL = "SELECT 
                    a.id as id,
                    b.username as username,
                    a.register_id as register_id,
                    a.no_sertifikat as sertifikat,
                    a.nama_pemohon as nama_pemohon,
                    a.alamat_pemohon as alamat_pemohon,
                    a.lokasi_kegiatan as lokasi_kegiatan,
                    a.contoh_uji as contoh_uji,
                    a.tanggal_contoh_uji as tanggal_contoh_uji,
                    a.titik_uji as titik_uji,
                    a.status as status
                    FROM limbah_air_kegiatan a 
                    LEFT JOIN cdpm_users b ON a.user_id = b.id
                    WHERE a.created_at BETWEEN '" . $mulai . "' AND '" . $sampai . "'" ;
        $query = $this->db->query($SQL)->getResultObject();
        foreach ($query as  $row) {
            $data[] = [
                'id' => $row->id,
                'username' => $row->username,
                'register_id' => $row->register_id,
                'sertifikat' => $row->sertifikat,
                'nama_pemohon' => $row->nama_pemohon,
                'alamat_pemohon' => $row->alamat_pemohon,
                'lokasi_kegiatan' => $row->lokasi_kegiatan,
                'contoh_uji' => $row->contoh_uji,
                'tanggal_contoh_uji' => $row->tanggal_contoh_uji,
                'titik_uji' => $row->titik_uji,
                'status' => $row->status,
            ];
        }
        return json_encode($data);
    }

    public function filter_limbah_emisi_udara()
    {
        date_default_timezone_set('Asia/Jakarta');
        $mulai = $this->request->getPost('mulai');
        $sampai = $this->request->getPost('sampai');
        $SQL = " SELECT 
                a.id as id,
                b.username as username,
                a.register_id as register_id,
                a.no_sertifikat as sertifikat,
                a.nama_pemohon as nama_pemohon,
                a.alamat_pemohon as alamat_pemohon,
                a.lokasi_kegiatan as lokasi_kegiatan,
                a.contoh_uji as contoh_uji,
                a.tanggal_contoh_uji as tanggal_contoh_uji,
                a.titik_uji as titik_uji,
                a.status as status
                FROM limbah_udara a 
            LEFT JOIN cdpm_users b ON a.user_id = b.id
            WHERE a.created_at BETWEEN '" . $mulai . "' AND '" . $sampai . "'";
        $query = $this->db->query($SQL)->getResultObject();
        foreach ($query as  $row) {
            $data[] = [
                'id' => $row->id,
                'username' => $row->username,
                'register_id' => $row->register_id,
                'sertifikat' => $row->sertifikat,
                'nama_pemohon' => $row->nama_pemohon,
                'alamat_pemohon' => $row->alamat_pemohon,
                'lokasi_kegiatan' => $row->lokasi_kegiatan,
                'contoh_uji' => $row->contoh_uji,
                'tanggal_contoh_uji' => $row->tanggal_contoh_uji,
                'titik_uji' => $row->titik_uji,
                'status' => $row->status,
            ];
        }
        return json_encode($data);    
    }


}