<?php
include 'layout/_header.php';
if (!empty($_GET['productId'])) {

  
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
        
        $prodObjUpd->save($_POST['id']);
  
        header("Location: /");
        return;
    }
    $connect->close();
} else {
    echo '<h4>Error!</h4>';
}
include 'layout/_footer.php';

?>

