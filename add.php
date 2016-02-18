<?php
include 'layout/_header.php';
include_once 'tools.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['save'])) {
    $productValidator = new ProductValidator();
    $validateResult = $productValidator->validate($_POST);
    if ($validateResult['isValid']) {
        $prodObj = new Product();
        $prodObj->save('', $validateResult['data'], $connect);
        header("Location: /");
        return;
    }
}
include_once '_form.php';

include 'layout/_footer.php';
?>
