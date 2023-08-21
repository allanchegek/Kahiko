<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\APIModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login.php');
    }
    public function login()
    {
        //fetch the email and password from POST data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        //TODO Handle the login backend functionality
        $userModel = new UserModel();
        $result = $userModel->checkCreds($email, $password);

        try {
            if (count($result) > 0) {
                $name = $result['first_name'];
                $userid = $result['user_id'];
                $userdata = [
                    'name' => $name,
                    'userid' => $userid
                ];
                $session = session();
                $session->set($userdata);
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo 3;
        }
    }
    public function APILogin()
    {
        $username = $this->request->getPost('username');
        $key = $this->request->getPost('key');
        $model = new APIModel();
        $result = $model->auth($username, $key);

        try {
            if (count($result) > 0) {
                $name = $result['username'];
                $apiuserid = $result['apiuser_id'];
                $token = $model->getToken($apiuserid);
                $apiuserdata = [
                    'api-user' => $name,
                    'token' => $token[0]->api_token
                ];
                $session = session();
                $session->set($apiuserdata);
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function Adminlogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $userModel = new UserModel();
        $result = $userModel->checkAdminCreds($email, $password);

        try {
            if (count($result) > 0) {
                $name = $result['first_name'];
                $userid = $result['user_id'];
                $userdata = [
                    'admin' => $name,
                    'userid' => $userid
                ];
                $session = session();
                $session->set($userdata);
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo 3;
        }
    }
    public function register()
    {
        //loads the Registration page
        return view('auth/register.php');
    }
    public function apiReg()
    {


        $username = $this->request->getPost('username');
        $key = $this->request->getPost('key');


        $handler = new APIModel();

        $result = $handler->addapiUser($username, $key);
        if ($result) {
            echo 1;
        } else {
            echo 2;
        }


        return $result;
    }
    public function processRegistration()
    {
        //TODO Handle the registration backedn functionality

        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $gender = $this->request->getPost('gender');

        $handler = new UserModel();

        $result = $handler->addUser($firstname, $lastname, $email, $password, $gender);

        if ($result) {
            echo 1;
        } else {
            echo 2;
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();

        return 1;
    }
}
