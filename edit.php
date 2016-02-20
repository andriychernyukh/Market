<?php

include 'layout/_header.php';

if (!empty($_GET['productId'])) {

    include_once 'tools.php';

    $prodObj = new Product();
    $product = $prodObj->findById($connect, $_GET['productId']);


    if (isset($_POST['save'])) {
        $productValidator = new ProductValidator();
        $validateResult = $productValidator->validate($_POST);

        if ($validateResult['isValid']) {
            $prodObj->save($_POST['id'], $validateResult['data'], $connect);
            header("Location: /");
            return;
        } else {
            Product::populateFromArray($product, $validateResult['data']);
        }
    }
} else {
    echo '<h4>Error!</h4>';
}

include_once '_form.php';

include 'layout/_footer.php';
?>

