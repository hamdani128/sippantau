<?php

namespace App\Controllers;

use App\Models\ModelUsers;
use CodeIgniter\Database\Config;

class Home extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = Config::connect();
    }
    public function index()
    {   
        $userModel = new ModelUsers();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $data = [
            'title' => 'Home - Sippantau App',
            'userinfo' => $UserInfo,
            'page' => 'Home'
        ];
        return view('home/home', $data);
    }
}