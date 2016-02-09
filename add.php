<?php
include 'layout/_header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '_form.php';



if (isset($_POST['save'])) {
    $query = "INSERT INTO product(id, title, price, quantity) VALUES(NULL,'{$_POST['title']}',{$_POST['price']},{$_POST['quantity']})";

    $res = $connect->query($query);
    header("Location: /");
    return;
}
include 'layout/_footer.php';
?>
