<?php

namespace App\Models;

use CodeIgniter\Model;

class APIModel extends Model
{

    function auth($username, $key)
    {

        $db = db_connect();

        $result = $db->query("SELECT* FROM tbl_apiusers WHERE username='$username' AND user_key='$key'");

        $row = $result->getRowArray();

        return $row;
    }

    function addapiUser($username, $key)
    {

        $db = db_connect();

        $result = $db->query("INSERT INTO tbl_apiusers (username,user_key)VALUES('$username','$key')");

        return $result;
    }


    function tokenValidation($token)
    {
        $db = db_connect();

        $valid = $db->query("SELECT * FROM tbl_apitokens WHERE api_token='$token'");

        $row = $valid->getRowArray();

        try {
            if (count($row) > 1) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }
    function getToken($apiuserid)
    {
        $db = db_connect();

        $result = $db->query("SELECT * FROM tbl_apitokens WHERE api_userid ='$apiuserid'");

        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $generated_token = substr(
            str_shuffle($str_result),
            0,
            16
        );

        if (count($result->getResultArray()) < 1) {
            $result = $db->query("INSERT INTO tbl_apitokens (api_userid,api_token)VALUES('$apiuserid','$generated_token')");
            $result = $db->query("SELECT * FROM tbl_apitokens WHERE api_userid ='$apiuserid'");
            return $result->getFirstRow();
        } else {
            return $result->getResult();
        }
    }
    function fetchUsersList()
    {

        $db = db_connect();

        $result = $db->query("SELECT * FROM tbl_users");

        return $result->getResult();
    }
    function fetchUsersListEmail($email)
    {
        $db = db_connect();
        $result = $db->query("SELECT * FROM tbl_users WHERE email='$email'");

        return $result->getResult();
    }
    function fetchUsersListGender($gender)
    {
        $db = db_connect();

        $result = $db->query("SELECT * FROM tbl_users WHERE gender='$gender'");

        return $result->getResult();
    }

    function fetchUsersListAge()
    {
        $db = db_connect();

        $result = $db->query("SELECT * FROM tbl_users  ORDER BY age DESC");

        return $result->getResult();
    }
    function fetchProductList()
    {
        $db = db_connect();

        $result = $db->query("SELECT * FROM tbl_products");

        return $result->getResult();
    }
    function fetchProductListbyAdder($id)
    {
        $db = db_connect();

        $result = $db->query("SELECT * FROM tbl_products  WHERE added_by ='$id'");

        return $result->getResult();
    }
    function fetchProductListbyCategory($category)
    {
        $db = db_connect();

        $result = $db->query("SELECT * FROM tbl_products WHERE subcategory_id ='$category'");

        return $result->getResult();
    }
}
