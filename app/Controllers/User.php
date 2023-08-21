<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function getUser()
    {
        $model = new UserModel();
        $id = $this->request->getPost('user_id');

        $result['records'] = $model->getUser($id);

        return $this->response->setJSON($result);
    }
    public function getWalletbalance()
    {
        $customer_id = $this->request->getPost('userid');
        $model = new UserModel();
        $result = $model->getWalletbalance($customer_id);

        return $this->response->setJSON($result);
    }
    public function updateWalletbalance()
    {
        $customer_id = $this->request->getPost('userid');
        $amount_available = $this->request->getPost('amount_available');

        $model = new UserModel();
        $result = $model->updateWalletbalance($customer_id, $amount_available);

        return $this->response->setJSON($result);
    }
}
