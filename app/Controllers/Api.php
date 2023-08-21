<?php

namespace App\Controllers;

use App\Models\APIModel;

class Api extends BaseController
{
    function index()
    {
        return view('API/api_home');
    }

    function tokenValidation($token)
    {
        $model = new APIModel();

        $result = $model->tokenValidation($token);

        return $result;
    }
    function usersList()
    {
        $model = new APIModel();
        $token = $this->request->getVar('token');


        if ($this->tokenValidation($token)) {
            $result = $model->fetchUsersList($token);
        } else {
            $result = 'Token is Invalid or does not exist';
        }

        return $this->response->setJson($result);
    }
    function usersListEmail()
    {
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $model = new APIModel();

        if ($this->tokenValidation($token)) {
            $result = $model->fetchUsersListEmail($email);
        } else {
            $result = 'Token is Invalid or does not exist';
        }
        return $this->response->setJson($result);
    }
    function usersListGender()
    {
        $gender = $this->request->getVar('gender');
        $token = $this->request->getVar('token');
        $model = new APIModel();

        if ($this->tokenValidation($token)) {

            $result = $model->fetchUsersListGender($gender);
        } else {
            $result = 'Token is Invalid or does not exist';
        }

        return $this->response->setJson($result);
    }
    function usersListItemBought()
    {
        $item_id = $this->request->getVar('gender');
        $token = $this->request->getVar('token');
        $model = new APIModel();
        if ($this->tokenValidation($token)) {

            $result = $model->fetchUsersListGender($item_id);
        } else {
            $result = 'Token is Invalid or does not exist';
        }

        return $this->response->setJson($result);
    }
    function usersListAge()
    {
        $model = new APIModel();
        $token = $this->request->getVar('token');

        if ($this->tokenValidation($token)) {

            $result = $model->fetchUsersListAge();
        } else {
            $result = 'Token is Invalid or does not exist';
        }

        return $this->response->setJson($result);
    }
    function productList()
    {
        $model = new APIModel();

        $result = $model->fetchProductList();

        return $this->response->setJson($result);
    }
    function productListID()
    {
        $id = $this->request->getVar('id');
        $model = new APIModel();

        $result = $model->fetchProductListbyAdder($id);

        return $this->response->setJson($result);
    }
    function productListCAT()
    {
        $category = $this->request->getVar('category');
        $model = new APIModel();

        $result = $model->fetchProductListbyCategory($category);

        return $this->response->setJson($result);
    }
}
