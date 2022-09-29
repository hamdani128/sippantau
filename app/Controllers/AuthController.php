<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUsers;

class AuthController extends BaseController
{

    public function index()
    {
        return view('auth/login');
    }

    public function check_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $UserModel = new ModelUsers();
        $UserInfo = $UserModel->where('username', $username)->first();
        $checkPassword = md5($password);
        if ($checkPassword == $UserInfo['password']){
            $userid = $UserInfo['id'];
            session()->set('loggedUser', $userid);
            $response = [
                'status' => 'success',
                'message' => 'You are logged in'
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Your Logged Failed !'
            ];
        }
        return json_encode($response);
    }

    public function logout()
    {
        helper(['url', 'form']);
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            return redirect()->to('/auth/login')->with('logout', 'You Are logged Out');
        }

    }


}