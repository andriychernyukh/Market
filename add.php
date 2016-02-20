<?php

include 'layout/_header.php';
include_once 'tools.php';

if (isset($_POST['save'])) {
    $productValidator = new ProductValidator();
    $validateResult = $productValidator->validate($_POST);

    if ($validateResult['isValid']) {
        $prodObj = new Product();
        $prodObj->save('', $validateResult['data'], $connect);
        header("Location: /");
        return;
    } else {
        $product = new stdClass();
        Product::populateFromArray($product, $validateResult['data']);
    }
}
include_once '_form.php';

include 'layout/_footer.php';
?>
