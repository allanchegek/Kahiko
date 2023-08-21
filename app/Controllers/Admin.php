<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\UserModel;


class Admin extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->get('name') != null) {
            return view('Admin/admin');
        } else {
            return view('Admin/admin-login');
        }
    }
    public function customers()
    {
        $session = session();
        if ($session->get('name') != null) {
            return view('Admin/customers');
        } else {
            return view('Admin/admin-login');
        }
    }
    public function products()
    {
        $session = session();
        if ($session->get('name') != null) {
            return view('Admin/products');
        } else {
            return view('Admin/admin-login');
        }
    }
    public function dashboard()
    {
        $session = session();
        if ($session->get('name') != null) {
            return view('Admin/dashboard');
        } else {
            return view('Admin/admin-login');
        }
    }
    public function login()
    {
        return view('Admin/admin-login');
    }
    public function checkadminLogin()
    {

        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $login = new UserModel();

        $result = $login->checkadmin($email, $password);

        try {
            if (count($result) > 1) {
                echo 1;
                $username = $result['first_name'];
                $session->set('name', $username);
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        return view('Admin/admin-login');
    }
    public function displayCatalog()
    {

        $products = new ItemModel();
        $result['catalog'] = $products->fetchAllProducts();

        return $this->response->setJSON($result);
    }
    public function displayFilteredCatalog()
    {

        $products = new ItemModel();
        $modifier = $this->request->getPost('gender');
        $result['catalog'] = $products->displayfilteredCatalog($modifier);

        return $this->response->setJSON($result);
    }
    public function displayUsers()
    {
        $fetch = new UserModel();
        $result['userlist'] = $fetch->displayUsers();

        return $this->response->setJSON($result);
    }
    public function displayCategories()
    {
        $fetch = new ItemModel();
        $result['categories'] = $fetch->displayCategories();

        return $this->response->setJSON($result);
    }
    public function updateCategory()
    {
        $category_id = $this->request->getPost('category_id');
        $category_name = $this->request->getPost('category_name');
        $model = new ItemModel();
        $result = $model->updateCategory($category_id, $category_name);

        try {
            if ($result) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function getCategory()
    {
        $category_id = $this->request->getPost('category_id');
        $fetch = new ItemModel();
        $result['category'] = $fetch->getCategory($category_id);

        return $this->response->setJSON($result);
    }
    public function newCategories()
    {
        $categories = new ItemModel();
        $categoryname = $this->request->getPost('category_name');
        $result = $categories->newCategory($categoryname);

        try {
            if ($result) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function newProducts()
    {
        $product = new ItemModel();
        $productname = $this->request->getPost('product_name');
        $productdescription = $this->request->getPost('product_description');
        $productimage = $this->request->getPost('product_image');
        $price = $this->request->getPost('price');
        $availablequantity = $this->request->getPost('available_quantity');
        $gender = $this->request->getPost('product_gender');
        $subcategoryid = $this->request->getPost('subcategory_id');
        $addedby = $this->request->getPost('added_by');

        $result = $product->newProduct($productname, $productdescription, $productimage, $price, $availablequantity, $gender, $subcategoryid, $addedby);

        try {
            if ($result) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function deleteCategory()
    {
        $id = $this->request->getPost('category_id');
        $categories = new ItemModel();
        $result = $categories->deleteCategory($id);

        try {
            if ($result) {
                echo $result;
            } else {
                echo $result;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function deleteUser()
    {
        $id = $this->request->getPost('user_id');
        $users = new UserModel();
        $result = $users->deleteUser($id);

        try {
            if ($result) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function getProduct()
    {
        $id = $this->request->getPost('product_id');
        $product = new ItemModel();
        $result['product'] = $product->getProduct($id);

        return $this->response->setJSON($result);
    }
    public function updateProduct()
    {
        $product_id = $this->request->getPost('product_id');
        $product_name = $this->request->getPost('product_name');
        $product_description = $this->request->getPost('product_description');
        $product_image = $this->request->getPost('product_image');
        $unit_price = $this->request->getPost('unit_price');
        $available_quantity = $this->request->getPost('available_quantity');
        $gender = $this->request->getPost('gender');
        $subcategory_id = $this->request->getPost('subcategory_id');
        $product = new ItemModel();
        $status = $product->updateProduct($product_id, $product_name, $product_description, $product_image, $unit_price, $available_quantity, $gender, $subcategory_id);

        try {
            if ($status) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function deleteProduct()
    {
        $id = $this->request->getPost('product_id');
        $product = new ItemModel();
        $status = $product->deleteProduct($id);

        try {
            if ($status) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function newuser()
    {
        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $gender = $this->request->getPost('gender');
        $role = $this->request->getPost('role');

        $add = new UserModel();

        $result = $add->newuser($firstname, $lastname, $email, $password, $role, $gender);

        try {
            if ($result) {
                echo 1;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function displaySubcategories()
    {
        $model = new ItemModel();
        $result['subcategories'] = $model->displaySubcategories();

        return $this->response->setJSON($result);
    }
    public function getSubcategory()
    {
        $subcategory_id = $this->request->getPost('subcategory_id');
        $model = new ItemModel();
        $result['subcategory'] = $model->getSubcategory($subcategory_id);

        return $this->response->setJSON($result);
    }

    public function deleteSubcategory()
    {
        $subcategory_id = $this->request->getPost('subcategory_id');
        $model = new ItemModel();
        $status = $model->deleteSubcategory($subcategory_id);

        try {
            if ($status) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function updateSubcategory()
    {
        $subcategory_id = $this->request->getPost('subcategory_id');
        $subcategory_name = $this->request->getPost('subcategory_name');
        $category_id = $this->request->getPost('category_id');
        $model = new ItemModel();
        $status = $model->updateSubcategory($subcategory_id, $subcategory_name, $category_id);

        try {
            if ($status) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function newSubcategory()
    {
        $subcategory_name = $this->request->getPost('subcategory_name');
        $category_id = $this->request->getPost('category_id');
        $model = new ItemModel();
        $status = $model->newSubcategory($subcategory_name, $category_id);

        try {
            if ($status) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
