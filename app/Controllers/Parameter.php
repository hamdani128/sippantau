<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUsers;
use Config\Database;

class Parameter extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        
    }

    public function insert_parameter()
    {
        date_default_timezone_set('Asia/Jakarta');
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $nama_parameter = $this->request->getPost('nama_parameter');
        $satuan = $this->request->getPost('satuan');
        $user_id = $UserInfo['id'];
        $jenis_limbah = $this->request->getPost('jenis_limbah');

        $data = [
            'parameter' => $nama_parameter,
            'satuan' => $satuan,
            'jenis_limbah' => $jenis_limbah,
            'user_id' => $user_id,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s')
        ];
        $query = $this->db->table('parameter_limbah')->insert($data);
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

    public function edit_show_parameter()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id = $this->request->getPost('id');
        $query = $this->db->table('parameter_limbah')->where('id', $id)->get()->getRowObject();
        $data['parameter'] = $query->parameter;
        $data['satuan'] = $query->satuan;
        $data['jenis_limbah'] = $query->jenis_limbah;
        echo json_encode($data);
    }

    public function update_parameter()
    {
        date_default_timezone_set('Asia/Jakarta');
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $id = $this->request->getPost('id');
        $nama_parameter = $this->request->getPost('nama_parameter');
        $satuan = $this->request->getPost('satuan');
        $user_id = $UserInfo['id'];
        $jenis_limbah = $this->request->getPost('jenis_limbah');
        $data = [
            'parameter' => $nama_parameter,
            'satuan' => $satuan,
            'jenis_limbah' => $jenis_limbah,
            'user_id' => $user_id,
            'updated_at' => date('y-m-d H:i:s')
        ];

        $query = $this->db->table('parameter_limbah')->where('id', $id)->update($data);
        if ($query){
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil diubah'
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Data gagal diubah'
            ];
        }
        echo json_encode($response);
    }

    public function delete_parameter()
    {
        $id = $this->request->getPost('id');
        $query = $this->db->table('parameter_limbah')->where('id', $id)->delete();
        if ($query){
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Data gagal dihapus'
            ];
        }
        echo json_encode($response);
    }




}