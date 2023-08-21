<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
	public function fetchCart($userid)
	{

		$db = db_connect();

		$result = $db->query("SELECT *
        FROM tbl_products
        WHERE product_id IN (SELECT product_id FROM tbl_cart WHERE user_id='$userid');");

		return $result->getResult();
	}
	public function removeItem($userid, $product_id)
	{

		$db = db_connect();

		$result = $db->query("DELETE FROM tbl_cart WHERE user_id='$userid' AND product_id='$product_id'");

		return $result;
	}
	public function fetchAllProducts()
	{
		$db = db_connect();

		$status = $db->query("SELECT * FROM tbl_products");

		return $status->getResultArray();
	}
	public function getProduct($id)
	{
		$db = db_connect();

		$status = $db->query("SELECT * FROM tbl_products WHERE product_id=$id");

		return $status->getResultArray();
	}
	public function fetchFilteredProducts($modifier)
	{
		$db = db_connect();


		$status = $db->query("SELECT * FROM tbl_products WHERE gender ='$modifier'");

		return $status->getResultArray();
	}
	public function displayCategories()
	{
		$db = db_connect();

		$status = $db->query("SELECT * FROM tbl_categories");

		return $status->getResultArray();
	}
	public function updateCategory($category_id, $category_name)
	{
		$db = db_connect();
		$status = $db->query("UPDATE tbl_categories SET category_name='$category_name' WHERE category_id='$category_id'");
		return $status;
	}
	public function newCategory($category_name)
	{
		$db = db_connect();

		$status = $db->query("INSERT INTO tbl_categories (category_name)VALUES('$category_name')");

		return $status;
	}

	public function newProduct($productname, $productdescription, $productimage, $price, $availablequantity, $gender, $subcategoryid, $addedby)
	{
		$db = db_connect();


		$status = $db->query("INSERT INTO tbl_products (product_name,product_description,product_image,unit_price,available_quantity,gender,subcategory_id,added_by)VALUES('$productname','$productdescription','$productimage','$price','$availablequantity','$gender','$subcategoryid','$addedby')");

		return $status;
	}

	public function getCategory($category_id)
	{
		$db = db_connect();

		$query = "SELECT * FROM tbl_categories WHERE category_id = $category_id";
		$status = $db->query($query);

		return $status->getResultArray();
	}
	public function deleteCategory($id)
	{
		$db = db_connect();

		$query = "UPDATE tbl_categories SET is_deleted = 1  WHERE category_id = $id";
		$status = $db->query($query);

		return $query;
	}

	public function displaySubcategories()
	{
		$db = db_connect();

		$status = $db->query("SELECT * FROM tbl_subcategories");

		return $status->getResultArray();
	}
	public function getSubcategory($subcategory_id)
	{
		$db = db_connect();

		$status = $db->query("SELECT * FROM tbl_subcategories   WHERE subcategory_id = $subcategory_id");

		return $status->getResultArray();
	}

	public function deleteSubcategory($subcategory_id)
	{
		$db = db_connect();

		$status = $db->query("UPDATE tbl_subcategories SET is_deleted = 1   WHERE subcategory_id = $subcategory_id");

		return $status;
	}

	public function updateSubcategory($subcategory_id, $subcategory_name, $category_id)
	{
		$db = db_connect();

		$query = "UPDATE tbl_subcategories SET subcategory_name = '$subcategory_name', category = $category_id   WHERE subcategory_id = $subcategory_id";
		$status = $db->query($query);

		// echo $query;
		return $status;
	}

	public function newSubcategory($subcategory_name, $category_id)
	{
		$db = db_connect();

		$status = $db->query("INSERT INTO tbl_subcategories (subcategory_name, category, is_deleted)VALUES('$subcategory_name', '$category_id', 0)");

		return $status;
	}


	public function updateProduct($product_id, $product_name, $product_description, $product_image, $unit_price, $available_quantity, $gender, $subcategory_id)
	{
		$db = db_connect();
		$query = "UPDATE tbl_products SET product_name = '$product_name', product_description = '$product_description', product_image = '$product_image', unit_price = '$unit_price', available_quantity = '$available_quantity', gender = '$gender', subcategory_id = '$subcategory_id', updated_at = current_timestamp() WHERE product_id = $product_id";
		echo $query;
		$status = $db->query($query);

		return $status;
	}
	public function deleteProduct($id)
	{
		$db = db_connect();
		$status = $db->query("UPDATE tbl_products SET is_deleted = 1 WHERE product_id = $id");

		return $status;
	}
	public function fetchData()
	{
		$db = db_connect();

		$status = $db->query("SELECT * FROM tbl_products");

		return $status->getResultArray();
	}

	public function checkproduct($product, $customer)
	{
		$db = db_connect();

		$status = $db->query("SELECT * FROM tbl_cart WHERE product_id='$product' AND user_id='$customer'");
		$row = $status->getResultArray();

		if (count($row)) {
			return count($row);
		} else {
			return 'okay';
		}
	}
	public function order($product, $customer)

	{
		$db = db_connect();
		$status = $db->query("INSERT INTO tbl_cart (user_id,product_id)VALUES('$customer','$product')");
		return $status;
	}
	public function updateCartQuantity($order_number, $order_quantity)
	{
		$db = db_connect();
		$status = $db->query("UPDATE tbl_cart SET order_quantity='$order_quantity' WHERE order_number='$order_number'");
		return $status;
	}
	public function deleteCartitem($order_number)
	{
		$db = db_connect();
		$status = $db->query("DELETE FROM tbl_cart WHERE order_number='$order_number'");
		return $status;
	}


	public function postOrder($customer_id, $order_amount, $payment_type)
	{
		$time = 'current_timestamp()';
		$order_status = 'paid';
		$is_deleted = 0;

		$db = db_connect();

		$query = "INSERT INTO tbl_orders (customer_id, order_amount, order_status, created_at, payment_type, updated_at, is_deleted)VALUES($customer_id, $order_amount, '$order_status', $time, $payment_type, $time, $is_deleted)";
		$status = $db->query($query);
		$product_id = $db->query("SELECT order_id FROM tbl_orders WHERE customer_id = $customer_id ORDER BY order_id DESC LIMIT 1;");
		$row = $product_id->getResultArray();
		return $row;
	}
	public function postOrderDetails($query)
	{
		$db = db_connect();
		$query = "INSERT INTO tbl_orderdetails (order_id, product_id, product_price, order_quantity, orderdetails_total, created_at, updated_at, is_deleted) VALUES $query";
		$status = $db->query($query);
		return $query;
	}
	public function clearCart($user_id)
	{
		$db = db_connect();
		$query = "DELETE  FROM tbl_cart WHERE user_id='$user_id'";
		$status = $db->query($query);

		return $status;
	}

	public function displayPurchases($customer_id)
	{
		$db = db_connect();
		$query = "SELECT * FROM tbl_purchases WHERE user_id = $customer_id";
		$status = $db->query($query);


		return $status->getResultArray();
	}

	public function displayOrderdetails($order_id)
	{

		$db = db_connect();
		$query = "SELECT tbl_products.product_name,tbl_products.product_description,tbl_orderdetails.* FROM tbl_products RIGHT JOIN tbl_orderdetails ON tbl_products.product_id = tbl_orderdetails.product_id WHERE tbl_orderdetails.order_id = $order_id";
		$status = $db->query($query);


		return $status->getResultArray();
	}
	function recordPurchase($userid, $product_name, $unit_price)
	{
		$db = db_connect();

		$query1 = ("INSERT INTO tbl_purchases(user_id,product_name,unit_price)VALUES('$userid','$product_name','$unit_price')");

		$query2 = ("DELETE FROM tbl_cart WHERE user_id='$userid'");

		$result = $db->query($query1);

		if ($result) {
			$delete = $db->query($query2);
			return $delete;
		} else {
			return 'Error';
		}
	}
}
