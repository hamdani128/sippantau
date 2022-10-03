<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLimbah;
use App\Models\ModelUsers;
use CodeIgniter\Database\Config;

class Master1 extends BaseController
{

    private $db;
    private $limbah;
    public function __construct()
    {
        $this->db = Config::connect();
        $this->limbah = new ModelLimbah();
    }
    public function index()
    {
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $register = $this->db->table('registrasi_lab')->get()->getResultObject();
        $data = [
            'title' => 'Register - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'admin-registerlab',
            'registrasi' => $register,
        ];
        // var_dump($register);
        return view('pages/master/info_registrasi', $data);
    }
    
    public function master_users()
    {
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $user_perusahaan = $userModel->where('level', 'perusahaan')->findAll();
        $data = [
            'title' => 'Master Register - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'master_user-registerlab',
            'user_perusahaan' => $user_perusahaan,
        ];
        return view('pages/master/master_user', $data);
    }

    public function parameter()
    {
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $parameter = $this->db->table('parameter_limbah')->get()->getResultObject();
        $data = [
            'title' => 'Parameter - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'admin-registerlab',
            'parameter' => $parameter,
        ];
        // var_dump($register);
        return view('pages/master/parameter', $data);
    }
    
    public function metoda()
    {
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $metoda = $this->db->table('metoda')->get()->getResultObject();
        $data = [
            'title' => 'Metoda - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'admin-registerlab',
            'metoda' => $metoda,
        ];
        // var_dump($register);
        return view('pages/master/metoda', $data);
    }

    public function cetak_dokumen($id_registrasi)
    {
        $data_registri = $this->db->table("registrasi_lab")->where("registrasi_id", $id_registrasi)->get()->getRowObject();
        $dataregistri_detail = $this->db->table("registrasi_lab_detail")->where("registrasi_id", $id_registrasi)->get()->getResultObject();
        $data = [
            'registri_id' => $data_registri,
            'registri_detail' => $dataregistri_detail,
        ];
        return view('print/print_register', $data);
    }

    public function limbah_air_domestik()
    {   
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $parameter = $this->db->table('parameter_limbah')->where('jenis_limbah', 'Limbah Kualitas Air')->get()->getResultObject();
        $metoda = $this->db->table('metoda')->get()->getResultObject();
        $limbah = $this->db->table('limbah_air_domestik')->where('user_id', $UserInfo['id'])->get()->getResultObject();
        // $detail_limbah = $this->db->table('limbah_air_domestik_detail')->where('user_id', $UserInfo['id'])->get()->getResultObject();
        $data = [
            'title' => 'Limbah Air Domestik - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'admin-limbah_air_domestik',
            'parameter' => $parameter,
            'metoda' => $metoda,
            'limbah' => $limbah,
        ];
        return view('pages/limbah/limbah_domestik', $data);
    }

    public function limbah_air_kegiatan()
    {
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $limbah = $this->db->table('limbah_air_kegiatan')->get()->getResultObject();
        $parameter = $this->db->table('parameter_limbah')->where('jenis_limbah', 'Limbah Kualitas Air')->get()->getResultObject();
        $metoda = $this->db->table('metoda')->get()->getResultObject();
        $data = [
            'title' => 'Limbah Air Kegiatan - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'admin-limbah_air_kegiatan',
            'limbah' => $limbah,
            'parameter' => $parameter,
            'metoda' => $metoda,
        ];
        return view('pages/limbah/limbah_air_kegiatan', $data);
    }

    public function limbah_emisi_udara()
    {
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $limbah = $this->db->table('limbah_udara')->get()->getResultObject();
        $parameter = $this->db->table('parameter_limbah')->where('jenis_limbah', 'Limbah Emisi Udara')->get()->getResultObject();
        $metoda = $this->db->table('metoda')->get()->getResultObject();
        $data = [
            'title' => 'Limbah Emisi Udara - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'admin-limbah_emisi_udara',
            'limbah' => $limbah,
            'parameter' => $parameter,
            'metoda' => $metoda,
        ];
        return view('pages/limbah/limbah_emisi_udara', $data);
    }

    public function limbah_b3()
    {
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $limbah = $this->db->table('limbah_b3')->get()->getResultObject();
        $parameter = $this->db->table('parameter_limbah')->get()->getResultObject();
        $metoda = $this->db->table('metoda')->get()->getResultObject();
        $data = [
            'title' => 'Limbah B3 - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'admin-limbah_b3',
            'limbah' => $limbah,
            'parameter' => $parameter,
            'metoda' => $metoda,
            'id_registrasi' => $this->limbah->getIDRegisterLimbahB3(),
        ];
        return view('pages/limbah/limbah_b3', $data);
    }

    public function limbah_air_kegiatan_admin()
    {
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $data = [
            'title' => 'Limbah Air Kegiatan Admin - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'admin-limbah_air_kegiatan',
            
        ];
        return view('pages/admin_limbah/limbah_air_kegiatan', $data);
    }

    public function limbah_emisi_udara_admin()
    {
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $data = [
            'title' => 'Limbah Emisi Udara Admin - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'admin-limbah_emisi_udara',
            
        ];
        return view('pages/admin_limbah/limbah_emisi_udara', $data);
    }

    public function limbah_b3_admin()
    {
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $data = [
            'title' => 'Limbah B3 - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'admin-limbah_b3',
            
        ];
        return view('pages/admin_limbah/limbah_emisi_udara', $data);
    }

    public function limbah_air_domestik_admin()
    {
        $userModel = new ModelUsers();  
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $data = [
            'title' => 'Limbah Air Domestik - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'admin-limbah_domestik',
            
        ];
        return view('pages/admin_limbah/limbah_domestik', $data);
    }

    
    public function limbah_b3_print($id_registrasi)
    {   
        $limbah = $this->db->table('limbah_b3')->where('id_register', $id_registrasi)->get()->getRowObject();
        $detail_limbah = $this->db->table('limbah_b3_detail')->where('id_register', $id_registrasi)->get()->getResultObject();
        $data = [
            'limbah_b3' => $detail_limbah,
            'limbah' => $limbah,
        ];
        return view('/print/print_limbahb3', $data);
    }

    public function limbah_air_domestik_print($register_id)
    {
        $limbah = $this->db->table('limbah_air_domestik')->where('register_id', $register_id)->get()->getRowObject();
        $limbah_detail = $this->db->table('limbah_air_domestik_detail')->where('register_id', $register_id)->get()->getResultObject();
        $data = [
            'limbah' => $limbah,
            'detail_limbah' => $limbah_detail,
        ];
        return view('/print/print_limbah_air_domestik', $data);
    }

}