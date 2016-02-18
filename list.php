<?php
include_once 'tools.php';

//$query = "SELECT * FROM product";
//$prodList = array();
//if ($result = $connect->query($query)) {
//  while ($row = $result->fetch_object()) {
//    $prodList[] = $row;
//}
$product = new Product();
$prodList = $product->findAll($connect);
$connect->close();
?>
<?php
if (!empty($prodList)) {
    echo '<ul class="product-list">';
    $index=1;
    foreach ($prodList as $product) {
        
        $itemClass=(($index%2===0) ? 'item-even' : 'item-odd');
                
        ?>
        <li class="item <?php echo $itemClass;?>">
            <div class="index">
                <?php
                echo $index++;
                ?>  
            </div>
            <div class="title">
                <?php
                echo $product->title;
                ?>  
            </div>
            <div class="price">
                <?php
                echo $product->price;
                ?>  
            </div>
            <div class="quantity">
                <?php
                echo $product->quantity;
                ?>  
            </div>
            <div class="controls">
                <a class="a-edit" href="edit.php?productId=<?= $product->id; ?>">Edit</a>
                <a class="a-del" href="delete.php?productId=<?= $product->id; ?>">Delete</a>
            </div>
        </li>
        <?php
        
    }
    echo '</ul>';
} else {
    echo "<h4>No products found!</h4>";
}
?>
<a class="a-edit" href="add.php">Add new product</a>
