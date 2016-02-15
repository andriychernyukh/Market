<?php

include 'layout/_header.php';

if (!empty($_GET['productId'])) {

    include_once 'tools.php';

    $prodObj = new Product();
    $product = $prodObj->findById($connect, $_GET['productId']);
    
    include_once '_form.php';

    if (isset($_POST['save'])) {
        $prodObj->save($_POST['id'], $connect);
        header("Location: /");
        return;
    }
} else {
    echo '<h4>Error!</h4>';
}
include 'layout/_footer.php';
?>

