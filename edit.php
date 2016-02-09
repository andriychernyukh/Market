<?php

if (!empty($_GET['productId'])) {

    include_once 'connect.php';
    include_once 'tools.php';

    //$query = "SELECT * FROM product WHERE id={$_GET['productId']};";
    //if ($result = $connect->query($query)) {
    //  $product = $result->fetch_object();


    $prodObj = new Product();
    $product = $prodObj->findById($connect, $_GET['productId']);
    include_once '_form.php';

//}

    if (isset($_POST['save'])) {
        //$query = "UPDATE product SET title='{$_POST['title']}', price={$_POST['price']}, quantity={$_POST['quantity']} WHERE id={$_POST['id']};";
        //$res = $connect->query($query);
        $prodObjUpd=new Product();
        $prodObjUpd->initProd($_GET['title'], $_POST['price'], $_POST['quantity']);
        $prodObjUpd->save($_POST['id']);
  
        header("Location: /");
        return;
    }
    $connect->close();
} else {
    echo '<h4>Error!</h4>';
}




