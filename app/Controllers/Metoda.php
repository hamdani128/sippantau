<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Metoda extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        //
    }

    public function insert_metoda()
    {
        date_default_timezone_set('Asia/Jakarta');
        $metoda = $this->request->getPost('metoda');
        $data = [
            'metoda' => $metoda,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s')
        ];
        $query = $this->db->table('metoda')->insert($data);
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

    public function edit_show_metoda()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id = $this->request->getPost('id');
        $query = $this->db->table('metoda')->where('id', $id)->get()->getRowObject();
        $data['metoda'] = $query->metoda;
        echo json_encode($data);
    }

    public function update_metoda()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id = $this->request->getPost('id');
        $metoda = $this->request->getPost('metoda');
        $data = [
            // 'id' => $id,
            'metoda' => $metoda,
            'updated_at' => date('y-m-d H:i:s')
        ];
        $query = $this->db->table('metoda')->where('id', $id)->update($data);
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

    public function delete_metoda()
    {
        $id = $this->request->getPost('id');
        $query = $this->metoda->DeleteDataMetoda($id);
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