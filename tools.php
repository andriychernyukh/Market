<?php

include_once 'connect.php';

interface IValidator {

    public function validate($post);
}

class ProductValidator implements IValidator {

    public function validate($data) {
        $res = array(
            'fieldsErrors' => array(),
            'isValid' => false,
            'data' => $data,
        );
        //validate Title
        if (empty($data['title'])) {
            $res['fieldsErrors']['title'] = array('errorMsg' => "Title is required");
        } else {
            $res['data']['title'] = htmlspecialchars(stripslashes(trim($data['title'])));
        }
        //validate Price
        if (empty($data['price'])) {
            $res['fieldsErrors']['price'] = array('errorMsg' => "Price is required");
        } elseif (!is_numeric($data['price'])) {
            $res['fieldsErrors']['price'] = array('errorMsg' => "Price must be a float");
        } else {
            $res['data']['price'] = htmlspecialchars(stripslashes(trim($data['price'])));
        }
        //validate Quantity
        if ($data['quantity'] === '') {
            $res['fieldsErrors']['quantity'] = array('errorMsg' => "Quantity is required");
        } else if (!ctype_digit($data['quantity'])) {
            $res['fieldsErrors']['quantity'] = array('errorMsg' => "Quantity must be a number and greate than 0");
        } else {
            $res['data']['quantity'] = htmlspecialchars(stripslashes(trim($data['quantity'])));
        }
        
         //validate Category_id
        if (empty($data['category_id'])) {
            $res['fieldsErrors']['category_id'] = array('errorMsg' => "Please choose category");
        } else {
            $res['data']['category_id'] = htmlspecialchars(stripslashes(trim($data['category_id'])));
        }
        
        if (empty($res['fieldsErrors'])) {
            $res['isValid'] = true;
        }

        return $res;
    }

}

abstract class Entity {

    protected $tableName;

    function findAll($connect) {
        $query = "SELECT * FROM {$this->tableName} ORDER BY id ASC";
        $resultList = array();
        if ($result = $connect->query($query)) {
            while ($row = $result->fetch_object()) {
                $resultList[] = $row;
            }
            return $resultList;
        }
    }

    function findById($connect, $id) {
        $query = "SELECT * FROM {$this->tableName} WHERE id=$id;";
        if ($result = $connect->query($query)) {
            return $result->fetch_object();
        } else {
            return NULL;
        }
    }
    function delete($id, $connect) {
        $query = "DELETE FROM {$this->tableName} WHERE id=$id;";
        $res = $connect->query($query);
        return $res;
    }
}

class Category extends Entity {

    protected $tableName = 'category';

}

class Product extends Entity {

    protected $tableName = 'product';

    function save($id, $postParams, $connect) {
        if (!empty($id)) {
            $query = "UPDATE product SET title='{$postParams['title']}', "
                    . "price={$postParams['price']}, quantity={$postParams['quantity']}, category_id={$postParams['category_id']} WHERE id=$id;";
            $res = $connect->query($query);
        } else {
            $query = "INSERT INTO product(id, title, price, quantity, category_id) VALUES(NULL,'{$postParams['title']}',{$postParams['price']},{$postParams['quantity']}, {$postParams['category_id']})";
            $res = $connect->query($query);
        }
        return $res;
    }

    static function populateFromArray($product, $data) {
        $product->title = $data['title'];
        $product->price = $data['price'];
        $product->quantity = $data['quantity'];
        $product->category_id = $data['category_id'];
        
        return $product;
    }

}

?>