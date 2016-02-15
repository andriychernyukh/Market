<?php

include_once 'connect.php';

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
            return;
        }
    }

    function save($id, $connect) {
        if (!empty($id)) {
            $query = "UPDATE product SET title='{$_POST['title']}', price={$_POST['price']}, quantity={$_POST['quantity']} WHERE id=$id;";
            $res = $connect->query($query);
        } else {
            $query = "INSERT INTO product(id, title, price, quantity) VALUES(NULL,'{$_POST['title']}',{$_POST['price']},{$_POST['quantity']})";
            $res = $connect->query($query);
        }
    }

    function delete($id, $connect) {
        $query = "DELETE FROM product WHERE id=$id;";
        $res = $connect->query($query);
    }

}

?>