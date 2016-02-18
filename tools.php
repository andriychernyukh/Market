<?php

include_once 'connect.php';

interface IValidator {

    public function validate($post);
}

class ProductValidator implements IValidator {

    public function validate($data) {
        $res = array(
            'fieldsErrors' => array(),
            'isValid' => true,
            'data' => $data,
        );
        //validate Title
        if (empty($data['title'])) {
            $res['fieldsErrors']['title'] = array('errorMsg' => "Title is required");
            $res['isValid'] = false;
        } else {
            $res['data']['title'] = htmlspecialchars(stripslashes(trim($data['title'])));
        }
        //validate Price
        if (empty($data['price'])) {
            $res['fieldsErrors']['price'] = array('errorMsg' => "Price is required");
            $res['isValid'] = false;
        }elseif (!is_numeric($data['price'])) {
            $res['fieldsErrors']['price'] = array('errorMsg' => "Price must be a float");
            $res['isValid'] = false;
        } 
        else{
            $res['data']['price'] = htmlspecialchars(stripslashes(trim($data['price'])));
        }
        //validate Quantity
        if ($data['quantity']==='') {
            $res['fieldsErrors']['quantity'] = array('errorMsg' => "Quantity is required");
            $res['isValid'] = false;
        }elseif (!ctype_digit($data['quantity'])) {
            $res['fieldsErrors']['quantity'] = array('errorMsg' => "Quantity must be a number and greate than 0");
            $res['isValid'] = false;
        } 
        else{
            $res['data']['quantity'] = htmlspecialchars(stripslashes(trim($data['quantity'])));
        }

        return $res;
    }

}

class Product {

    function findAll($connect) {
        $query = "SELECT * FROM product";
        $prodList = array();
        if ($result = $connect->query($query)) {
            while ($row = $result->fetch_object()) {
                $prodList[] = $row;
            }
            return $prodList;
        }
    }

    function findById($connect, $productId) {
        $query = "SELECT * FROM product WHERE id=$productId;";
        if ($result = $connect->query($query)) {
            $product = $result->fetch_object();
            return $product;
        } else {
            return NULL;
        }
    }

    function save($id, $postParams, $connect) {
        if (!empty($id)) {
            $query = "UPDATE product SET title='{$postParams['title']}', price={$postParams['price']}, quantity={$postParams['quantity']} WHERE id=$id;";
            $res = $connect->query($query);
        } else {
            $query = "INSERT INTO product(id, title, price, quantity) VALUES(NULL,'{$postParams['title']}',{$postParams['price']},{$postParams['quantity']})";
            $res = $connect->query($query);
        }
        return $res;
    }

    function delete($id, $connect) {
        $query = "DELETE FROM product WHERE id=$id;";
        $res = $connect->query($query);
        return $res;
    }

}

?>