<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    function getWalletbalance($customer_id)
    {
        $db = db_connect();

        $res = $db->query("SELECT amount_available FROM tbl_wallet WHERE user_id=$customer_id");

        $row = $res->getRowArray();

        return $row;
    }

    public function checkCreds($email, $password)
    {
        $db = db_connect();

        $result = $db->query("SELECT* FROM tbl_users WHERE email='$email' AND password='$password'");

        $row = $result->getRowArray();

        return $row;
    }
    public function checkadmin($email, $password)
    {
        $db = db_connect();

        $result = $db->query("SELECT* FROM tbl_users WHERE email='$email' AND password='$password' AND role=3");

        $row = $result->getRowArray();

        return $row;
    }
    public function addUser($firstname, $lastname, $email, $password, $gender)
    {

        $db = db_connect();

        $role = 1;

        $result = $db->query("INSERT INTO tbl_users (first_name,last_name,email,password,gender,role)VALUES('$firstname','$lastname','$email','$password','$gender','$role')");

        return $result;
    }
    public function deleteUser($userid)
    {

        $db = db_connect();

        $dependant = $db->query("DELETE FROM tbl_wallet WHERE user_id='$userid'");

        if ($dependant) {
            $result = $db->query("DELETE FROM tbl_users WHERE user_id='$userid'");
            return $result;
        } else {
            return false;
        }
    }
    public function addAdmin($firstname, $lastname, $email, $password, $gender)
    {

        $db = db_connect();

        $role = 3;

        $result = $db->query("INSERT INTO tbl_users (first_name,last_name,email,password,gender,role)VALUES('$firstname','$lastname','$email','$password','$gender','$role')");

        return $result;
    }
    public function displayUsers()
    {
        $db = db_connect();

        $res = $db->query('SELECT * FROM tbl_users ORDER BY user_id DESC');
        return $res->getResultArray();
    }
    function getUser($userid)
    {
        $db = db_connect();

        $res = $db->query("SELECT * FROM tbl_users WHERE user_id='$userid'");
        return $res->getResult();
    }
    function updateWalletbalance($customer_id, $amount_available)
    {
        $db = db_connect();

        $res = $db->query("UPDATE tbl_wallet SET amount_available = $amount_available WHERE user_id=$customer_id");

        return $res;
    }
}
