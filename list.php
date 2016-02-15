<?php
include_once 'tools.php';

//$query = "SELECT * FROM product";
//$prodList = array();
//if ($result = $connect->query($query)) {
  //  while ($row = $result->fetch_object()) {
    //    $prodList[] = $row;
    //}
$product= new Product();
$prodList= $product->findAll($connect);
$connect->close();
?>
<?php
if (!empty($prodList)) {
    echo '<ol>';
    foreach ($prodList as $product) {
        ?>
        <li>
            <?php
            echo "$product->title $product->price $product->quantity";
            ?>
            <a class="a-edit" href="edit.php?productId=<?= $product->id; ?>">Edit</a>
            <a class="a-del" href="delete.php?productId=<?= $product->id; ?>">Delete</a>
        </li>
        <?php
    }
    echo '</ol>';
} else {
    echo "<h4>No products found!</h4>";
}
?>
<a class="a-edit" href="add.php">Add new product</a>
