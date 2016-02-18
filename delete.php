<?php
include 'layout/_header.php';

if (!empty($_GET['productId'])) {

    include_once 'tools.php';

    $prodObj = new Product();
    $product = $prodObj->findById($connect, $_GET['productId']);

    if (!empty($product)) {
        ?>
        <h4> Are you sure want to delete this product?</h4>
        <form action='' method=post>
            <input type="hidden" name="id" id="id" value="<?php echo (empty($product) ? '' : $product->id); ?>"/>
            <input class="button button-yes" type=submit name='btnYes' value='Yes'>
            <input class="button button-no" type=submit name='btnNo' value='No'>

        </form>
        <?php
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btnYes'])) {
            $prodObj->delete($_POST['id'], $connect);
        }
        header("Location: /");
        return;
    }
    $connect->close();
} else {
    echo '<h4>Error: No product to delete</h4>';
}
include 'layout/_footer.php';
?>