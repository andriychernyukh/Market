<?php
include 'layout/_header.php';
if (!empty($_GET['productId'])) {

    include_once 'connect.php';

    $query = "SELECT * FROM product WHERE id={$_GET['productId']};";
    if ($result = $connect->query($query)) {
        $product = $result->fetch_object();
        ?>
        <h4> Are you sure want to delete this product?</h4>
        <form action='' method=post>
            <input type="hidden" name="id" id="id" value="<?php echo (empty($product) ? '' : $product->id); ?>"/>
            <input type=submit name='btnYes' value='Yes'>
            <input type=submit name='btnNo' value='No'>

        </form>
        <?php
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btnYes'])) {
            $query = "DELETE FROM product WHERE id={$_POST['id']};";
            $res = $connect->query($query);
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