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


    public function filter_limbah_air_domestik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $mulai = $this->request->getPost('mulai');
        $sampai = $this->request->getPost('sampai');
        // $sampai = $decode['sampai'];
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
                    a.file_name as file_name,
                    a.tindakan as tindakan,
                    a.status as status
                    FROM limbah_air_domestik a 
                    LEFT JOIN cdpm_users b ON a.user_id = b.id
                    WHERE DATE(a.created_at) BETWEEN '" . $mulai . "' AND '" . $sampai . "'" ;
        $query = $this->db->query($SQL)->getResultObject();
        if(count($query) > 0){
            foreach ($query as  $row) {
                $output[] = $row;
            }
        }else{
            $output['empty'] = ['empty'];
        }
        return json_encode($output);   
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
                    a.file_name as file_name,
                    a.tindakan as tindakan,
                    a.status as status
                    FROM limbah_air_kegiatan a 
                    LEFT JOIN cdpm_users b ON a.user_id = b.id
                    WHERE DATE(a.created_at) BETWEEN '" . $mulai . "' AND '" . $sampai . "'" ;
        $query = $this->db->query($SQL)->getResultObject();
        if(count($query) > 0){
            foreach ($query as  $row) {
                $output[] = $row;
            }
        }else{
            $output['empty'] = ['empty'];
        }
        return json_encode($output);
    }

    public function filter_limbah_emisi_udara()
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
                    a.file_name as file_name,
                    a.tindakan as tindakan,
                    a.status as status
                    FROM limbah_udara a 
                    LEFT JOIN cdpm_users b ON a.user_id = b.id
                    WHERE DATE(a.created_at) BETWEEN '" . $mulai . "' AND '" . $sampai . "'";
        $query = $this->db->query($SQL)->getResultObject();
        if(count($query) > 0){
            foreach ($query as  $row) {
                $output[] = $row;
            }
        }else{
            $output['empty'] = ['empty'];
        }
        return json_encode($output);   
    }

    public function filter_limbah_b3()
    {
        date_default_timezone_set('Asia/Jakarta');
        $mulai = $this->request->getPost('mulai');
        $sampai = $this->request->getPost('sampai');
        $SQL = "SELECT 
                    a.id as id,
                    b.username as username,
                    a.id_register as id_register,
                    a.date as date,
                    a.nama_perusahaan as nama_perusahaan,
                    a.bidang as bidang,
                    a.periode as periode,
                    a.file_name as file_name,
                    a.tindakan as tindakan,
                    a.created_at as created_at,
                    a.status as status
                    FROM limbah_b3 a 
                    LEFT JOIN cdpm_users b ON a.user_id = b.id
                    WHERE DATE(a.created_at) BETWEEN '" . $mulai . "' AND '" . $sampai . "'";
        $query = $this->db->query($SQL)->getResultObject();
        if(count($query) > 0){
            foreach ($query as  $row) {
                $output[] = $row;
            }
        }else{
            $output[''] = null;
        }
        return json_encode($output);
    }


}