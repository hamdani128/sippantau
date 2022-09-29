<?php

namespace App\Models;

use CodeIgniter\Database\Database as DatabaseDatabase;
use CodeIgniter\Model;
use Config\Database;

class ModelLimbah extends Model
{

        public function getIDRegisterLimbahAir()
        {   
            $db = Database::connect();
            $userModel = new ModelUsers();
            $loggedUserID = session()->get('loggedUser');
            $UserInfo = $userModel->find($loggedUserID);
            $id_user = $UserInfo['id'];
            $SQL = "SELECT MAX(RIGHT(register_id,5)) AS register_id FROM limbah_air_kegiatan WHERE user_id = '" . $id_user . "'";
            $result = $db->query($SQL)->getRowObject();
            $id_register = $result->register_id;
            if ($id_register == null) {
                $id_register =  "LAK". $id_user .date('Ymd') . "00001";
            } else {
                $id_register = "LAK" . $id_user . date('Ymd') . str_pad($id_register + 1, 5, '0', STR_PAD_LEFT);
            }
            return $id_register;
        }

        public function getIDRegisterLimbahUdara()
        {   
            $db = Database::connect();
            $userModel = new ModelUsers();
            $loggedUserID = session()->get('loggedUser');
            $UserInfo = $userModel->find($loggedUserID);
            $id_user = $UserInfo['id'];
            $SQL = "SELECT MAX(RIGHT(register_id,5)) AS register_id FROM limbah_udara WHERE user_id = '" . $id_user . "'";
            $result = $db->query($SQL)->getRowObject();
            $id_register = $result->register_id;
            if ($id_register == null) {
                $id_register =  "LEU". $id_user .date('Ymd') . "00001";
            } else {
                $id_register = "LEU" . $id_user . date('Ymd') . str_pad($id_register + 1, 5, '0', STR_PAD_LEFT);
            }
            return $id_register;
        }

        public function getIDRegisterLimbahB3()
        {
            $db = Database::connect();
            $userModel = new ModelUsers();
            $loggedUserID = session()->get('loggedUser');
            $UserInfo = $userModel->find($loggedUserID);
            $id_user = $UserInfo['id'];
            $SQL = "SELECT MAX(RIGHT(id_register,5)) AS register_id FROM limbah_b3 WHERE user_id = '" . $id_user . "'";
            $result = $db->query($SQL)->getRowObject();
            $id_register = $result->register_id;
            if ($id_register == null) {
                $id_register =  "LMB". $id_user .date('Ymd') . "00001";
            } else {
                $id_register = "LMB" . $id_user . date('Ymd') . str_pad($id_register + 1, 5, '0', STR_PAD_LEFT);
            }
            return $id_register;
        }

        public function getIDRegisterLimbahDomestik()
        {
            $db = Database::connect();
            $userModel = new ModelUsers();
            $loggedUserID = session()->get('loggedUser');
            $UserInfo = $userModel->find($loggedUserID);
            $id_user = $UserInfo['id'];
            $SQL = "SELECT MAX(RIGHT(register_id,5)) AS register_id FROM limbah_air_domestik WHERE user_id = '" . $id_user . "'";
            $result = $db->query($SQL)->getRowObject();
            $id_register = $result->register_id;
            if ($id_register == null) {
                $id_register =  "LDA". $id_user .date('Ymd') . "00001";
            } else {
                $id_register = "LDA" . $id_user . date('Ymd') . str_pad($id_register + 1, 5, '0', STR_PAD_LEFT);
            }
            return $id_register;
        }



}